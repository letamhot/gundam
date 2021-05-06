<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Services\UploadFileService;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;
    protected $fileService;
    public function __construct(UserService $userService, UploadFileService $fileService)
    {
        $this->userService = $userService;
        $this->fileService =$fileService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = $this->userService->getlistUser();
        // dd($user);
        return view('admin.user.index', compact('user'));

    }

    public function userData(Request $request){
        if($request->ajax())
        {
            $user = $this->userService->userData($request);
            return view('admin.user.userData', compact('user'))->render();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->except('avatar');
        if($request->hasFile('avatar')){
            $data['avatar'] = $this->fileService->uploadFile($request->file('avatar'), "imageUser/");

        }
        $user = $this->userService->createUser($data);
        if($user)
            return redirect()->route('admin.user.index')->with('success', 'Create Success');
        return redirect()->route('admin.user.index')->with('error','Create Error');
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
        $user = $this->userService->editUser($id);

        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->except('avatar');
        if($request->hasFile('avatar')){
            $data['avatar'] = $this->fileService->uploadFile($request->file('avatar'), "imageUser/");
            $this->fileService->deleteFile($user->avatar);
        }
        $user = $this->userService->updateUser($data, $user);
        // dd($user);


        if($user)
            return redirect()->route('admin.user.index')->with('success','Updated Success');
        return redirect()->route('admin.user.index')->with('error','Updated Error');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userService->destroyUser($id);
        if(!$user)
            return redirect()->route('admin.user.index')->with('success', 'Deleted Success');
        return redirect()->route('admin.user.index')->with('error', 'Deleted Error');
    }

    public function trash(){
        $user = $this->userService->trash();
        // dd($user);

        return view('admin.user.trash', compact('user'));
    }

    public function userTrashData(Request $request)
    {
        $user = $this->userService->userTrashData($request);
        return view('admin.user.trashData', compact('user'))->render();

    }

    public function restore($id){
        $user = $this->userService->restore($id);
        if($user)
            return redirect()->route('admin.user.trash')->with('success', 'Restored Success');
        return redirect()->route('admin.user.trash')->with('error', 'Restored Error');
    }

    public function delete($id){
        $user = $this->userService->delete($id);
        if(!$user)
            return redirect()->route('admin.user.trash')->with('success', 'Deleted Trash Success');
        return redirect()->route('admin.user.trash')->with('success', 'Deleted Trash Error');
    }
}
