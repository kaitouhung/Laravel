@extends('layout')
@section('content')

<section id="cart_items">
    {{-- <div class="container"> --}}
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div><!--/breadcrums-->

        
        <div class="register-req">
            <p>Đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                
                <div class="col-sm-12 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin gửi hàng</p>
                        <div class="form-one">
                            <form method="post" action="{{URL::to('/save-checkout-customer')}}">
                                {{csrf_field()}}                         
                                <input type="text" placeholder="Email *" name="shipping_email">                           
                                <input type="text" placeholder="Tên người nhận hàng *" name="shipping_name">
                                <input type="text" placeholder="Địa chỉ *" name="shipping_address">
                                <input type="text" placeholder="Phone *" name="shipping_phone">
                                <p>Ghi chú gửi hàng</p>
                                <textarea name="shipping_notes"  placeholder="Ghi chú đơn hàng" rows="16"></textarea>
                                <input type="submit" name="send_order" value="Gửi" class="btn btn-primary btn-sm">
                                
                            </form>
                        </div>
                        
                    </div>
                </div>
                				
            </div>
        </div>
        {{-- <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div> --}}

        
        {{-- <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div> --}}
    {{-- </div> --}}
</section> <!--/#cart_items-->






@endsection