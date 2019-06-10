<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index(Request $request) {
        $pets = Pet::searchQuery(
            $request->input('id') ?? '',
            $request->input('pet_name') ?? '',
        );
        return view('admin.pets.index', ['pets' => $pets]);
    }

    public function add(PetRequest $request) {
        Pet::createOrFail($request->all());
        return redirect('admin/pets')->with(Controller::notification(ADD));
    }

    public function edit($id, PetRequest $request) {
        $pet = Pet::find($id);
        $pet->update($request->all());
        return redirect('admin/pets')->with(Controller::notification(EDIT));
    }

    public function view($id) {
        $pet = Pet::find($id);
        return view('admin.pets.view', compact('pet'));
    }

    public function delete ($id) {
        Pet::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }
}