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
            $request->input('pet_name') ?? ''
        );
        return view('admin.pets.index', ['pets' => $pets]);
    }

    public function add(PetRequest $request) {
        Pet::create($request->all());
        return back()->with( 'success', 'Thêm thú cưng thành công' );
    }

    public function edit() {

    }

    public function view() {

    }

    public function delete ($id) {
        Pet::destroy($id);
        return back()->with('success','Xóa thú cưng thành công');
    }
}