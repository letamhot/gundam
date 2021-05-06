@extends('admin.layouts.layouts')
@section('title', 'Nhà phân phối')
@section('content')

<div class="content-wrapper">
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sách nhà phân phối</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Trang admin</a></li>
                        <li class="breadcrumb-item active">Nhà phân phối</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="callout callout-info">
                        <a href="{{route('admin.producer.create')}}" class="btn btn-success btn-sm">Thêm</a>
                        <a href="{{ route('admin.producer.trash') }}" class="btn btn-danger btn-sm">Thùng rác</a>
                        <div class="input-group input-group-sm col-5" style="float: right;">
                            <input type="text" name="serach" value="{{request('query')}}" id="serach" class="form-control"
                                placeholder="Search">
                        </div>
                    </div>

                    <br />
                    <div class="invoice p-3 mb-3">
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped table-bordered" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th> 
                                                <a type="button" class="sorting" data-sorting_type="asc" data-column_name="name" style="cursor: pointer"> Tên nhà phân phối</a>
                                                <span id="name_icon"></span>
                                            </th>
                                            <th>Chi tiết tên nhà phân phối</th>
                                            <th> 
                                                <a type="button" class="sorting" data-sorting_type="asc" data-column_name="address" style="cursor: pointer"> Địa chỉ</a>
                                                <span id="address_icon"></span>
                                            </th>
                                            <th> 
                                                <a type="button" class="sorting" data-sorting_type="asc" data-column_name="phone" style="cursor: pointer"> Số điện thoại</a>
                                                <span id="phone_icon"></span>
                                            </th>
                                            <th>Mã số thuế</th>
                                            <th>Ảnh đại diện nhà phân phối</th>
                                            <th colspan="2">Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('admin.producer.producerData')
                                    </tbody>
                                </table>
                                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                <input type="hidden" name="hidden_column_name" id="hidden_column_name" value="name" />
                                <input type="hidden" name="hidden_sort_type" id="hidden_sort_type" value="asc" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@push('js-producer')

<script>
       $(document).ready(function(){

            function clear_icon()
            {
                $('#name_icon').html('');
                $('#address_icon').html('');
                $('#phone_icon').html('');
            }

            function fetch_data(page, sort_type, sort_by, query)
            {
                $.ajax({
                    url:"/admin/producer/producerData?page="+page+"&sortby="+sort_by+"&sorttype="+sort_type+"&query="+query,
                    success:function(data)
                    {
                        $('tbody').html('');
                        $('tbody').html(data);
                    }
                })
            }

            $(document).on('keyup', '#serach', function(){
                var query = $('#serach').val();
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();
                var page = $('#hidden_page').val();
                fetch_data(page, sort_type, column_name, query);
            });

            $(document).on('click', '.sorting', function(){
                var column_name = $(this).data('column_name');
                var order_type = $(this).data('sorting_type');
                var reverse_order = '';
                if(order_type == 'asc')
                {
                    $(this).data('sorting_type', 'desc');
                    reverse_order = 'desc';
                    clear_icon();
                    $('#'+column_name+'_icon').html('<i class="fas fa-caret-down"></i>');
                }
                if(order_type == 'desc')
                {
                    $(this).data('sorting_type', 'asc');
                    reverse_order = 'asc';
                    clear_icon
                    $('#'+column_name+'_icon').html('<i class="fas fa-caret-up"></i>');
                }
                $('#hidden_column_name').val(column_name);
                $('#hidden_sort_type').val(reverse_order);
                var page = $('#hidden_page').val();
                var query = $('#serach').val();
                fetch_data(page, reverse_order, column_name, query);
            });

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                $('#hidden_page').val(page);
                var column_name = $('#hidden_column_name').val();
                var sort_type = $('#hidden_sort_type').val();

                var query = $('#serach').val();

                $('li').removeClass('active');
                $(this).parent().addClass('active');
                fetch_data(page, sort_type, column_name, query);
            });

        });

    </script>
   
    
@endpush