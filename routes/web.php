<?php

use Illuminate\Support\Facades\DB;

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});

Route::get('send-mail','MailSend@mailsend');

Route::get('/','MainController@index')->name('index');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contact','MainController@contact')->name('contact');
Route::get('/about','MainController@about')->name('about');
Route::get('/news','MainController@news')->name('news');
Route::get('/post/{id}','MainController@post')->name('post');
Route::get('/category/{id}','MainController@category')->name('category');
Route::get('/product/{id}','MainController@product')->name('product');
Route::get('/favorite','MainController@favorite')->name('favorite');
Route::get('/basket','MainController@basket')->name('basket');

//Route::get('/result','MainController@result')->name('result');

// forget
Route::get('/forget',function (){
    view('forget');
})->name('forget');
// start ajax route
Route::post('/addproduct','ProductController@addproduct')->name('addproduct');
Route::post('/addfavorite','ProductController@addfavorite')->name('addfavorite');
Route::post('/removebasket','ProductController@removebasket')->name('removebasket');
Route::post('/addpopular','ProductController@addpopular')->name('addpopular');
Route::post('/recomend','ProductController@recomend')->name('recomend');
Route::post('/discount','ProductController@discount')->name('discount');
Route::post('/all','ProductController@all')->name('all');
Route::post('/shownews','ProductController@shownews')->name('shownews');
Route::post('/showcategory','ProductController@showcategory')->name('showcategory');
Route::post('/showproduct','ProductController@showproduct')->name('showproduct');
Route::post('/imageupload','ProductController@imageupload')->name('imageupload');
Route::post('/basketadd','ProductController@basketadd')->name('basketadd');
// finish ajax product
Route::post('/remove','ProductController@remove')->name('remove');
Route::get('/email','SendEmailController@index')->name('send-email');
Route::post('/sendemail/send','SendEmailController@send')->name('send-email-post');
Route::post('/update','UserController@update')->name('update');
// finish ajax route

Route::get('/subcategory/{id}',function($id){
    $category_banner = DB::table('category_banner') -> orderByDesc('id') -> where('category_id',$id) -> first();
    $max_price = DB::table('product') ->orderByDesc('price') -> where('category_id',$id) -> first();
    $min_price = DB::table('product') ->orderBy('price','ASC') -> where('category_id',$id) -> first();
    $color = \App\Color::all();
    $size = \App\Size::all();
    $season = \App\Season::all();
    session_start();
    $favorite = '';
    if(!empty($_SESSION['favorite']))
        $favorite = $_SESSION['favorite'];

    $product = \App\Product::select('product.id','product.name','product.price','product.image','product.price_discount')
        ->leftJoin('color_product','product.id','=','color_product.product_id')
        ->leftJoin('product_size','product.id','=','product_size.product_id')
        ->leftJoin('product_season','product.id','=','product_season.product_id')
        ->where(function($query){
            $minamount = \Illuminate\Support\Facades\Input::has('minamount') ? \Illuminate\Support\Facades\Input::get('minamount') : null;
            $maxamount = \Illuminate\Support\Facades\Input::has('maxamount') ? \Illuminate\Support\Facades\Input::get('maxamount') : null;
            if(isset($minamount) and isset($maxamount)){
                $query->where('price','>=',$minamount) -> where('price','<=',$maxamount);
            }
            $colors = \Illuminate\Support\Facades\Input::has('colors') ? \Illuminate\Support\Facades\Input::get('colors') : [];
            if(!empty($colors)){
                foreach($colors as $value)
                    $query->orWhere('color_product.color_id','=',$value);
            }
            $sizes = \Illuminate\Support\Facades\Input::has('sizes') ? \Illuminate\Support\Facades\Input::get('sizes') : [];
            if(!empty($sizes)){
                foreach($sizes as $value)
                    $query->orWhere('product_size.size_id',$value);
            }
            $seasons = \Illuminate\Support\Facades\Input::has('seasons') ? \Illuminate\Support\Facades\Input::get('seasons') : [];
            if(!empty($seasons)){
                foreach($seasons as $value)
                    $query->orWhere('product_season.season_id',$value);
            }
            $query->where('product.status',1);
        })
        ->where('product.category_id',$id)
        ->limit(10)
        ->groupBy('product.id')->get();

    return View::make('subcategory',[
        'id' => $id,
        'product' => $product,
        'category_banner' => $category_banner,
        'max_price' => $max_price,
        'min_price' => $min_price,
        'color' => $color,
        'size' => $size,
        'season' => $season,
        'favorite' => $favorite,
    ]);
})->name('subcategory');
// Forget

