@extends('/admin/admin-dashboard')
@section('admin-content') 





<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Cập nhật Nhãn hàng</h3>
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
            

            @foreach ($edit_brand_product as $key =>$edit_value)
                
        
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
              <form id="demo-form" data-parsley-validate action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="POST">
                {{ csrf_field() }}
                  <label for="fullname">Tên danh mục * :</label>
                  <input type="text" id="fullname" class="form-control" name="brand_product_name" required value="{{$edit_value->brand_name}}"/>                
                   
                    <br />
                    <p>

                      <label for="heard">Lựa chọn hiển thị *:</label>
                      <select id="heard" class="form-control" required name="brand_product_status">
                        <?php 
                        if(($edit_value->brand_status)==0){
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

                      <label for="message">Mô tả (20 chars min, 100 max) :</label>
                      <textarea id="message" style="resize: none;" rows="4" required="required" class="form-control" name="brand_product_desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                        data-parsley-validation-threshold="10">{{$edit_value->brand_desc}}</textarea>

                      <br/>
                      <input class="btn btn-primary" type="submit" name="edit_brand_product" value="Cập nhật Brand sản phẩm"></span>

                </form>
                <!-- end form for validations -->

              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>





@endsection