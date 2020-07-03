@extends('layout')
@section('content')

<section id="cart_items">
    {{-- <div class="container"> --}}        

        <div class="review-payment">
            <h2>Cảm ơn bạn đã đặt hàng, chúng tôi sẽ liên hệ bạn trong thời gian sớm nhất</h2>
        </div>        	

		<form action="{{URL::to('/order-place')}}" method="POST">
			{{csrf_field()}}
			

		</form>
        
    {{-- </div> --}}
</section> <!--/#cart_items-->






@endsection