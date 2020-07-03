@extends('/admin/admin-dashboard')
@section('admin-content') 





<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Cập nhật sản phẩm</h3>
          <?php
            $message=Session::get('message');
            if($message){
              echo('<span class="text-alert">'.$message.'</span>');
              Session::put('message',null);

            }
            



          ?>
        </div>

        
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 ">
            


            <div class="x_panel">
              <div class="x_title">
                <h2>Thêm</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Settings 1</a>
                        <a class="dropdown-item" href="#">Settings 2</a>
                      </div>
                  </li>
                  <li><a class="close-link"><i class="fa fa-close"></i></a>
                  </li>
                </ul>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">

                <!-- start form for validation -->
                @foreach ($edit_product as $key =>$product)
                    
                
              <form id="demo-form" data-parsley-validate action="{{URL::to('/update-product/'.$product->product_id)}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                  <label for="fullname">Tên sản phẩm * :</label>
              <input type="text" id="fullname" class="form-control" name="product_name" required value="{{$product->product_name}}" />             
                   
                    <br />
                    <p>
                    <label for="fullname">Giá sản phẩm * :</label>
                    <input type="text" id="fullname" class="form-control" name="product_price" required value="{{$product->product_price}}"/>                
                   
                    <br />
                    <p>
                    <label for="fullname">Hình ảnh sản phẩm * :</label>
                    <input type="file" id="fullname" class="form-control" name="product_image" required />
                    <img src="{{URL::to('public/admin/image/'.$product->product_image)}}" alt="" height="100" width="100">
                    <br />
                    <p>


                        <label for="heard">Danh mục sản phẩm *:</label>
                        <select id="heard" class="form-control" required name="product_category">
                          @foreach ($cate_product as $key => $cate)
                            @if($product->category_id == $cate->category_id){
                              <option selected  value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            }
                            @else{
                              <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                            }
                            @endif
                          
                        
                          @endforeach
                          
                        </select>

                        <label for="heard">Thương hiệu sản phẩm *:</label>
                      <select id="heard" class="form-control" required name="product_brand">
                        @foreach ($brand_product as $key => $brand)

                              @if($product->brand_id == $brand->brand_id){
                                <option selected  value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                              }
                              @else{
                                <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                              }
                              @endif
                            
                        @endforeach
                       
                      </select>

                    

                      <label for="heard">Lựa chọn hiển thị *:</label>
                      <select id="heard" class="form-control" required name="product_status">
                        <?php 
                        if(($product->product_status)==0){
                        ?>
                            <option value="0" selected="selected">Ẩn</option>
                            <option value="1">Hiện</option>
                        <?php
                        }else{
                        ?>
                            <option value="1" selected="selected">Hiện</option>
                            <option value="0" >Ẩn</option>
                        <?php
                        }
                        ?>
                        
                      </select>

                      <label for="message">Mô tả sản phẩm  :</label>
                      <textarea id="message" style="resize: none;" rows="4" required="required" class="form-control" name="product_desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                        data-parsley-validation-threshold="10">{{$product->product_desc}}</textarea>


                        <label for="message">Nội dung sản phẩm  :</label>
                      <textarea id="message" style="resize: none;" rows="4" required="required" class="form-control" name="product_content" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                        data-parsley-validation-threshold="10">{{$product->product_content}}</textarea>

                    

                      <br/>
                      <input class="btn btn-primary" type="submit" name="edit_product" value="Cập nhật sản phẩm"></span>

                </form>
                @endforeach
                <!-- end form for validations -->

              </div>
            </div>
        </div>
    </div>
</div>
</div>





@endsection