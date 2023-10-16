<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'successfully logged out ',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile(){
        $id=Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));
    }

    public function edit(){
        $id=Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_edit',compact('adminData'));
    }

    public function storeProfile(Request $request)
    {

        $id=Auth::user()->id;
        $data = User::find($id);
        // dump($data);

        $data->name = $request->name;
        $data->email = $request->email;
        if ($request->file('profile_img')) {
            $file = $request->file('profile_img');
            $filename = date('ymdhis').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_image'),$filename);
            $data->profile_img = $filename;

        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.profile')->with($notification);

    }
}
