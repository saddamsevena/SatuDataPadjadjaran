<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function adminHome()
    {
        $users = User::all();
        return view('admin.home', ['users' => $users]);
    }

    public function makeAdmin(Request $request, $id) //user
    {

        User::where('id',$id)->update([
            'role'=>$request->isAdmin,
        ]);
        return redirect()->to('/admin/home')->withErrors(['msg' => 'Data telah diupdate.']);
    }

    public function deleteUsers($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('/admin/home');
    }

    public function verificateUsers(Request $request,$id)
    {
        User::where('id',$id)->update([
            'is_active'=> $request->verified,
        ]);
        return redirect()->to('/admin/home')->withErrors(['msg' => 'Data telah diupdate.']);
    }
}
