<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Rules\MatchOldPassword;
use App\Services\UploadFileService;
use App\Services\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Str;

class ChangePasswordController extends Controller
{
    protected $userService;
    protected $fileService;
    public function __construct(UserService $userService, UploadFileService $fileService)
    {
        $this->userService = $userService;
        $this->fileService =$fileService;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.changePassword');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with('success', 'Success, Password has changed');
    }

    public function edit()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('admin.profile', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->name = request('name');
        $user->address = request('address');

        $data = $request->except('avatar');
        if($request->hasFile('avatar')){
            $data['avatar'] = $this->fileService->uploadFile($request->file('avatar'), "imageUser/");
            $this->fileService->deleteFile($user->avatar);
        }
        // dd($data);
        $user = $this->userService->updateUser($data, $user);
        if($user)
            return redirect()->back()->with('success', 'Success, Details has changed');
        return redirect()->back()->with('error', 'Error, Details has changed');
    }

    public function getEmailVerify()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('auth.email', compact('user'));
    }

    public function postEmailVerify(Request $request, User $user)
    {
        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore(Auth::user()->id)],
        ]);
        $user = User::findOrFail(Auth::user()->id);
        if (Hash::check($user->password, $request->input('current_password'))) {
            return redirect()->route('email', $user->id)->with('success', 'Error');
        } else {
            if ($user->email != request('email')) {
                $user->email = request('email');
                $user->email_verified_at = null;
                $user->save();
            }
            return redirect()->route('details.profile')->with('success', 'Success, Your email has changed');
        }
    }

    public function getUpdatePhone()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('auth.phone', compact('user'));
    }

    public function postUpdatePhone(Request $request, User $user)
    {
        $this->validate($request, [
            'current_password' => ['required', new MatchOldPassword],
            'phone' => ['numeric', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9', \Illuminate\Validation\Rule::unique('users')->ignore(Auth::user()->id)],
        ]);

        $user = User::findOrFail(Auth::user()->id);

        if (Hash::check($user->password, $request->input('current_password'))) {
            return redirect()->route('email', $user->id)->with('success', 'Error');
        } else {
            $user->phone = request('phone');
            $user->save();
            return redirect()->route('details.profile')->with('success', 'Success, Your phone has changed');
        }
    }

    public function postChangeAddress(Request $request)
    {
        $this->validate($request, [
            'address' => 'required | string | min:5 | max:255',
        ]);

        $user = User::findOrFail(Auth::user()->id);
        $user->address = request('address');
        $user->save();
        return redirect()->back()->with('toast', 'Change address success');
    }
}
