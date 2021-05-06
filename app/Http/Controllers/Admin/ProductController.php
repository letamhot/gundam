<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Imports\ProductImport;
use App\Models\Producer;
use App\Models\Product;
use App\Services\ProductService;
use App\Services\UploadFileService;

use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    protected $productService;
    protected $fileService;
    public function __construct(ProductService $productService, UploadFileService $fileService)
    {
        $this->productService = $productService;
        $this->fileService  = $fileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = $this->productService->getlistProduct();

        return view('admin.product.index', compact('product'));
    }

    public function productData(Request $request)
    {
        if($request->ajax())
        {
            $product = $this->productService->productData($request);

            return view('admin.product.productData', compact('product'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $producer = Producer::all();
        return view('admin.product.create', compact('category', 'producer'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data= $request->except('image', 'image1', 'image2');
        if($request->hasFile('image')){
            $data['image'] = $this->fileService->uploadFile($request->file('image'), "imageProduct/");

        }
        if($request->hasFile('image1')){
            $data['image1'] = $this->fileService->uploadFile($request->file('image1'), "imageProduct/");

        }
        if($request->hasFile('image2')){
            $data['image2'] = $this->fileService->uploadFile($request->file('image2'), "imageProduct/");

        }
        $data['id_category'] = $request['category'];
        $data['id_producer'] = $request['producer'];
        // dd($data);

        $product = $this->productService->createProduct($data);
       
        // dd($product);
        if($product)
            return redirect()->route('admin.product.index')->with('success','Create Success');
        return redirect()->route('admin.product.index')->with('error','Create Error');

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
        $product = Product::find($id);
        $category = Category::all();
        $producer = Producer::all();
        return view('admin.product.edit', compact('category', 'producer', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        $data= $request->except(['image', 'image1', 'image2']);
        if($request->hasFile('image')){
            $data['image'] = $this->fileService->uploadFile($request->file('image'), "imageProduct/");
            $this->fileService->deleteFile($product->image);


        }
        if($request->hasFile('image1')){
            $data['image1'] = $this->fileService->uploadFile($request->file('image1'), "imageProduct/");
            $this->fileService->deleteFile($product->image1);


        }
        if($request->hasFile('image2')){
            $data['image2'] = $this->fileService->uploadFile($request->file('image2'), "imageProduct/");
            $this->fileService->deleteFile($product->image2);


        }
        $data['id_category'] = $request['category'];
        $data['id_producer'] = $request['producer'];
        // dd($data);
        $product = $this->productService->update($data, $product);
        // dd($product);
      
        if($product)
            return redirect()->route('admin.product.index')->with('success','Update Success');
        return redirect()->route('admin.product.index')->with('error','Update Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productService->destroy($id);
        if(!$product)
            return redirect()->route('admin.product.index')->with('success','Delete Success');
        return redirect()->route('admin.product.index')->with('error','Delete Error');
    }

    public function trash()
    {
        $product = $this->productService->trash();
        return view('admin.product.trash', compact('product'));
    }

    public function productTrashData(Request $request)
    {
        if($request->ajax())
        {
            $product = $this->productService->productTrashData($request);
            return view('admin.product.trashData', compact('product'))->render();
        }
    }

    public function restore($id){
        $product = $this->productService->restore($id);
        if($product)
            return redirect()->route('admin.product.trash')->with('success','Restore Success');
        return redirect()->route('admin.product.trash')->with('error','Restore Error');
    }

    public function deleteTrash($id){
        $product = $this->productService->deleteTrash($id);
        if(!$product)
            return redirect()->route('admin.product.trash')->with('success','Delete Success');
        return redirect()->route('admin.product.trash')->with('error','Delete Error');
    }

    public function export() 
    {
        return Excel::download(new ProductExport, 'Product.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {
        $request->validate([
            'file' => 'required'
        ]);
        // dd(Excel::import(new ProductImport,request()->file('file')->getRealPath()));

        Excel::import(new ProductImport,request()->file('file')->getRealPath());
             
        return back();
    }

    
}
