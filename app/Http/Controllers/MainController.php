<?php

namespace App\Http\Controllers;

use App\Advantages;
use App\AdvantageText;
use App\Catalog;
use App\Certificates;
use App\ColorProduct;
use App\Contacts;
use App\News;
use App\ProductColor;
use App\ProductSize;
use App\Soon;
use App\Staff;
use App\We;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        $certificate = Certificates::all()->sortByDesc('id');
        $soon = Soon::all();
        $catalog = Catalog::all()->sortByDesc('id');
        $advantages = Advantages::all();
        $advantagetext = DB::table('advantage_text')->first();
        $product_banner = DB::table('product_banner') -> orderByDesc('id')-> where('status',1) -> get();
        $new_product = DB::table('product') -> orderByDesc('id') -> where('status',1)->limit(10) -> get();
        $discount_product = DB::table('product') -> orderByDesc('id') -> where([['price_discount','!=',0],['status',1]])->limit(8)->get();
        $discount_left = DB::table('discount')->orderByDesc('id')->where([['type', 1],['status',1]])->first();
        $discount_right = DB::table('discount')->orderByDesc('id')->where([['type', 0],['status',1]])->first();
        $news = DB::table('news') -> orderByDesc('id') -> where('status',1) ->limit(4) -> get();

        $popular = DB::table('product') -> orderByDesc('view') -> where('status',1) -> limit(5) -> get();
        $recomend = DB::table('product') ->orderByDesc('id') -> where([['status',1],['recomended',1]]) -> limit(5) -> get();
        $discount = DB::table('product') -> orderByDesc('id') -> where([['price_discount','!=',0],['status',1]])->limit(5)->get();
        $all = DB::table('product') -> orderByDesc('id') -> where('status',1) -> limit(5) -> get();

        session_start();
        $favorite = '';
        if(!empty($_SESSION['favorite']))
            $favorite = $_SESSION['favorite'];

        return view('index',[
            'certificate' => $certificate,
            'soon' => $soon,
            'catalog' => $catalog,
            'advantages' => $advantages,
            'advantagetext' => $advantagetext,
            'product_banner' => $product_banner,
            'new_product' => $new_product,
            'discount_product' => $discount_product,
            'discount_left' => $discount_left,
            'discount_right' => $discount_right,
            'news' => $news,
            'favorite' => $favorite,
            'popular' => $popular,
            'recomend' => $recomend,
            'discount' => $discount,
            'all' => $all,
        ]);
    }

    public function contact(){
        session_start();
        $contact = Contacts::first();
        return view('contact',[
            'contact' => $contact,
        ]);
    }

    public function about(){
        session_start();
        $certificate = Certificates::all()->sortByDesc('id');
        $we = DB::table('we')->first();
        $company = DB::table('company')->first();
        $history = DB::table('history')->orderByDesc('id')->first();
        $mission = DB::table('mission')->first();
        $stafftext = DB::table('staff_text')->first();
        $staff = Staff::all()->sortByDesc('id');
        $quote = DB::table('quote')->first();
        $advantages = Advantages::all()->sortByDesc('id');
        $advantagetext = DB::table('advantage_text')->first();

        return view('about',[
            'certificate' => $certificate,
            'we' => $we,
            'company' => $company,
            'history' => $history,
            'mission' => $mission,
            'stafftext' => $stafftext,
            'staff' => $staff,
            'quote' => $quote,
            'advantages' => $advantages,
            'advantagetext' => $advantagetext,
        ]);
    }

    public function news(){
        session_start();
        $url = "http://api.openweathermap.org/data/2.5/weather?q=moscow&appid=b733d8dcdbcb201f17f364bb91f983f0&units=metric";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data = curl_exec($ch);
        $data = json_decode($data,true);
        curl_close($ch);

        $url_money = "https://openexchangerates.org/api/latest.json?app_id=86571a4ce4ca4aef92624ffcd2b5d5ce";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_money);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data_money = curl_exec($ch);
        $data_money = json_decode($data_money,true);
        curl_close($ch);

        $usd = '';
        $eur = '';
        $gbr = '';
        if(!empty($data_money)){
            $usd = $data_money['rates']['RUB'];
            $eur = (1/$data_money['rates']['EUR'])* $data_money['rates']['RUB'];
            $gbr = (1/$data_money['rates']['GBP'])* $data_money['rates']['RUB'];
        }
        $news = DB::table('news')->where('also','=',0)->orderByDesc('id') -> limit(4)->get();
        return view('news',[
            'news' => $news,
            'data' => $data,
            'usd' => $usd,
            'eur' => $eur,
            'gbr' => $gbr,
        ]);
    }

    public function post($id){
        session_start();
        $news = DB::table('news')->where([['id', '!=', $id],['also' ,'=', 0]])->orderByDesc('id')->get();
        $also = DB::table('news')->where([['also','=',  1],['id' ,'!=',$id]])->orderByDesc('id')->limit(2)->get();
        $url = "http://api.openweathermap.org/data/2.5/weather?q=moscow&appid=b733d8dcdbcb201f17f364bb91f983f0&units=metric";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data = curl_exec($ch);
        $data = json_decode($data,true);
        curl_close($ch);

        $url_money = "https://openexchangerates.org/api/latest.json?app_id=86571a4ce4ca4aef92624ffcd2b5d5ce";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url_money);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $data_money = curl_exec($ch);
        $data_money = json_decode($data_money,true);
        curl_close($ch);


        $usd = '';
        $eur = '';
        $gbr = '';
        if(!empty($data_money)){
            $usd = $data_money['rates']['RUB'];
            $eur = (1/$data_money['rates']['EUR'])* $data_money['rates']['RUB'];
            $gbr = (1/$data_money['rates']['GBP'])* $data_money['rates']['RUB'];
        }

        return view('post')->with([
                'new' => News::find($id),
                'news' => $news,
                'also' => $also,
                'data' => $data,
                'usd' => $usd,
                'eur' => $eur,
                'gbr' => $gbr,
            ]
        );
    }

    public function category($id){
        session_start();
        $category = DB::table('category')->where('parent_id',$id)->orderByDesc('id')->get();
        $mainCategory = DB::table('category')->orderByDesc('id')->where('parent_id',0)->get();
        return view('category',[
            'category' => $category,
            'mainCategory' => $mainCategory,
            'id' => $id,
        ]);
    }

    /*public function subcategory($id=0,$colors = '',$sizes = '',$minamount = '',$maxamount = ''){
        $category_banner = DB::table('category_banner') -> orderByDesc('id') -> where('category_id',$id) -> first();
        $product = DB::table('product') -> orderByDesc('id') -> where([['status',1],['category_id',$id]])->limit(15) -> get();

        $color = DB::table('color') -> orderByDesc('id') -> get();
        $size = DB::table('size') -> orderByDesc('id') -> get();
        $season = DB::table('season') -> orderByDesc('id') -> get();
        $max_price = DB::table('product') ->orderByDesc('price') -> where('category_id',$id) -> first();
        $min_price = DB::table('product') ->orderBy('price','ASC') -> where('category_id',$id) -> first();
        session_start();
        $favorite = '';
        if(!empty($_SESSION['favorite']))
            $favorite = $_SESSION['favorite'];


        return view('subcategory',[
            'id' => $id,
            'category_banner' => $category_banner,
            'product' => $product,
            'color' => $color,
            'size' => $size,
            'season' => $season,
            'favorite' => $favorite,
            'min_price' => $min_price,
            'max_price' => $max_price,
        ]);
    }*/

    public function product($id){
        $product = DB::table('product') -> where('id',$id) -> first();
        $view = $product->view+1;
        DB::table('product')
            ->where('id', $product->id)
            ->update(['view' => $view]);

        $color = ColorProduct::select('color_product.product_id as product_id','color.id as id','color.name','color.code')
            ->leftJoin('color','color_product.color_id','=','color.id')
            ->where('color_product.product_id',$id)
            ->get();

        $size = ProductSize::select('size.id as id','size.name')
            ->leftJoin('size','product_size.size_id','=','size.id')
            ->where('product_size.product_id',$id)
            ->get();
        $contact = DB::table('contacts') -> orderByDesc('id') -> first();
        session_start();
        $favorite = '';
        if(!empty($_SESSION['favorite']))
            $favorite = $_SESSION['favorite'];
        return view('product',[
            'id' => $id,
            'product' => $product,
            'color' => $color,
            'size' => $size,
            'favorite' => $favorite,
            'contact' => $contact,
        ]);
    }

    public function favorite(){
        session_start();
        $pids = [];
        if(!empty($_SESSION['favorite']))
            $pids = $_SESSION['favorite'];
        $product = DB::table('product') -> whereIn('id',$pids) -> orderByDesc('id') -> get();
        return view('favorite',[
            'product' => $product,
        ]);
    }

    public function basket(){
        session_start();
        if(!empty($_SESSION['package']))
            $allProduct = $_SESSION['package'];
        $products = [];
        if(!empty($allProduct))
            foreach($allProduct as $value){
                $product = DB::table('product')->where('id',$value['id'])->first();
                $product = (array) $product;
                $product['count'] = $value['count'];
                $product['color'] = $value['color'];
                $products[] = $product;
            }
        return view('basket',[
            'products' => $products,
        ]);
    }

}
