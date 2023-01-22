<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Data;
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
        $feedbacks = Feedback::all();
        $datas = Data::all();
        return view('admin.home', ['users' => $users, 'feedbacks'=>$feedbacks, 'datas'=>$datas->sortByDesc('created_at')]);
    }

    public function makeAdmin(Request $request, $id) //user
    {
        User::where('id',$id)->update([
            'role'=>$request->isAdmin,
        ]);
        toast('Berhasil mengubah status admin!','success');
        return redirect()->to(route('admin.home'))->withErrors(['msg' => 'Data telah diupdate.']);
    }

    public function deleteUsers($id)
    {
        DB::table('users')->where('id',$id)->delete();
        toast('User dihapus!','error');
        return redirect(route('admin.home'));
    }

    public function verificateUsers(Request $request,$id)
    {
        User::where('id',$id)->update([
            'is_active'=> $request->verified,
        ]);
        toast('Status User berhasil diubah!','success');
        return redirect()->to(route('admin.home'))->withErrors(['msg' => 'Data telah diupdate.']);
    }

    public function approvalData(Request $request,$id)
    {
        Data::where('id',$id)->update([
            'status' => $request->status
        ]);
        toast('Status Data diubah!','success');
        return redirect()->to(route('admin.home'))->withErrors(['msg' => 'Data telah diupdate.']);
    }

    public function editData($id)
    {
        $datas = Data::where('id',$id)->first();
        return view('admin.updateData', compact('datas'));
    }

    public function deleteData($id)
    {
        DB::table('datas')->where('id',$id)->delete();
        toast('Data dihapus!','warning');
        return redirect(route('admin.home'));
    }
    
    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'nama'=> 'required',
            'deskripsi' => 'required',
            'kategori'=> 'required',
            'kata_kunci'=> 'required',
            'tautan'=> 'required',
        ]);

        $data = Data::where('id',$id)->update([
            'nama'=> $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori'=> $request->kategori,
            'kata_kunci'=> $request->kata_kunci,
            'tautan'=> $request->tautan,
            'status' => $request->status
        ]);
        toast('Data berhasil diubah!','success');
        return redirect()->route('admin.home', compact('data'));
    }
}
