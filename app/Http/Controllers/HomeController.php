<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

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
        return view('home', ['datas'=>$datas], compact('infografis', 'kajian', 'database', 'arsip'));
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

    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        $datas = Data::where('user_id', Auth::user()->id)->get();
        return view("profile", compact("user"), ['datas'=>$datas->sortByDesc('updated_at')]);
    }

    public function updateProfile(Request $request) 
    {
        toast('Profil baru berhasil disimpan!','success');
        $user = User::where('id', Auth::user()->id)->first();
        if ($request['image']) {
            $profilePhoto = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request['image']->getClientOriginalName());
            $request['image']->move(public_path('img/profile'), $profilePhoto);
        }
        else {
            $profilePhoto = NULL;
        }

        if ($user->password != $request->password) {
            // Jika user mengganti passwordnya
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'npm' => $request->npm,
                'image' => $profilePhoto,
                'password' => Hash::make($request->password),
            ]);
        } 
        
        else {
            // Jika user tidak mengganti passwordnya
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'npm' => $request->npm,
                'image' => $profilePhoto,
            ]);
        }
        return redirect(route("profile.edit", $user->id))->with(["success" => "User berhasil diupdate!"]);
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
}