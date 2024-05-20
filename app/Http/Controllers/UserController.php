<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\AppointmentRequest;
 
class UserController extends Controller
{
    public function userprofile()
    {
        return view('userprofile');
    }
 
    public function about()
    {
        return view('about');
    }

    public function appointment(Request $request)
    {
        $data = new Appointment;

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->doctor = $request->doctor;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->status = 'IN PROGRESS';
        if(Auth::id()){
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        $admin = User::where('type', 1)->first();
        $admin->notify(new AppointmentRequest($data));

        return redirect()->back()->with('message', 'Appointment Request Sent Successfully');
        
    }

    public function myappointment()
    {
        if(Auth::id()){

            $userid = Auth::user()->id;
            $appoint = Appointment::where('user_id', $userid)->get();
            return view('my_appointment', compact('appoint'));
        }

        else
        {
            return redirect()-back();
        }
       //return view('my_appointment');
    }
    
    public function cancel_appoint($id)
    {
        $appoint = Appointment::find($id);
        $appoint->delete();
        
        return redirect()->back()->with('message', 'Appointment Cancelled Successfully');
    }

    public function appointmentForm()
    {
        return view('layouts.makeappointment',['doctor' => Doctor::all()]);
    }

    public function doctor()
    {
        return view('layouts.alldoctor',['doctor' => Doctor::all()]);
    }
}