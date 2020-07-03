<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

use DB;

class HomeController extends Controller
{

    //trang chủ

    public function index(){
        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        // $all_product=DB::table('product')
        // ->join('category_product','category_product.category_id','=','product.category_id')
        // ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        // ->orderby('product.product_id')->get();
        
        $all_product=DB::table('product')->where('product_status','1')->orderby('product_id','desc')->limit(6)->get();

        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product);
    }

    public function show_category($category_id){
        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();       
      
        $category_by_id=DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->where('category_product.category_id',$category_id)->get();
        $category_name=DB::table('category_product')->where('category_id',$category_id)->limit(1)->get();
        
        // echo('<pre>');
        // print_r($category_by_id);
        // echo('</pre>');
        

        return view('pages.show-category')->with('category_show',$category_by_id)->with('category',$cate_product)->with('brand',$brand_product)->with('category_name',$category_name);

    }

    public function show_brand($brand_id){
        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();       
      
        $brand_by_id=DB::table('product')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->where('brand_product.brand_id',$brand_id)->get();
        $brand_name=DB::table('brand_product')->where('brand_id',$brand_id)->limit(1)->get();
        
        // echo('<pre>');
        // print_r($category_by_id);
        // echo('</pre>');
        

        return view('pages.show-brand')->with('brand_show',$brand_by_id)->with('category',$cate_product)->with('brand',$brand_product)->with('brand_name',$brand_name);

    }

    // chi tiết sản phẩm
    public function details_product($product_id){
        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        
        
        $details_product=DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->where('product.product_id',$product_id)->get();

        // echo('<pre>');
        // print_r($details_product);
        // echo('</pre>');
        foreach($details_product as $key =>$value ){
            $category_id=$value->category_id;
        }

            
        $related_product=DB::table('product')
        ->join('category_product','category_product.category_id','=','product.category_id')
        ->join('brand_product','brand_product.brand_id','=','product.brand_id')
        ->where('product.category_id',$category_id)->whereNotIn('product.product_id',[$product_id])->get();

        return view('pages.show-details')->with('category',$cate_product)->with('brand',$brand_product)->with('details_product',$details_product)->with('relate',$related_product);

    }

    public function search(Request $request){
        $keywords=$request->keywords_submit;
        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        $search_product=DB::table('product')->where('product_name','like','%'.$keywords.'%')->get();
    
        return view('pages.search')->with('category',$cate_product)->with('brand',$brand_product)->with('search_product',$search_product);
    }




}
