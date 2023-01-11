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
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kata_kunci'=> 'required',
            'tautan'=> 'required',
        ]);

        if ($request->hasfile('image')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('img/data'), $filename);
        }

        else {
            $filename = NULL;
        }

        $datas = Data::create([
            'user_id'=> Auth::user()->id,
            'nama'=> $request->nama,
            'deskripsi' => $request->deskripsi,
            'sumber' => $request->sumber,
            'penerbit'=> Auth::user()->name,
            'kategori'=> $request->kategori,
            // 'image' => $filename,
            'kata_kunci'=> $request->kata_kunci,
            'tautan'=> $request->tautan,
            'status' => $request->status
        ]);

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
            'kategori'=> 'required',
            'kata_kunci'=> 'required',
            'tautan'=> 'required',
        ]);

        $datas = Data::where('id',$id)->update([
            'nama'=> $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori'=> $request->kategori,
            'kata_kunci'=> $request->kata_kunci,
            'tautan'=> $request->tautan,
            'status' => "Checking",
        ]);

        return redirect()->route('katalog.home', compact('datas'));
    }
}
