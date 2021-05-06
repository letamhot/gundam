<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use App\Services\UploadFileService;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    protected $fileService;
    public function __construct(UploadFileService $fileService)
    {
        $this->fileService =$fileService;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slide = Slide::all();
        return view('admin.slide.index', compact('slide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide();
        if($request->hasFile('image')){
            $slide->image = $this->fileService->uploadFile($request->file('image'), "slides/");

        }
    // dd($slide);
        $slide->save();
        return redirect()->route('admin.slide.index')->with('success', 'slide Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.show', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slide.edit', compact('slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slide = Slide::findOrfail($id);
        if($request->hasFile('image')){
            $slide->image = $this->fileService->uploadFile($request->file('image'), "slides/");
        }
        $slide->save();
        return redirect()->route('admin.slide.index')->with('success', 'slide Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return back()->with('success', "slide deleted successfully!");
    }
}
