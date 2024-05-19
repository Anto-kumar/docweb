<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Appointment;

 
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

        $users = User::all();
        $doctors = Doctor::all();
        $appointments = Appointment::all();
        return view('admin.dashboard', compact('users', 'doctors', 'appointments'));
    }
}