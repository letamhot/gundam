<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CategoryExport;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Imports\CategoryImport;
use App\Services\CategoriesService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    protected $categoriesService;
    public function __construct(CategoriesService $categoriesService)
    {
        $this->categoriesService = $categoriesService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $category = $this->categoriesService->getListCategory();
        return view('admin.category.index', compact('category'));
    }

    public function dataCategory(Request $request)
    {
        if($request->ajax())
        {
            $category = $this->categoriesService->dataCategory($request);
            return view('admin.category.dataCategory', compact('category'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->categoriesService->create($request);
        // dd($category);
        if($category)
            return redirect()->route('admin.category.index')->with('success','Create Success');
        return redirect()->route('admin.category.index')->with('error','Create Error');
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
        $categories = $this->categoriesService->update($request, $id);
        if($categories)
            return redirect()->route('admin.category.index')->with('success','Updated Success');
        return redirect()->route('admin.category.index')->with('error','Updated Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = $this->categoriesService->destroy($id);
        if(!$category)
            return redirect()->route('admin.category.index')->with('success','Deleted Success');
        return redirect()->route('admin.category.index')->with('error','Deleted Error');
            
    }

    public function trash(){
        $category = $this->categoriesService->trash();
        return view('admin.category.trash', compact('category'));
    }

    public function datatrashCategory(Request $request)
    {
        $category = $this->categoriesService->datatrashCategory($request);
        return view('admin.category.trashData', compact('category'))->render();

    }

    public function restore($id){
        $category = $this->categoriesService->restore($id);
        if($category)
            return redirect()->route('admin.category.trash')->with('success','Restored Success');
        return redirect()->route('admin.category.trash')->with('error','Restored Error');
        
    }

    public function deleteTrash($id){
        $category = $this->categoriesService->deleteTrash($id);
        if(!$category)
            return redirect()->route('admin.category.trash')->with('success','Deleted Trash Success');
        return redirect()->route('admin.category.trash')->with('error','Deleted Trash Error');
            
    }

    public function CategoryimportExportView()
    {
       return view('import');
    }

    public function export() 
    {
        return Excel::download(new CategoryExport, 'category.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new CategoryImport,request()->file('file')->getRealPath());
             
        return back();
    }
}
