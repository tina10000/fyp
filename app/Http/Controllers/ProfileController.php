<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use File;
class ProfileController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('editprofile', compact('user'));
    }
    public function updateProfile( Request $request)
    {
        $user = Auth::user();

        $val = [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'dob' => 'required|date|max:255'
            // 'password' => 'required|string|min:8', //confirmed

        ];
        if($request->password) {
            $val['password'] =  'required|string|min:8';
        }

        $validator = Validator::make($request->all(),$val );

        if ($validator->fails()) {
            return redirect('profile')
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            'dob' => $request->dob
        ];

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

        return redirect('profile')->with('message','Profile updated successfully');
    }


}
