<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use App\Models\User;
use Illuminate\Http\Request;

class AdmindashboardController extends Controller
{
    public function index(){
        $user = User::count();
        $technician = Technician::count();
        return view('index', compact('users','technicians'));
    }
}
