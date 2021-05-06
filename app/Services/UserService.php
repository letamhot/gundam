<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService {
    //Form index User Admin
    public function getlistUser(){
        try {
                $user = User::orderBy('name', 'asc')
                ->paginate(5);
                
                // dd($user);

        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return $user;

    }
    //Form index User Data Admin
    public function userData($request){
       
            $sort_by = $request->get('sortby', 'name');
            $sort_type = $request->get('sorttype', 'asc');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            if($sort_by == 'name'){
                $user = User::whereRaw("(name LIKE '%$query%' 
                        OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                        ->orderBy('name', $sort_type)
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(5);
            }
            if($sort_by == 'email'){
                $user = User::whereRaw("(name LIKE '%$query%' 
                OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                        ->orderBy('email', $sort_type)
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(5);

            }
            if($sort_by == 'address'){
                $user = User::whereRaw("(name LIKE '%$query%' 
                OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                        ->orderBy('address', $sort_type)
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(5);

            }
            if($sort_by == 'phone'){
                $user = User::whereRaw("(name LIKE '%$query%' 
                OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                        ->orderBy('phone', $sort_type)
                        ->orderBy($sort_by, $sort_type)
                        ->paginate(5);

            }
         return $user;
         
       
   

    }

    //Create User Admin
    public function createUser($data){
        try
        {
            $user = null;
            $password = null;
            if(array_key_exists('password' ,$data)){
                $password = $data['password'];
                $data['password'] = Hash::make($data['password']);

            }
            // $data['user_type'] = User::CUSTOMER;

            // DB::transaction(function () use ($data, $password, &$user) {
             $user = User::create($data);
            // Mail::to($data['email'])->send(new AccountMail($data['email'], $password));
            // });
            // dd($user);

            return $user;


        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    //Edit User Admin
    public function editUser($id){
        try {
            $user = User::find($id);
            return $user;
        } catch (\Exception $e) {
            return null;
        }
    }

    //Update User Admin
    public function updateUser($data, $user){
        try
        {
            if(array_key_exists('password' ,$data)){
                $data['password'] = Hash::make($data['password']);

            }
            $user->update($data);

        }
        catch (\Exception $e) {
            return $e->getMessage();
        }
        return $user->fresh();
    }

    //Destroy User Admin
    public function destroyUser($id){
        try {
            $user = User::find($id);
            $user->delete();
        } catch (\Exception $e) {
            return null;
        }
    }

    //Trash User
    public function trash(){
        try {
           
            $user = User::onlyTrashed()
            ->orderBy('name', 'asc')
            ->paginate(5);

            } catch (\Exception $e) {
                return $e->getMessage();
            }
            return $user;
    }

    //Trash User Data
    public function userTrashData($request){
       
        $sort_by = $request->get('sortby', 'name');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        if($sort_by == 'name'){
            $user = User::onlyTrashed()->whereRaw("(name LIKE '%$query%' 
                    OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('name', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'email'){
            $user = User::onlyTrashed()->whereRaw("(name LIKE '%$query%' 
            OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('email', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);

        }
        if($sort_by == 'address'){
            $user = User::onlyTrashed()->whereRaw("(name LIKE '%$query%' 
            OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('address', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);

        }
        if($sort_by == 'phone'){
            $user =User::onlyTrashed()->whereRaw("(name LIKE '%$query%' 
            OR email LIKE '%$query%' OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('phone', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);

        }
        return $user;
    }

    //Restore User Data
    public function restore($id){
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();
    }

    //Permanently deleted User
    public function delete($id){
        $user = User::onlyTrashed()->findOrFail($id);
        $user->forceDelete();
    }
}