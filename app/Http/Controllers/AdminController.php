<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Notifications\AppointmentApproved;
use App\Notifications\AppointmentCancelled;

class AdminController extends Controller
{

    public function profilepage()
    {
        return view('profile');
    }


    public function addview()
    {
        return view('admin.add_doctor');
    }
    public function alldoctorview()
    {
        $data = doctor::all();
        return view('admin.showall_doctor',compact('data'));

    }

//     public function upload(Request $request)
//    {
//         $doctor = new doctor;

//     if ($request->hasFile('image')) {
//         $image = $request->file('image');
        
//         $imageName = time() . '.' . $image->getClientOriginalExtension();
        
//         $image->move('doctorimage', $imageName);
        
//         $doctor->image = $imageName;
//     }

//     $doctor->name = $request->name;
//     $doctor->phone = $request->phone;
//     $doctor->room = $request->room;
//     $doctor->speciality = $request->speciality;


//     $doctor->save();
//     return redirect()->back()->with('message', 'Doctor Added Successfully');
//   }

public function upload(Request $request)
{
    $formFields = $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'speciality' => 'required',
        'room' => 'required',
        'image' => 'nullable|image' 
    ]);

    if ($request->hasFile('image')) {
        $formFields['image'] = $request->file('image')->store('images', 'public');
    }

    Doctor::create($formFields);

    return redirect()->back()->with('message', 'Doctor Added Successfully');
}

    public function showappointment()
    {
        $data = appointment::all();
        return view('admin.appointment', compact('data'));
    }

    public function cancel_appoint($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Cancelled';
         $data->save();

        $user = User::find($data->user_id);
        $user->notify(new AppointmentCancelled($data));
        
        return redirect()->back()->with('message', 'Appointment Cancelled Successfully');
    }

    public function approve_appoint($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();


        $user = User::find($data->user_id);
        $user->notify(new AppointmentApproved($data));

        return redirect()->back()->with('message', 'Appointment Approved Successfully');


    }

    public function update_doctor($id)
    {
        $data = doctor::find($id);

        return view('admin.update_doctor',compact('data'));


    }

    public function delete_doctor($id)
    {
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Doctor Deleted Successfully');
       
    }

    public function edit_doctor(Request $request, $id)
    {
        $doctor = doctor::find($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            if($image)
            {
                $imageName = time() . '.' . $image->getClientOriginalExtension();
            
            $image->move('doctorimage', $imageName);
            
            $doctor->image = $imageName;

            }
            
            
        }

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Updated Successfully');
    }

    public function delete_appoint($id)
    {
        $data = Appointment::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Appointment Deleted Successfully');
    }



}