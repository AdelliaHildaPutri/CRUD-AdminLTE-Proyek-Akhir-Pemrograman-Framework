<?php

namespace App\Http\Controllers;
  
use App\Models\Unit;
use App\Models\Konsumen;
use App\Models\Home;
use App\Models\Sales;
use App\Models\User;

use Illuminate\Http\Request;


class DashboardController extends Controller
{
    public function index()
        {
            $totalUnits = Unit::count();
            $konsumens = Konsumen::count(); 
            $users = User::count();
            $sales = Sales::count();

            return view('dashboard', compact('totalUnits', 'konsumens', 'users', 'sales'));
        }

}