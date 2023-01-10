<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function detailView()
    {
        return view('katalog.detail');
    }

    public function addData()
    {
        return view('katalog.add');
    }

    public function listData()
    {
        $datas = Data::all();
        return view('katalog.list', ['datas'=>$datas->sortByDesc('created_at')]);
    }

    public function storeData(Request $request)
    {
        $this->validate($request, [
            'nama'=> 'required',
            'deskripsi' => 'required',
            'sumber' => 'required',
            'kategori'=> 'required',
            'kata_kunci'=> 'required',
            'tautan'=> 'required',
        ]);

        $data = Data::create([
            'user_id'=> Auth::user()->id,
            'nama'=> $request->nama,
            'deskripsi' => $request->deskripsi,
            'sumber' => $request->sumber,
            'penerbit'=> Auth::user()->name,
            'kategori'=> $request->kategori,
            'kata_kunci'=> $request->kata_kunci,
            'tautan'=> $request->tautan,
            'status' => $request->status
        ]);

        return redirect()->route('katalog.list', compact('data'));
    }
}
