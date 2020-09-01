@extends('/admin/admin-dashboard')
@section('admin-content') 

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Danh sách các danh mục sản phẩm</h3>
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
                        <th class="column-title">Tên</th>
                        <th class="column-title">Mô tả</th>
                        <th class="column-title">Status</th>
                        <th class="column-title">Sửa </th>
                        <th class="column-title">Xóa </th>                        
                        {{-- <th class="column-title no-link last"><span class="nobr">Action</span> --}}
                        </th>
                        <th class="bulk-actions" colspan="7">
                          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      @foreach ($all_category_product as $key => $cate_pro)
                          
                      
                      <tr class="even pointer">
                        <td class="a-center ">
                          <input type="checkbox" class="flat" name="table_records">
                        </td>
                        <td class=" ">{{$cate_pro->category_name}}</td>
                        <td class=" ">{{$cate_pro->category_desc}} </td>
                        <td class=" ">
                          <?php
                            if($cate_pro->category_status==0){
                              echo 'Ẩn';
                            }else{
                              echo 'Hiển thị';
                            }

                          ?>
                        </td>
                        <td class=""><a  href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}">Sửa</a>
                        <td class=""><a  onclick="return confirm('Bạn có muốn xóa danh mục sản phẩm này ?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}">Xóa</a>
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