<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bill;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Services\BillService;
use Illuminate\Http\Request;

class BillController extends Controller
{
    protected $billService;
    public function __construct(BillService $billService) {
        $this->billService = $billService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $bill = $this->billService->getlistBill();
       return view('admin.bill.index', compact('bill'));
    }
    public function dataBill(Request $request)
    {
        if($request->ajax())
        {
            $bill = $this->billService->dataBill($request);
            return view('admin.bill.databill', compact('bill'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bill = Bill::find($id);
        return view('admin.bill.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $bill = $this->billService->editBill($data, $id);
        // dd($bill);
        if($bill)
            return redirect()->route('admin.bill.index')->with('success','Updated Success');
        return redirect()->route('admin.bill.index')->with('error','Updated Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = $this->billService->destroy($id);
       



        if(!$bill)
            return redirect()->route('admin.bill.index')->with('success','Deleted Success');
        return redirect()->route('admin.bill.index')->with('error','Deleted Error');
            
    }
    public function billDetail()
    {
        $billDetail = $this->billService->getBillDetail();
        return view('admin.bill.billDetail', compact('billDetail'));
    }
    public function dataBillDetail(Request $request)
    {
        if($request->ajax())
        {
            $billDetail = $this->billService->dataBillDetail($request);
            return view('admin.bill.dataBillDetail', compact('billDetail'))->render();
        }
    }

    public function destroybillDetail($id)
    {
        $billDetail = $this->billService->destroybillDetail($id);
        $amountProduct = Product::where('amount', $product->amount)->first();

    dd($amountProduct->amount += $billDetail->quantity);
        if(!$billDetail)
            return redirect()->route('admin.bill.billDetail')->with('success','Deleted Success');
        return redirect()->route('admin.bill.billDetail')->with('error','Deleted Error');
    }
}
