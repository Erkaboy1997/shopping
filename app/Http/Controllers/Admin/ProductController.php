<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        return view('admin.product.index') -> with('product',Product::orderBy('id','desc')->paginate(20));
    }

    public function create(){
        $colors = DB::table('color')->get();
        $seasons = DB::table('season')->get();
        $sizes = DB::table('size')->get();
        $category = DB::table('category')->where('parent_id','!=',0)->get();
        return view('admin.product.create',[
            'category' => $category,
            'colors' => $colors,
            'seasons' => $seasons,
            'sizes' => $sizes,
        ]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'image' => 'required',
        ]);
        $product = new Product();
        $lastProduct = DB::table('product')->orderByDesc('id') -> first();
        $code = 0;
        if(empty($lastProduct)){
            $code = 100000;
        }else{
            $code = $lastProduct->code + 1;
        }

        $image = '';
        if(isset($request->image)){
            $name =  "0".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload =  $request->image->move(public_path('uploads/'), $name);
            $image = $name;
        }

        $image1 = '';
        if(isset($request->image1)){
            $name1 =  "1".date('Y_m_d_H-i-s') . "." . $request->image1->getClientOriginalExtension();
            $upload1 =  $request->image1->move(public_path('uploads/'), $name1);
            $image1 = $name1;
        }

        $image2 = '';
        if(isset($request->image2)){
            $name2 =  "2".date('Y_m_d_H-i-s') . "." . $request->image2->getClientOriginalExtension();
            $upload2 =  $request->image2->move(public_path('uploads/'), $name2);
            $image2 = $name2;
        }

        $image3 = '';
        if(isset($request->image3)){
            $name3 =  "3".date('Y_m_d_H-i-s') . "." . $request->image3->getClientOriginalExtension();
            $upload3 =  $request->image3->move(public_path('uploads/'), $name3);
            $image3 = $name3;
        }

        $image4 = '';
        if(isset($request->image4)){
            $name4 =  "4".date('Y_m_d_H-i-s') . "." . $request->image4->getClientOriginalExtension();
            $upload4 =  $request->image4->move(public_path('uploads/'), $name4);
            $image4 = $name4;
        }

        if($upload){
            $product -> code = $code;
            $product -> name = $request -> name;
            $product -> price = $request -> price;
            $product -> price_discount = $request->price_discount;
            $product -> description = $request->description;
            $product -> delivery = $request -> delivery;
            $product -> recomended = $request -> recomended;
            $product -> character = $request -> character;
            $product -> category_id = $request -> category_id;
            $product -> image = $image;
            $product -> image1 = $image1;
            $product -> image2 = $image2;
            $product -> image3 = $image3;
            $product -> image4 = $image4;
            $product -> alt = $request -> alt;
            $product -> status = $request -> status;

            //dd($request->seasons);

            $product -> save();
            $product->colors()->sync($request->colors);
            $product->sizes()->sync($request->sizes);
            $product->seasons()->sync($request->seasons);
            return redirect()->route('admin.product.index')->with('success','Cозданы успешно!');
        }
    }

    public function edit($id){
        $colors = DB::table('color')->get();
        $seasons = DB::table('season')->get();
        $sizes = DB::table('size')->get();
        $category = DB::table('category')->where('parent_id','!=',0)->get();
        return view('admin.product.update')->with([
            'product' => Product::find($id),
            'colors' => $colors,
            'seasons' => $seasons,
            'sizes' => $sizes,
            'category' => $category,
        ]);
    }

    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        /*echo "<pre>";
        print_r($_FILES);
        die();*/

        $old = $product->image;
        if ($request->hasFile('image')){
            (file_exists('uploads'."/".$old))? unlink('uploads'."/".$old):'';

            $name =  "1".date('Y_m_d_H-i-s') . "." . $request->image->getClientOriginalExtension();
            $upload =  $request->image->move(public_path('uploads/'), $name);
            if(!$upload)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image = $name;

        }
        else   $image = $old;

        $old1 = $product->image1;
        if ($request->hasFile('image1')){
            (file_exists('uploads'."/".$old1))? unlink('uploads'."/".$old1):'';
            $name1 =  "2".date('Y_m_d_H-i-s') . "." . $request->image1->getClientOriginalExtension();
            $upload1 =  $request->image1->move(public_path('uploads/'), $name1);
            if(!$upload1)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image1 = $name1;
        }
        else   $image1 = $old1;

        $old2 = $product->image2;
        if ($request->hasFile('image2')){
            (file_exists('uploads'."/".$old2))? unlink('uploads'."/".$old2):'';
            $name2 =  "3".date('Y_m_d_H-i-s') . "." . $request->image2->getClientOriginalExtension();
            $upload2 =  $request->image2->move(public_path('uploads/'), $name2);
            if(!$upload2)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image2 = $name2;
        }else $image2 = $old2;

        $old3 = $product->image3;
        if ($request->hasFile('image3')){
            (file_exists('uploads'."/".$old3))? unlink('uploads'."/".$old3):'';

            $name3 =  "4".date('Y_m_d_H-i-s') . "." . $request->image3->getClientOriginalExtension();
            $upload3 =  $request->image3->move(public_path('uploads/'), $name3);
            if(!$upload3)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image3 = $name3;

        }
        else   $image3 = $old3;

        $old4 = $product->image4;
        if ($request->hasFile('image4')){
            (file_exists('uploads'."/".$old4))? unlink('uploads'."/".$old4):'';

            $name4 =  "5".date('Y_m_d_H-i-s') . "." . $request->image4->getClientOriginalExtension();
            $upload4 =  $request->image4->move(public_path('uploads/'), $name4);
            if(!$upload4)
                return back()->with('danger','Изображение не может быть загружено!');
            else
                $image4 = $name4;

        }else   $image4 = $old4;

        $product -> name = $request -> name;
        $product -> price = $request -> price;
        $product -> price_discount = $request->price_discount;
        $product -> description = $request->description;
        $product -> delivery = $request -> delivery;
        $product -> recomended = $request -> recomended;
        $product -> character = $request -> character;
        $product -> category_id = $request -> category_id;
        $product -> image = $image;
        $product -> image1 = $image1;
        $product -> image2 = $image2;
        $product -> image3 = $image3;
        $product -> image4 = $image4;
        $product -> alt = $request -> alt;
        $product -> status = $request -> status;
        $product -> save();
        $product->colors()->sync($request->colors);
        $product->sizes()->sync($request->sizes);
        $product->seasons()->sync($request->seasons);

        return redirect()->route('admin.product.index')->with('success','Успешно обновлено!');
    }

    public function show($id){
        return view('admin.product.show') -> with('product',Product::find($id)->first());
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        if(!empty($product->image))
            if(file_exists('uploads'."/".$product->image)){
                unlink('uploads'."/".$product->image);
            }

        if(!empty($product->image1))
            if(file_exists('uploads'."/".$product->image1)){
                unlink('uploads'."/".$product->image1);
            }

        if(!empty($product->image2))
            if(file_exists('uploads'."/".$product->image2)){
                unlink('uploads'."/".$product->image2);
            }

        if(!empty($product->image3))
            if(file_exists('uploads'."/".$product->image3)){
                unlink('uploads'."/".$product->image3);
            }

        if(!empty($product->image4))
            if(file_exists('uploads'."/".$product->image4)){
                unlink('uploads'."/".$product->image4);
            }

        $product -> delete();
        return redirect()->route('admin.product.index')->with('success',"Удалено успешно!");
    }
}
