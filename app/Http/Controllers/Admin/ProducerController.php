<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProducerExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProducerRequest;
use App\Http\Requests\UpdateProducerRequest;
use App\Imports\ProducerImport;
use App\Models\Producer;
use App\Services\ProducerService;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProducerController extends Controller
{
    protected $producerService;
    protected $fileService;
    public function __construct(ProducerService $producerService, UploadFileService $fileService)
    {
        $this->producerService = $producerService;
        $this->fileService = $fileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producer = $this->producerService->getListProducer();
        return view('admin.producer.index', compact('producer'));
    }
    public function dataProducer(Request $request)
    {
        if($request->ajax())
        {
            $producer = $this->producerService->dataProducer($request);
            return view('admin.producer.producerData', compact('producer'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.producer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProducerRequest $request)
    {
        $data = $request->except('image');
        if($request->hasFile('image')){
            $data['image'] = $this->fileService->uploadFile($request->file('image'), "imageProducer/");

        }
        $producer = $this->producerService->create($data);
        // dd($producer);
        if($producer)
            return redirect()->route('admin.producer.index')->with('success','Create Success');
        return redirect()->route('admin.producer.index')->with('error','Create Error');
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
        $producer = Producer::find($id);
        return view('admin.producer.edit', compact('producer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProducerRequest $request, $id)
    {
        $producer = Producer::find($id);
        $data = $request->except('image');
        if($request->hasFile('image')){
            $data['image'] = $this->fileService->uploadFile($request->file('image'), "imageProducer/");
            $this->fileService->deleteFile($producer->image);
        }
        $producer = $this->producerService->update($data, $producer);
        // dd($producer);
        if($producer)
            return redirect()->route('admin.producer.index')->with('success','Updated Success');
        return redirect()->route('admin.producer.index')->with('error','Updated Error');
            
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producer = $this->producerService->destroy($id);
        if(!$producer)
            return redirect()->route('admin.producer.index')->with('success','Deleted Success');
        return redirect()->route('admin.producer.index')->with('error','Deleted Error');
    }
    public function trash(){
        $producer = $this->producerService->trash();
        // dd($user);

        return view('admin.producer.trash', compact('producer'));
    }

    public function producerTrashData(Request $request)
    {
        $producer = $this->producerService->producerTrashData($request);
        return view('admin.producer.trashData', compact('producer'))->render();

    }

    public function restore($id){
        $producer = $this->producerService->restore($id);
        if($producer)
            return redirect()->route('admin.producer.trash')->with('success','Restored Success');
        return redirect()->route('admin.producer.trash')->with('error','Restored Error');
    }

    public function deleteTrash($id){
        $producer = $this->producerService->deleteTrash($id);
        if(!$producer)
            return redirect()->route('admin.producer.trash')->with('success','Deleted Trash Success');
        return redirect()->route('admin.producer.trash')->with('error','Deleted Trash Error');
    }

    public function export() 
    {
        return Excel::download(new ProducerExport, 'producer.xlsx');
    }
     
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        // dd(Excel::import(new ProducerImport,request()->file('file')->getRealPath()));

        Excel::import(new ProducerImport,request()->file('file')->getRealPath());
             
        return back();
    }
}
