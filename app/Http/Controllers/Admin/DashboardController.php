<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\BillDetail;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function dashboard()
    {
        //Tổng tiền khách đã đặt
        $sumPrice = Bill::where('status', 1)->whereDate('created_at', '=', date('Y-m-d'))->sum('priceTotal');
        //Tổng số sản phẩm
        $product = Product::all()->sum('amount');
        //Tổng số sản phẩm đã bán
        $totalProduct = BillDetail::sum('quantity');
        // Bills
        $bill = Bill::all();
        //Thống kê bills theo ngày
        $todayBills = Bill::whereDate('created_at', '=', date('Y-m-d'))->get();
        // $todayBill_detail = BillDetail::whereDate('created_at', '=', date('Y-m-d'))->get();


        $day_bills = array();
        for ($i = 0; $i <= 30; $i++) {
            $day_bills[$i] = Bill::where('status', 1)->whereDay('created_at', $i + 1)->whereMonth('created_at', date('m'))->sum('priceTotal');
        }
        $month_bills = array();

        for ($i = 0; $i < 12; $i++) {
            $month_bills[$i] = Bill::where('status', 1)->whereMonth('created_at', $i + 1)->sum('priceTotal');
        }
        // dd($month_bills);

        return view('admin.dashboard.index', compact('sumPrice', 'totalProduct', 'product', 'bill', 'todayBills', 'day_bills', 'month_bills'));
    }
    public function error404()
    {
        return view('admin.404');
    }
    public function register()
    {
        return view('auth.register');
    }
    public function button()
    {
        return view('admin.button');
    }

    public function card()
    {
        return view('admin.card');
    }

    public function chart()
    {
        return view('admin.chart');
    }
    public function table()
    {
        return view('admin.table');
    }
    public function animation()
    {
        return view('admin.utilities.animation');
    }

    public function border()
    {
        return view('admin.utilities.border');
    }

    public function color()
    {
        return view('admin.utilities.color');
    }

    public function orther()
    {
        return view('admin.utilities.orther');
    }

    // public function index1(Request $request)
    // {


    //     if ($request->session()->has('remember_token')) {
    //         return view('yte', ['name' => $request->session()->get('username')]);
    //     } else return view('admin.404');

    // }

}

