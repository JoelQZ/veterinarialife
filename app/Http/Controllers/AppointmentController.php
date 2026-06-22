<?php
namespace App\Http\Controllers;
use App\Models\Appointment;
use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;
class AppointmentController extends Controller{
    public function index(){
        $appointments = Appointment::all();
        return view('appointments.index', compact('appointments'));
    }

    public function create(){
        $pets = Pet::all();
        $owners = Owner::all();
        return view('appointments.create', compact('pets', 'owners'));
    }

    public function store(Request $request){
        if ($request->filled(['appointment_year', 'appointment_month', 'appointment_day'])) {
            $request->merge([
                'date' => $request->appointment_year . '-' . $request->appointment_month . '-' . $request->appointment_day
            ]);
        }
        $request->validate([
            'pet' => 'required',
            'owner' => 'required',
            'date' => 'required',
            'reason' => 'required'
        ]);
        Appointment::create($request->all());
        return redirect('/appointments')->with('Exito', 'Cita Registrada');
    }

    public function edit(Appointment $appointment){
        $pets = Pet::all();
        $owners = Owner::all();
        return view('appointments.edit', compact('appointment', 'pets', 'owners'));
    }

    public function update(Request $request, Appointment $appointment){
        if ($request->filled(['appointment_year', 'appointment_month', 'appointment_day'])) {
            $request->merge([
                'date' => $request->appointment_year . '-' . $request->appointment_month . '-' . $request->appointment_day
            ]);
        }
        $request->validate([
            'pet' => 'required',
            'owner' => 'required',
            'date' => 'required',
            'reason' => 'required'
        ]);
        $appointment->update($request->all());
        return redirect('/appointments')->with('Exito', 'Cita Actualizada');
    }

    public function destroy(Appointment $appointment){
        $appointment->delete();
        return redirect('/appointments')->with('Exito', 'Cita Eliminada');
    }
}