// product.blade.php купит button submit
Route::get('/buy',function () {
    $sizes = \Illuminate\Support\Facades\Input::has('sizes') ? \Illuminate\Support\Facades\Input::get('sizes') : [];
    $product_count = \Illuminate\Support\Facades\Input::has('product_count') ? \Illuminate\Support\Facades\Input::get('product_count') : null;
    $product_id = \Illuminate\Support\Facades\Input::has('product_id') ? \Illuminate\Support\Facades\Input::get('product_id') : null;
    $color = \Illuminate\Support\Facades\Input::has('color') ? \Illuminate\Support\Facades\Input::get('color') : null;
    session_start();
    $package_product = [
        'id' => $product_id,
        'count' => $product_count,
        'color' => $color,
        'size' => $sizes,
    ];
    $_SESSION['package'][] = $package_product;

    $allProduct = $_SESSION['package'];
    $products = [];
    foreach($allProduct as $value){
        $product = DB::table('product')->where('id',$value['id'])->first();
        $product = (array) $product;
        $product['count'] = $value['count'];
        $products[] = $product;
    }

    return Redirect::action('MainController@basket');
    return Redirect::to('basket');
});
// end

Route::get('/result',function(){
    $q = \Illuminate\Support\Facades\Input::has('q') ? \Illuminate\Support\Facades\Input::get('q') : '';
    $product = \App\Product::select('product.id','product.name','product.price','product.image','product.price_discount')
        ->leftJoin('color_product','product.id','=','color_product.product_id')
        ->leftJoin('product_size','product.id','=','product_size.product_id')
        ->leftJoin('product_season','product.id','=','product_season.product_id')
        ->where(function($query){
            $minamount = \Illuminate\Support\Facades\Input::has('minamount') ? \Illuminate\Support\Facades\Input::get('minamount') : null;
            $maxamount = \Illuminate\Support\Facades\Input::has('maxamount') ? \Illuminate\Support\Facades\Input::get('maxamount') : null;
            if(isset($minamount) and isset($maxamount)){
                $query->where('price','>=',$minamount) -> where('price','<=',$maxamount);
            }
            $colors = \Illuminate\Support\Facades\Input::has('colors') ? \Illuminate\Support\Facades\Input::get('colors') : [];
            if(!empty($colors)){
                foreach($colors as $value)
                    $query->orWhere('color_product.color_id','=',$value);
            }
            $sizes = \Illuminate\Support\Facades\Input::has('sizes') ? \Illuminate\Support\Facades\Input::get('sizes') : [];
            if(!empty($sizes)){
                foreach($sizes as $value)
                    $query->orWhere('product_size.size_id',$value);
            }
            $seasons = \Illuminate\Support\Facades\Input::has('seasons') ? \Illuminate\Support\Facades\Input::get('seasons') : [];
            if(!empty($seasons)){
                foreach($seasons as $value)
                    $query->orWhere('product_season.season_id',$value);
            }
            $query->where('product.status',1);
        })
        ->where('product.name','like','%'.$q.'%')
        ->groupBy('product.id')->get();

    $mainCategory = \App\Category::where('parent_id','=',0)->get();
    $category = [];
    foreach($mainCategory as $value){
        $cat = \App\Category::where('parent_id','=',$value->id)->get();
        $subcategory = [];
        foreach($cat as $val){
            $pr = \App\Product::select('product.id','product.name','product.price','product.image','product.price_discount')
                ->leftJoin('color_product','product.id','=','color_product.product_id')
                ->leftJoin('product_size','product.id','=','product_size.product_id')
                ->leftJoin('product_season','product.id','=','product_season.product_id')
                ->where(function($query){
                    $minamount = \Illuminate\Support\Facades\Input::has('minamount') ? \Illuminate\Support\Facades\Input::get('minamount') : null;
                    $maxamount = \Illuminate\Support\Facades\Input::has('maxamount') ? \Illuminate\Support\Facades\Input::get('maxamount') : null;
                    if(isset($minamount) and isset($maxamount)){
                        $query->where('price','>=',$minamount) -> where('price','<=',$maxamount);
                    }
                    $colors = \Illuminate\Support\Facades\Input::has('colors') ? \Illuminate\Support\Facades\Input::get('colors') : [];
                    if(!empty($colors)){
                        foreach($colors as $value)
                            $query->orWhere('color_product.color_id','=',$value);
                    }
                    $sizes = \Illuminate\Support\Facades\Input::has('sizes') ? \Illuminate\Support\Facades\Input::get('sizes') : [];
                    if(!empty($sizes)){
                        foreach($sizes as $value)
                            $query->orWhere('product_size.size_id',$value);
                    }
                    $seasons = \Illuminate\Support\Facades\Input::has('seasons') ? \Illuminate\Support\Facades\Input::get('seasons') : [];
                    if(!empty($seasons)){
                        foreach($seasons as $value)
                            $query->orWhere('product_season.season_id',$value);
                    }
                    $query->where('product.status',1);
                })
                ->where('product.name','like','%'.$q.'%')
                ->where('product.category_id','=',$val->id)
                ->groupBy('product.id')->get();
            if(count($pr)>0){
                $arr = [
                    'name' => $val->name,
                    'count' => count($pr),
                ];
                $subcategory[] = $arr;
            }
        }
        $arr1 = [
            'name' => $value->name,
            'subcategory' => $subcategory,
        ];
        $category[] = $arr1;
    }

    session_start();
    $favorite = '';
    if(!empty($_SESSION['favorite']))
        $favorite = $_SESSION['favorite'];

    $size = \App\Size::all();
    return View::make('result',[
        'product' => $product,
        'category' => $category,
        'size' => $size,
        'favorite' => $favorite,
    ]);
});

