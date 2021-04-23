<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\UserType;
use File;

class AdminController extends Controller

{
    public function dashboard() {
        return view('admin.dashboard');
    }

    public function employees()
    {
        $users = User::orderBy('id')->whereBetween('status', ['active', 'pending'])->get();
        return view('admin.employees', compact('users'));
    }

    public function viewEmployee($id)
    {
        $types = UserType::all();
        $user = User::where('id',$id)->first();
        return view('admin.edit_employee', compact('user' , 'types'));
    }

    public function updateEmployee($id, Request $request)
    {
//dd($request->all());
        $user = User::where('id',$id)->first();

        $val = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
            // 'password' => 'required|string|min:8', //confirmed
            'user_type' => 'required'
        ];
        if($request->password) {
            $val['password'] =  'required|string|min:8';
        }

        $validator = Validator::make($request->all(),$val );

        if ($validator->fails()) {
           // dd($validator);
            return redirect('employee/'.$id)
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            //'password' => Hash::make($request->password),
            'user_type' => $request->user_type,
           // 'status' => 'pending'
        ];
        if ($request->accept){
            $data['status'] = 'active';
        }
        if ($request->reject){
            $data['status'] = 'inactive';
        }
        if($request->password){
            $data['password'] = Hash::make($request->password);

        }
        if($request->file('user_profile')){
            $fileName = time().'.'.$request->user_profile->extension();
            if(File::exists(public_path('uploads/'.$user->user_profile))){

                File::delete(public_path('uploads/'.$user->user_profile));
            }

            $request->user_profile->move(public_path('uploads'), $fileName);
            $data['user_profile'] = $fileName;
        }

        $user->update($data);

        return redirect('employees/')->with('message','user details have been updated successfully');
    }

//delete employee
    public function deleteEmployee($id)
    {
        User::destroy($id);

        //Event::flash('message', 'Delete successfully!');
        //Event::flash('alert-class', 'alert-success');
        return redirect('employees')->with('message', 'Employee deleted successfully');
    }

}
