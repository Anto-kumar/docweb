<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Doctor;

 
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    public function index()
    {
        $doctor = doctor::all();
        return view('home', compact('doctor'));
        //return view('home');
    }
 
    public function adminHome()
    {
        return view('dashboard');
    }
}