Route::get('/filter/{id}',function($id){
    $products = \App\Product::select('product.id','product.category_id','product.name','product.description','product.price')
        ->leftJoin('color_product','product.id','=','color_product.product_id')
        ->leftJoin('product_size','product.id','=','product_size.product_id')
        ->leftJoin('product_season','product.id','=','product_season.product_id')
        ->where(function ($query){
            $min_price = \Illuminate\Support\Facades\Input::has('min_price') ? \Illuminate\Support\Facades\Input::get('min_price') : null;
            $max_price = \Illuminate\Support\Facades\Input::has('max_price') ? \Illuminate\Support\Facades\Input::get('max_price') : null;
            if(isset($min_price) and isset($max_price)){
                $query->where('price','>=',$min_price) -> where('price','<=',$max_price);
            }
            $colors = \Illuminate\Support\Facades\Input::has('colors') ? \Illuminate\Support\Facades\Input::get('colors') : [];
            if(!empty($colors)){
                foreach($colors as $value)
                    $query->orWhere('color_product.color_id','=',$value);
            }
            $sizes = \Illuminate\Support\Facades\Input::has('sizes') ? \Illuminate\Support\Facades\Input::get('sizes') : [];
            if(!empty($sizes)){
                foreach($sizes as $value)
                    $query->orWhere('product_size.size_id',$value);
            }
            $seasons = \Illuminate\Support\Facades\Input::has('seasons') ? \Illuminate\Support\Facades\Input::get('seasons') : [];
            if(!empty($seasons)){
                foreach($seasons as $value)
                    $query->orWhere('product_season.season_id',$value);
            }
        })->where('category_id',$id)
        ->groupBy('product.id')->get();
    $color = \App\Color::all();
    $size = \App\Size::all();
    $season = \App\Season::all();

    return View::make('filter',[
        'products' => $products,
        'color' => $color,
        'size' => $size,
        'season' => $season,
    ]);
});

/*Auth::routes();*/

// Auth, login, register, confirm
Route::get('/login','UsersController@index')->name('login');
Route::post('/checklogin','UsersController@checklogin')->name('checklogin');
Route::get('/register','UsersController@register')->name('register');
Route::post('/checkregister','UsersController@checkregister')->name('checkregister');
Route::get('/forget','UsersController@forget')->name('forget');
Route::post('/sendforget','UsersController@sendforget')->name('sendforget');
Route::post('/logout','UsersController@logout')->name('logout');
Route::get('/confirm','UsersController@confirm')->name('confirm');
Route::get('/confirmemail',function (){
    $email = \Illuminate\Support\Facades\Input::has('email') ? \Illuminate\Support\Facades\Input::get('email') : null;
    $code = \Illuminate\Support\Facades\Input::has('code') ? \Illuminate\Support\Facades\Input::get('code') : null;
    $user = App\User::where([['email', $email],['code',$code]])->first();
    $user -> status = 1;
    $user -> save();
    return View::make('auth.login');
})->name('confirmemail');
// end

Route::post('user/update','HomeController@update')->name('user.update');
Route::post('user/image','HomeController@image')->name('user.image');
//->middleware(['auth','auth.admin'])
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function (){
    Route::resource('/index','AdminController',['except' => []]);
    Route::resource('/users','UserController',['except' => ['show','create','store']]);
    Route::resource('/news','NewsController',['except' => []]);
    Route::resource('/contacts','ContactsController',['except' => []]);
    Route::resource('/we','WeController',['except' => []]);
    Route::resource('/company','CompanyController',['except' => []]);
    Route::resource('/history','HistoryController',['except' => []]);
    Route::resource('/mission','MissionController',['except' => []]);
    Route::resource('/staff','StaffController',['except' => []]);
    Route::resource('/quote','QuoteController',['except' => []]);
    Route::resource('/stafftext','StaffTextController',['except' => []]);
    Route::resource('/certificates','CertificatesController',['except' => []]);
    Route::resource('/advantages','AdvantagesController',['except' => []]);
    Route::resource('/advantagetext','AdvantageTextController',['except' => []]);
    Route::resource('/soon','SoonController',['except' => []]);
    Route::resource('/catalog','CatalogController',['except' => []]);
    Route::resource('/color','ColorController',['except' => []]);
    Route::resource('/size','SizeController',['except' => []]);
    Route::resource('/season','SeasonController',['except' => []]);
    Route::resource('/category','CategoryController',['except' => []]);
    Route::resource('/product','ProductController',['except' => []]);
    Route::resource('/categorybanner','CategoryBannerController',['except' => []]);
    Route::resource('/productbanner','ProductBannerController',['except' => []]);
    Route::resource('/discount','DiscountController',['except' => []]);
    Route::resource('/login','LoginController',['except' => []]);
    Route::resource('/register','RegisterController',['except' => []]);
    Route::resource('/forget','ForgetController',['except' => []]);
    Route::resource('/head','HeadController',['except' => []]);
    Route::resource('/body','BodyController',['except' => []]);
    Route::resource('/test','TestController',['except' => []]);
});
