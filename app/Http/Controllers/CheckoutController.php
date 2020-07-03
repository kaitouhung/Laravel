<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

use DB;
use Cart;

class CheckoutController extends Controller
{


    public function AuthLogin(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return Redirect::to('/admin-dashboard');
        }else{
            return Redirect::to('/login')->send();
        }

        
    }
    public function login_checkout(){

        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.login-checkout')->with('category',$cate_product)->with('brand',$brand_product);
    }

    public function login_customer(Request $request){
        $email=$request->email_account;
        $password=md5($request->password_account);
        $result=DB::table('customer')->where('customer_email',$email)->where('customer_password',$password)->first();

        
        // echo('<pre');
        // print_r($result);
        // echo('</pre>');
        if($result){
            Session::put('customer_id',$result->customer_id);
            return Redirect::to('/checkout');
        }else{
            
            return Redirect::to('/login-checkout');
        }
        
        
    }

    public function logout_checkout(){
        Session::flush();
        return Redirect::to('/login-checkout');
    }

    public function add_customer(Request $request){
        

        $data=array();
        $data['customer_name']=$request->customer_name;
        $data['customer_email']=$request->customer_email;
        $data['customer_password']=md5($request->customer_password);
        $data['customer_phone']=$request->customer_phone;
        $customer_id=DB::table('customer')->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
        return Redirect::to('/checkout');

    }

    public function checkout(){
        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();
        return view('pages.checkout')->with('category',$cate_product)->with('brand',$brand_product);
       
    }

    public function save_checkout_customer(Request $request){

        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_phone']=$request->shipping_phone;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_notes']=$request->shipping_notes;
        $data['shipping_address']=$request->shipping_address;

        $shipping_id=DB::table('shipping')->insertGetId($data);
        // echo('<pre>');
        // print_r($shipping_id);
        // echo('</pre>');

        Session::put('shipping_id',$shipping_id);
              
        return Redirect::to('/payment');

    }


    public function payment(){  
        $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
        $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

        return view('pages.payment')->with('category',$cate_product)->with('brand',$brand_product);   
    }

    public function order_place(Request $request){
        $cart=Cart::content();
        if(count($cart) == 0){
            Session::put('message','Bạn cần phải lựa hàng trước khi thanh toán nha');
            return Redirect::to('/payment');
        }else{
            //get payment method        

        $data=array();
        $data['payment_method']=$request->payment_option;
        $data['payment_status']='Đang chờ xử lý';
        $payment_id =DB::table('payment')->insertGetId($data);

        //insert order
        $order_data =array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$payment_id;
        $order_data['order_total']=Cart::total();
        $order_data['order_status']='Đang chờ xử lý';
        $order_id =DB::table('order')->insertGetId($order_data);

        //insert order_place
        $content =Cart::content();
         
        foreach($content as $v_content){
            $order_d_data['order_id']=$order_id;
            $order_d_data['product_id']=$v_content->id;
            $order_d_data['product_name']=$v_content->name;
            $order_d_data['product_price']=$v_content->price;
            $order_d_data['product_sales_quantity']=$v_content->qty;
            DB::table('order_details')->insert($order_d_data);
        }
        if($data['payment_method']==1){
            echo "Thanh toán bằng thẻ ATM";
        }else if($data['payment_method']==2){
            Cart::destroy();
            $cate_product=DB::table('category_product')->where('category_status','1')->orderby('category_id','desc')->get();
            $brand_product=DB::table('brand_product')->where('brand_status','1')->orderby('brand_id','desc')->get();

            return view('pages.handcash')->with('category',$cate_product)->with('brand',$brand_product);

            
        }else{
            echo "Thanh toán bằng thẻ ghi nợ";
        }

        }
        

    }
    public function manage_order(){
        $this->AuthLogin();
        $all_order=DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->select('order.*','customer.customer_name')
        ->orderby('order.order_id')->get();
        return view('admin.manage-order')->with('all_order',$all_order);
    }
    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id=DB::table('order')
        ->join('customer','order.customer_id','=','customer.customer_id')
        ->join('shipping','order.shipping_id','=','shipping.shipping_id')
        ->join('order_details','order.order_id','=','order_details.order_id')
        ->select('order.*','customer.*','shipping.*','order_details.*')
        ->where('order_details.order_id',$orderId)
        ->get();

        // echo $order_by_id;
       
        return view('admin.view-order')->with('order_by_id',$order_by_id);
    }

    public function confirm_order($orderId){
        $this->AuthLogin();
        
        // $data=DB::table('order')
        // ->join('payment','order.payment_id','=','payment.payment_id')
        // ->where('order.order_id',$orderId)->get();

        $data=array();
        $data['order_status']='Đã xác nhận đơn hàng';
        DB::table('order')->where('order_id',$orderId)->update($data);

        $payment_id=DB::table('order')
        ->join('payment','order.payment_id','=','payment.payment_id')
        ->select('order.payment_id')
        ->where('order.order_id',$orderId)->get();

        $get_payment_id=$payment_id[0]->payment_id;

        $data2=array();
        $data2['payment_status']='Đã xác nhận đơn hàng';
        DB::table('payment')->where('payment_id',$get_payment_id)->update($data2);
        

        // $test=DB::table('shipping')
        // ->select('shipping.*')
        // ->where('shipping.shipping_id',$shipping_id)
        // ->get();

        // echo $test;
        

        // 
        
        // ->update('order.order_status',$confirm);
        // // ->update('payment.payment_status',"Đã xác nhận đơn hàng");
        
        return Redirect::to('/manage-order');

    }

    public function delete_order($orderId){
        $this->AuthLogin();

        $order_details= DB::table('order_details')
        ->select('order_details.order_details_id')
        ->where('order_details.order_id',$orderId)->get();       

        // echo $order_details;

        for($i=0 ; $i<count($order_details) ; $i++ ){
            $test=$order_details[$i]->order_details_id;
            DB::table('order_details')->where('order_details_id',$test)->delete();
        }

        $payment_id=DB::table('order')
        ->join('payment','order.payment_id','=','payment.payment_id')
        ->select('order.payment_id')
        ->where('order.order_id',$orderId)->get();
        // echo $payment_id;
        $get_payment_id=$payment_id[0]->payment_id;
        

        $shipping_id=DB::table('order')
        ->join('shipping','order.shipping_id','=','shipping.shipping_id')
        ->select('order.shipping_id')
        ->where('order.order_id',$orderId)->get();
        // echo $shipping_id;
        $get_shipping_id=$shipping_id[0]->shipping_id;
        


        DB::table('order')->where('order_id',$orderId)->delete();

        DB::table('payment')->where('payment_id',$get_payment_id)->delete();
        DB::table('shipping')->where('shipping_id',$get_shipping_id)->delete();

        

        return Redirect::to('/manage-order');

    }



    
}
