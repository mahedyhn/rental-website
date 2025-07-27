<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;

class DashboardController extends Controller
{
    
    public function index()
    {
        $totalUsers = User::count();
        $totalProperties = Property::count();
        return view('admin.dashboard', compact('totalUsers', 'totalProperties'));
    }

    
    public function users()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    
    public function properties()
    {
        $properties = Property::with('owner')->latest()->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }
}