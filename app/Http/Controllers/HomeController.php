<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        return view('home');
    }
    
    public function about()
    {
        return view('about');
    }

    public function storeFeedback(Request $request)
    {
        $feedbacks = new Feedback;
        $feedbacks->name = $request->name;
        $feedbacks->email = $request->email;
        $feedbacks->message = $request->message;
        $feedbacks->subject = $request->subject;
        $feedbacks->save();

        return redirect()->to('/');
    }

    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        $datas = Data::all();
        return view("profile", compact("user"), ['datas'=>$datas]);
    }

    public function updateProfile(Request $request) 
    {
        $user = User::where('id', Auth::user()->id)->first();
        if ($request['image']) {
            $profilePhoto = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request['image']->getClientOriginalName());
            $request['image']->move(public_path('img/profile'), $profilePhoto);
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
        return view('katalog.home');
    }

    public function listdata()
    {
        $datas = Data::all();
        return view('katalog.list', ['datas'=>$datas]);
    }
}