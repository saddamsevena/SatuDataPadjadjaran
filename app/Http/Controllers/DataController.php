<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Feedback;
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
}