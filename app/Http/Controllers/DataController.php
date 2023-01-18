<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detailView($id)
    {
        $datas = Data::where('id', $id)->first();
        return view('katalog.detail', compact('datas'));
    }

    public function addData()
    {
        return view('katalog.add');
    }

    public function storeData(Request $request)
    {
        $this->validate($request, [
            'nama'=> 'required',
            'deskripsi' => 'required',
            'sumber' => 'required',
            'kategori'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kata_kunci'=> 'required',
            'tautan'=> 'required',
        ]);

        if ($request->hasfile('image')) {
            $datas = Data::create([
                'user_npm'=> Auth::user()->npm,
                'nama'=> $request->nama,
                'deskripsi' => $request->deskripsi,
                'sumber' => $request->sumber,
                'penerbit'=> Auth::user()->name,
                'kategori'=> $request->kategori,
                'image' => $request->file('image')->store('img/data', 'public'),
                'kata_kunci'=> $request->kata_kunci,
                'tautan'=> $request->tautan,
                'status' => $request->status
            ]);
        }

        else {
            $datas = Data::create([
                'user_npm'=> Auth::user()->npm,
                'nama'=> $request->nama,
                'deskripsi' => $request->deskripsi,
                'sumber' => $request->sumber,
                'penerbit'=> Auth::user()->name,
                'kategori'=> $request->kategori,
                'kata_kunci'=> $request->kata_kunci,
                'tautan'=> $request->tautan,
                'status' => $request->status
            ]);
        }

        Alert::success('Berhasil', 'Terimakasih sudah menjadi kontributor Data! Data kamu akan segera diverifikasi oleh kami.');
        return redirect()->route('katalog.home', compact('datas'));
    }

    public function editData($id)
    {
        $datas = Data::where('id',$id)->first();
        return view('katalog.edit', compact('datas'));
    }

    public function updateData(Request $request, $id)
    {
        $this->validate($request, [
            'nama'=> 'required',
            'deskripsi' => 'required',
            'sumber' => 'required',
            'kategori'=> 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kata_kunci'=> 'required',
            'tautan'=> 'required',
        ]);

        if ($request->hasfile('image')) {
            $datas = Data::where('id',$id)->update([
                'nama'=> $request->nama,
                'deskripsi' => $request->deskripsi,
                'sumber' => $request->sumber,
                'kategori'=> $request->kategori,
                'image' => $request->file('image')->store('img/data', 'public'),
                'kata_kunci'=> $request->kata_kunci,
                'tautan'=> $request->tautan,
                'status' => "Checking",
            ]);
        }

        else {
            $datas = Data::where('id',$id)->update([
                'nama'=> $request->nama,
                'deskripsi' => $request->deskripsi,
                'sumber' => $request->sumber,
                'kategori'=> $request->kategori,
                'kata_kunci'=> $request->kata_kunci,
                'tautan'=> $request->tautan,
                'status' => "Checking",
            ]);
        }
        toast('Data berhasil diupdate, silahkan tunggu admin untuk verifikasi ulang','success');
        return redirect()->route('katalog.home', compact('datas'));
    }

    public function deleteData($id)
    {
        DB::table('datas')->where('id',$id)->delete();
        toast('Data dihapus!','error');
        return redirect(route('katalog.home'));
    }
}
