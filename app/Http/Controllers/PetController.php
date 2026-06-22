<?php
namespace App\Http\Controllers;
use App\Models\Pet;
use Illuminate\Http\Request;
class PetController extends Controller{
    public function index(){
        $pets = Pet::all();
        return view('pets.index', compact('pets'));
    }

    public function create(){
        return view('pets.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pets', 'public_uploads');
            $data['image'] = $path;
        }
        Pet::create($data);
        return redirect('/pets')->with('Exito', 'Mascota Registrada');
    }

    public function edit(Pet $pet){
        return view('pets.edit', compact('pet'));
    }

    public function update(Request $request, Pet $pet){
        $request->validate([
            'name' => 'required',
            'species' => 'required',
            'breed' => 'required',
            'age' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $data = $request->all();
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('pets', 'public');
            $data['image'] = $path;
        }
        $pet->update($data);
        return redirect('/pets')->with('Exito', 'Mascota Actualizada');
    }

    public function destroy(Pet $pet){
        $pet->delete();
        return redirect('/pets')->with('Exito', 'Mascota Eliminada');
    }
}