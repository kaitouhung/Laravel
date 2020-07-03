@extends('/admin/admin-dashboard')
@section('admin-content') 

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Danh sách đơn hàng</h3>
        </div>    
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12  ">
            <div class="x_panel">
              <div class="x_title">
                
                <h2>Table design <small>Custom design</small></h2>
                
                
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
                        <th class="column-title">Tên người đặt</th>
                        <th class="column-title">Tổng giá tiền</th>
                        <th class="column-title">Tình trạng</th>
                        <th class="column-title">Chi tiết đơn hàng</th>
                        <th class="column-title">Xác nhận đơn hàng</th>
                        <th class="column-title">Hủy đơn hàng</th>
                        
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($all_order as $key => $order)
                          
                      
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$order->customer_name}}</td>
                        <td class=" ">{{$order->order_total}} </td>
                        <td class=" ">{{$order->order_status}} </td>
                       
                        <td class=""><a  href="{{URL::to('/view-order/'.$order->order_id)}}">Xem</a>
                        <td class=""><a  onclick="return confirm('Bạn có muốn xác nhận dơn hàng này không ?')" href="{{URL::to('/confirm-order/'.$order->order_id)}}">Xác nhận</a>
                        </td>
                        <td class=""><a  onclick="return confirm('Bạn có muốn hủy đơn hàng này không ?')" href="{{URL::to('/delete-order/'.$order->order_id)}}">Hủy đơn hàng</a>
                        </td>
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