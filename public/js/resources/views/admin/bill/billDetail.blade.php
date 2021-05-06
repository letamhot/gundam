@extends('admin.layouts.layouts')
@section('title', 'Chi Tiết Hóa Đơn')
@section('content')

<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Danh sách chi tiết hóa đơn</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Trang Admin</a></li>
                        <li class="breadcrumb-item active">Chi tiết hóa đơn</li>
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
                        <a href="{{route('admin.dashboard')}}" class="btn btn-success btn-sm">
                            Trang Admin</a>
                        <div class="input-group input-group-sm col-5" style="float: right;">
                            <input type="text" name="serach" value="{{request('query')}}" id="serach"
                                class="form-control" placeholder="Search">
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
                                            <th>Hóa Đơn</th>
                                            <th>
                                                <a type="button" class="sorting" data-sorting_type="asc"
                                                    data-column_name="productName" style="cursor: pointer"> Tên sản phẩm</a>
                                                <span id="productName_icon"></span>
                                            </th>
                                            <th>Size</th>
                                            <th>
                                                <a type="button" class="sorting" data-sorting_type="asc"
                                                    data-column_name="quantity" style="cursor: pointer">Số lượng</a>
                                                <span id="quantity_icon"></span>
                                            </th>
                                            <th>
                                                <a type="button" class="sorting" data-sorting_type="asc"
                                                    data-column_name="unit_price" style="cursor: pointer"> Địa chỉ</a>
                                                <span id="unit_price_icon"></span>
                                            </th>
                                            <th colspan="2">Hoạt động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @include('admin.bill.dataBillDetail')
                                    </tbody>
                                </table>
                                <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                                <input type="hidden" name="hidden_column_name" id="hidden_column_name"
                                    value="quantity" />
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
@push('js-billDetail')

<script>
    $(document).ready(function() {
        function clear_icon() {
            $('#productName_icon').html('');
            $('#quantity_icon').html('');
            $('#unit_price_icon').html('');
        }

        function fetch_data(page, sort_type, sort_by, query) {
            $.ajax({
                url: "/admin/bill/dataBillDetail?page=" + page + "&sortby=" + sort_by + "&sorttype=" +
                    sort_type + "&query=" + query,
                success: function(data) {
                    $('tbody').html('');
                    $('tbody').html(data);
                }
            })
        }
        $(document).on('keyup', '#serach', function() {
            var query = $('#serach').val();
            var column_name = $('#hidden_column_name').val();
            var sort_type = $('#hidden_sort_type').val();
            var page = $('#hidden_page').val();
            fetch_data(page, sort_type, column_name, query);
        });
        $(document).on('click', '.sorting', function() {
            var column_name = $(this).data('column_name');
            var order_type = $(this).data('sorting_type');
            var reverse_order = '';
            if (order_type == 'asc') {
                $(this).data('sorting_type', 'desc');
                reverse_order = 'desc';
                clear_icon();
                $('#' + column_name + '_icon').html('<i class="fas fa-caret-down"></i>');
            }
            if (order_type == 'desc') {
                $(this).data('sorting_type', 'asc');
                reverse_order = 'asc';
                clear_icon
                $('#' + column_name + '_icon').html('<i class="fas fa-caret-up"></i>');
            }
            $('#hidden_column_name').val(column_name);
            $('#hidden_sort_type').val(reverse_order);
            var page = $('#hidden_page').val();
            var query = $('#serach').val();
            fetch_data(page, reverse_order, column_name, query);
        });
        $(document).on('click', '.pagination a', function(event) {
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