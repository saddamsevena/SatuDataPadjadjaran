<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
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
        $datas = Data::all();
        $infografis = DB::table('datas')
                ->where('kategori', '=', 'Infografis')
                ->where('status', '=', "Accepted")
                ->count();
        $kajian = DB::table('datas')
                ->where('kategori', '=', 'Kajian')
                ->where('status', '=', "Accepted")
                ->count();
        $database = DB::table('datas')
                ->where('kategori', '=', 'Database')
                ->where('status', '=', "Accepted")
                ->count();
        $arsip = DB::table('datas')
                ->where('kategori', '=', 'Arsip Lembaga')
                ->where('status', '=', "Accepted")
                ->count();
        $kontributor = DB::table('datas')
                ->where('status', '=', "Accepted")
                ->distinct('penerbit')
                ->count();
        $total = DB::table('datas')
                ->where('status', '=', "Accepted")
                ->count();
        return view('home', ['datas'=>$datas], compact('infografis', 'kajian', 'database', 'arsip', 'kontributor', 'total'));
    }
    
    public function about()
    {
        return view('about');
    }

    public function storeFeedback(Request $request)
    {
        Alert::success('Berhasil', 'Feedback kamu telah berhasil dikirim!');
        $feedbacks = new Feedback;
        $feedbacks->name = $request->name;
        $feedbacks->email = $request->email;
        $feedbacks->message = $request->message;
        $feedbacks->subject = $request->subject;
        $feedbacks->save();

        return redirect()->to(route('home'));
    }

    public function editProfile($npm)
    {
        $user = User::where('npm', $npm)->first();
        $datas = Data::where('user_npm', Auth::user()->npm)->get();
        return view("profile", compact("user"), ['datas'=>$datas->sortByDesc('created_at')]);
    }

    public function updateProfile(Request $request) 
    {
        toast('Profil baru berhasil disimpan!','success');
        $user = User::where('id', Auth::user()->id)->first();
        if ($user->password != $request->password) {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $request->file('image')->store('img/profile', 'public'),
                'password' => Hash::make($request->password),
            ]);
        }
        else {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $request->file('image')->store('img/profile', 'public'),
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect(route("profile.edit", $user->npm))->with(["success" => "User berhasil diupdate!"]);
    }

    public function katalog()
    {
        $datas = Data::all();
        $infografis = DB::table('datas')
                ->where('kategori', '=', 'Infografis')
                ->where('status', '=', "Accepted")
                ->count();
        $kajian = DB::table('datas')
                ->where('kategori', '=', 'Kajian Ilmiah')
                ->where('status', '=', "Accepted")
                ->count();
        $database = DB::table('datas')
                ->where('kategori', '=', 'Database')
                ->where('status', '=', "Accepted")
                ->count();
        $arsip = DB::table('datas')
                ->where('kategori', '=', 'Arsip Lembaga')
                ->where('status', '=', "Accepted")
                ->count();
        return view('katalog.home', ['datas'=>$datas->sortByDesc('updated_at')], compact('infografis', 'kajian', 'database', 'arsip'));
    }

    public function detailView($id)
    {
        $datas = Data::where('id', $id)->first();
        return view('katalog.detail', compact('datas'));
    }
}