<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class ProductController extends Controller
{
    public function addproduct(){
        session_start();
        if(isset($_POST['product_id']))
           $product_id = $_POST['product_id'];
        $package_product =[
            'id' => $product_id,
            'count' => 1,
            'color' => 0,
            'sizes' => [],
        ];
        if(empty($_SESSION['package'])){
            $_SESSION['package'][] = $package_product;
        }else{
            $bool = true;
            foreach($_SESSION['package']  as $key => $value){
                if($value['id'] == $product_id){
                    $bool = false;
                    $_SESSION['package'][$key]['count'] =$_SESSION['package'][$key]['count'] + 1;
                }
            }
            if($bool){
                $_SESSION['package'][] = $package_product;
            }
        }
        $count = 0;
        foreach($_SESSION['package'] as $value){
            $count += $value['count'];
        }
        return response()->json(array('count'=> $count), 200);
    }

    public function addfavorite(){
        session_start();
        if(isset($_POST['product_id']))
            $product_id = $_POST['product_id'];

        $type = true;
        if(empty($_SESSION['favorite'])){
            $_SESSION['favorite'][] = $product_id;
        }else{
            if(in_array($product_id,$_SESSION['favorite'])){
                $key = array_search($product_id, $_SESSION['favorite']);
                unset($_SESSION['favorite'][$key]);
                $type = false;
            }else{
                $_SESSION['favorite'][] = $product_id;
            }
        }
        $count = count($_SESSION['favorite']);
        return response()->json(array('count'=> $count,'type' => $type), 200);
    }

    public function removebasket(){
        $product_id = $_POST['product_id'];
        $count = $_POST['count'];
        session_start();
        if(!empty($_SESSION['package']))
            $package = $_SESSION['package'];

        foreach($package as $item => $value){
            if($value['id'] == $product_id and $value['count'] == $count){
                unset($_SESSION['package'][$item]);
            }
        }

        $allPrice = 0;
        if(!empty($_SESSION['package'])){
            foreach($_SESSION['package'] as $value){
                $product = DB::table('product')->where('id',$value['id'])->first();
                $product = (array) $product;
                if(!empty($product['price_discount'])){
                    $allPrice += $value['count'] * $product['price_discount'];
                }else{
                    $allPrice += $value['count'] * $product['price'];
                }
            }
        }

        $count = 0;
        if(!empty($_SESSION['package'])){
            foreach($_SESSION['package'] as $value){
                $count += $value['count'];
            }
        }

        $text = '';
        $text .= '<sapn>ВСЕГО:</sapn> '; $text .= number_format($allPrice,0,' ',' '); $text .= ' RUB';
        return response()->json(array('count'=> $count,'text' => $text), 200);
    }

    public function remove(){
        session_start();
        if(isset($_POST['product_id']))
            $product_id = $_POST['product_id'];
        if(in_array($product_id,$_SESSION['favorite'])){
            $key = array_search($product_id, $_SESSION['favorite']);
            unset($_SESSION['favorite'][$key]);
        }
        $count = count($_SESSION['favorite']);
        return response()->json(array('count'=> $count,'product_id' => $product_id), 200);
    }

    public function showproduct(){
        if(isset($_POST['value']))
            $value = $_POST['value'];

        $product = DB::table('product')->orderByDesc('id')->offset(10*$value+10) ->limit(10)  -> get();
        if(count($product) <= 0){
            return response()->json(array('status'=> 0), 200);
        }else{
            session_start();
            $favorite = '';
            if(!empty($_SESSION['favorite']))
                $favorite = $_SESSION['favorite'];

            $result = '';
            foreach($product as $value){
                $result .= '
                    <div class="col-lg-3 col-md-4 col-10 card wow animate__fadeInUp" data-wow-duration="1500ms">
                        <a href="'.url('product',$value->id).'" class="image">
                            <img src="'.asset('uploads').'/'.$value->image.'" alt="">
                        </a>
                        <div class="name">'.$value->name .'</div>
                        <div class="pr-h">
                            <div class="price"><div>'. number_format($value->price,0,' ',' ')  .' RUB</div></div>
                            <button class="heart '; if(!empty($favorite)) if(in_array($value->id,$favorite)) $result.= 'add'; $result .='"id="'.$value->id  .'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                            </button>
                        </div>
                        <a style="cursor: pointer" id="'. $value->id  .'" class="basket">В КОРЗИНУ</a>
                    </div>';
            }
            return response()->json(array('status'=> 1,'result' =>$result), 200);
        }
    }

    public function addpopular(){
        if(isset($_POST['value']))
            $value = $_POST['value'];

        $product = DB::table('product')->orderByDesc('view')->offset(5*$value+5) ->limit(5)  -> get();
        if(count($product) <= 0){
            return response()->json(array('status'=> 0), 200);
        }else{
            session_start();
            $favorite = '';
            if(!empty($_SESSION['favorite']))
                $favorite = $_SESSION['favorite'];

            $result = '';
            foreach($product as $value){
                $result .= '
                    <div class="col-lg-3 col-md-4 col-10 card wow animate__fadeInUp" data-wow-duration="1500ms">
                        <a href="'.url('product',$value->id).'" class="image">
                            <img src="'.asset('uploads').'/'.$value->image.'" alt="">
                        </a>
                        <div class="name">'.$value->name .'</div>
                        <div class="pr-h">
                            <div class="price"><div>'. number_format($value->price,0,' ',' ')  .' RUB</div></div>
                            <button class="heart '; if(!empty($favorite)) if(in_array($value->id,$favorite)) $result.= 'add'; $result .='"id="'.$value->id  .'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                            </button>
                        </div>
                        <a style="cursor: pointer" id="'. $value->id  .'" class="basket">В КОРЗИНУ</a>
                    </div>';
            }
            return response()->json(array('status'=> 1,'result' =>$result), 200);
        }
    }

    public function recomend(){
        if(isset($_POST['value']))
            $value = $_POST['value'];

        $product = DB::table('product')->orderByDesc('id')->where([['status',1],['recomended',1]])->offset(5*$value+5) ->limit(5)  -> get();
        if(count($product) <= 0){
            return response()->json(array('status'=> 0), 200);
        }else{
            session_start();
            $favorite = '';
            if(!empty($_SESSION['favorite']))
                $favorite = $_SESSION['favorite'];

            $result = '';
            foreach($product as $value){
                $result .= '
                    <div class="col-lg-3 col-md-4 col-10 card wow animate__fadeInUp" data-wow-duration="1500ms">
                        <a href="'.url('product',$value->id).'" class="image">
                            <img src="'.asset('uploads').'/'.$value->image.'" alt="">
                        </a>
                        <div class="name">'.$value->name .'</div>
                        <div class="pr-h">
                            <div class="price"><div>'. number_format($value->price,0,' ',' ')  .' RUB</div></div>
                            <button class="heart '; if(!empty($favorite)) if(in_array($value->id,$favorite)) $result.= 'add'; $result .='"id="'.$value->id  .'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                            </button>
                        </div>
                        <a style="cursor: pointer" id="'. $value->id  .'" class="basket">В КОРЗИНУ</a>
                    </div>';
            }
            return response()->json(array('status'=> 1,'result' =>$result), 200);
        }
    }

    public function discount(){
        if(isset($_POST['value']))
            $value = $_POST['value'];

        $product = DB::table('product')->orderByDesc('id')->where([['price_discount','!=',0],['status',1]])->offset(5*$value+5) ->limit(5)  -> get();
        if(count($product) <= 0){
            return response()->json(array('status'=> 0), 200);
        }else{
            session_start();
            $favorite = '';
            if(!empty($_SESSION['favorite']))
                $favorite = $_SESSION['favorite'];

            $result = '';
            foreach($product as $value){
                $result .= '
                    <div class="col-lg-3 col-md-4 col-10 card wow animate__fadeInUp" data-wow-duration="1500ms">
                        <a href="'.url('product',$value->id).'" class="image">
                            <img src="'.asset('uploads').'/'.$value->image.'" alt="">
                        </a>
                        <div class="name">'.$value->name .'</div>
                        <div class="pr-h">
                            <div class="price">
                                <div class="sale">'; $result .= number_format($value->price,0,' ',' ');  $result .=' RUB</div>
                                <div class="new-price">'; $result .= number_format($value->price_discount,0,' ',' '); $result .=' RUB</div>
                            </div>
                            <button class="heart '; if(!empty($favorite)) if(in_array($value->id,$favorite)) $result.= 'add'; $result .='"id="'.$value->id  .'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                            </button>
                        </div>
                        <a style="cursor: pointer" id="'. $value->id  .'" class="basket">В КОРЗИНУ</a>
                        <div class="percent">
                                '; $result .= substr(($value->price_discount/$value->price)*100 - 100,0,3); $result .='
                                %
                            </div>
                    </div>';
            }
            return response()->json(array('status'=> 1,'result' =>$result), 200);
        }
    }

    public function all(){
        if(isset($_POST['value']))
            $value = $_POST['value'];

        $product = DB::table('product')->orderByDesc('id')->where('status',1)->offset(5*$value+5) ->limit(5)  -> get();
        if(count($product) <= 0){
            return response()->json(array('status'=> 0), 200);
        }else{
            session_start();
            $favorite = '';
            if(!empty($_SESSION['favorite']))
                $favorite = $_SESSION['favorite'];

            $result = '';
            foreach($product as $value){
                $result .= '
                    <div class="col-lg-3 col-md-4 col-10 card wow animate__fadeInUp" data-wow-duration="1500ms">
                        <a href="'.url('product',$value->id).'" class="image">
                            <img src="'.asset('uploads').'/'.$value->image.'" alt="">
                        </a>
                        <div class="name">'.$value->name .'</div>
                        <div class="pr-h">
                            <div class="price">
                                <div class="sale">'; $result .= number_format($value->price,0,' ',' ');  $result .=' RUB</div>
                                <div class="new-price">'; $result .= number_format($value->price_discount,0,' ',' '); $result .=' RUB</div>
                            </div>
                            <button class="heart '; if(!empty($favorite)) if(in_array($value->id,$favorite)) $result.= 'add'; $result .='"id="'.$value->id  .'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                            </button>
                        </div>
                        <a style="cursor: pointer" id="'. $value->id  .'" class="basket">В КОРЗИНУ</a>
                        <div class="percent">
                                '; $result .= substr(($value->price_discount/$value->price)*100 - 100,0,3); $result .='
                                %
                            </div>
                    </div>';
            }
            return response()->json(array('status'=> 1,'result' =>$result), 200);
        }
    }

    public function shownews(){
        if(isset($_POST['value']))
            $value = $_POST['value'];
        $news = DB::table('news') -> orderByDesc('id') -> where([['status',1],['also',0]]) -> offset(4*$value+4) ->limit(4) -> get();
        if(count($news) <= 0){
            return response()->json(array('status'=> 0), 200);
        }else{
            $result = '';
            foreach($news as $value){
                $result .= '
                    <a href="'.route('post',$value->id)  .'" class="new wow animate__fadeInUp" data-wow-duration="1500ms">
                        <div class="title">'.
                             $value->name
                        .'</div>
                        <div class="bottom">
                            <div class="date">'.
                                 substr($value->day,0,10)
                            .'</div>
                            <div class="source"><span>Источник:</span>';
                                if(!empty($value->source))
                                    $result .= $value->source;

                            $result .='</div>
                        </div>
                    </a>
                ';
            }
            return response()->json(array('status'=> 1,'result' =>$result), 200);
        }
    }

    public function showcategory(){
        if(isset($_POST['value']))
            $value = $_POST['value'];
        if(isset($_POST['category_id']))
            $category_id = $_POST['category_id'];

        $product = DB::table('product') -> orderByDesc('id') -> where([['status',1],['category_id',$category_id]]) -> offset(10*$value+10) ->limit(10) -> get();
        if(count($product) <= 0){
            return response()->json(array('status'=> 0), 200);
        }else{
            session_start();
            $favorite = '';
            if(!empty($_SESSION['favorite']))
                $favorite = $_SESSION['favorite'];

            $result = '';
            foreach($product as $value){
                $result .= '
                    <div class="col-lg-3 col-md-4 col-10 card wow animate__fadeInUp" data-wow-duration="1500ms">
                        <a href="'.url('product',$value->id).'" class="image">
                            <img src="'.asset('uploads').'/'.$value->image.'" alt="">
                        </a>
                        <div class="name">'.$value->name .'</div>
                        <div class="pr-h">
                            <div class="price">
                                <div class="sale">'; $result .= number_format($value->price,0,' ',' ');  $result .=' RUB</div>
                                <div class="new-price">'; $result .= number_format($value->price_discount,0,' ',' '); $result .=' RUB</div>
                            </div>
                            <button class="heart '; if(!empty($favorite)) if(in_array($value->id,$favorite)) $result.= 'add'; $result .='"id="'.$value->id  .'">
                                <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                            </button>
                        </div>
                        <a style="cursor: pointer" id="'. $value->id  .'" class="basket">В КОРЗИНУ</a>
                        <div class="percent">
                                '; $result .= substr(($value->price_discount/$value->price)*100 - 100,0,3); $result .='
                                %
                            </div>
                    </div>';
            }
            return response()->json(array('status'=> 1,'result' =>$result), 200);
        }
    }

    public function imageupload(Request $request){
        $name_left =  rand(1,10).".".date('Y_m_d_H-i-s') . "." . $request->file->getClientOriginalExtension();
        $upload1 =  $request->file->move(public_path('uploads/users/'), $name_left);
        $image_left = $name_left;
        $user_id = Auth::user()->id;

        $user =  User::findOrFail($user_id);
        (file_exists('uploads/users'."/".$user->image))? unlink('uploads/users'."/".$user->image):'';

        $user->update([
                'image'=>$image_left,
            ]
        );
        $url = asset('uploads/users/')."/".$image_left;
        return response()->json(['is'=>$url]);
        //return response()->json(array('image' =>$image_left), 200);
    }

    public function basketadd(){
        $product_id = $_POST['id'];
        $count = $_POST['count'];
        $type = $_POST['type'];
        session_start();
        if(!empty($_SESSION['package']))
            $package = $_SESSION['package'];

        $product_count = 0;
        foreach($package as $item => $value){
            if($value['id'] == $product_id and $value['count'] == $count){
                if($type == 1){
                    $_SESSION['package'][$item]['count'] += 1;
                }else if($type == 0){
                    if($_SESSION['package'][$item]['count'] > 0){
                        $_SESSION['package'][$item]['count'] -= 1;
                    }
                }
                $product_count = $_SESSION['package'][$item]['count'];
            }
        }

        $all_count = 0;
        $price_product = 0;
        $price_product_text = '';
        $price_all = 0;

        foreach($_SESSION['package'] as $value){
            $all_count += $value['count'];
            $pro = DB::table('product')->where('id',$value['id'])->first();
            // Only submit product find price
            if($product_id == $pro->id){
                if(isset($pro->price_discount)){
                    $price_product += $value['count'] * $pro->price_discount;
                }else{
                    $price_product += $value['count'] * $pro->price;
                }
                $price_product_text .= number_format($price_product,0,' ',' ')." RUB";
            }
            if(isset($pro->price_discount))
                $price_all += $value['count'] * $pro->price_discount;
            else
                $price_all += $value['count'] * $pro->price;
        }

        $text = '';
        $text .= '<sapn>ВСЕГО:</sapn> '; $text .= number_format($price_all,0,' ',' '); $text .= ' RUB';

        return response()->json(array(
            'product_id' => $product_id,
            'product_count' => $product_count,
            'all_count'=> $all_count,
            'text' => $text,
            'price_product' => $price_product,
            'price_product_text' => $price_product_text,
        ), 200);
    }
}
