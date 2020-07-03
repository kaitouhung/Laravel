@extends('/admin/admin-dashboard')
@section('admin-content') 

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Liệt kê chi tiết đơn hàng</h3>
        </div>    
      </div>
      <div class="clearfix"></div>
      
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                
                <h2>Thông tin người mua<small></small></h2>
                
                
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
                <?php
            $message=Session::get('message');
            if($message){
              echo('<span class="text-alert">'.$message.'</span>');
              Session::put('message',null);

            }           

          ?>

                

                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Tên khách hàng</th>
                        <th class="column-title">Số điện thoại</th>
                        
                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    
                          
                    
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        
                        <td class=" ">{{$order_by_id[0]->customer_name}}</td>
                        <td class=" "> {{$order_by_id[0]->customer_phone}}</td>
                        
                        
                      </tr>
                    
                   
                      
                    </tbody>
                  </table>
                </div>
            </div>
      </div>
       
    </div>
</div>

<br><br>

<br><br>

<div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                
                <h2>Thông tin vận chuyển<small></small></h2>
                
                
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
                <?php
            $message=Session::get('message');
            if($message){
              echo('<span class="text-alert">'.$message.'</span>');
              Session::put('message',null);

            }           

          ?>

                

                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">
                        <th>
                          <input type="checkbox" id="check-all" class="flat">
                        </th>
                        <th class="column-title">Tên người nhận hàng</th>
                        <th class="column-title">Địa chỉ</th>
                        <th class="column-title">Số điện thoại</th>
                        
                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    
                          
                      
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                       
                        <td class=" ">{{$order_by_id[0]->shipping_name}}</td>
                        <td class=" ">{{$order_by_id[0]->shipping_address}} </td>
                        <td class=" ">{{$order_by_id[0]->shipping_phone}} </td>
                        
                       
                      </tr>
                      
                   
                      
                    </tbody>
                  </table>
                </div>
            </div>
      </div>
       
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-12 col-sm-12  ">
        <div class="x_panel">
          <div class="x_title">
            
            <h2>Chi tiết sản phẩm<small></small></h2>
            
            
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
            <?php
        $message=Session::get('message');
        if($message){
          echo('<span class="text-alert">'.$message.'</span>');
          Session::put('message',null);

        }           

      ?>

            

            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th>
                      <input type="checkbox" id="check-all" class="flat">
                    </th>
                    <th class="column-title">Tên sản phẩm</th>
                    <th class="column-title">Số lượng</th>
                    <th class="column-title">Giá</th>
                    <th class="column-title">Tổng tiền chung</th>
                   
                    
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                
                      
                @foreach ($order_by_id as $key => $order_b_id)
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                   
                    <td class=" ">{{$order_b_id->product_name}}</td>
                    <td class=" "> {{$order_b_id->product_sales_quantity}}</td>
                    <td class=" ">{{$order_b_id->product_price}}</td>
                    <td class=" ">{{$order_b_id->order_total}}</td>
                   
                   
                   
                    
                  </tr>
                  @endforeach
                  
               
                  
                </tbody>
              </table>
            </div>
        </div>
  </div>
   
</div>
</div>












</div>
</div>







@endsection