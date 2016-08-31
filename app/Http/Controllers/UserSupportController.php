<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserSupportController extends Controller
{

    public function __construct(){
        $this->middleware('role:user');
    }

    public function index()
    {
        return view('pages.users.support.index');
    }
}
