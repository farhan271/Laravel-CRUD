<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    public function index()

    {
        $crud = crud::get();
        $crud = crud::paginate(3);
        return view('crud.index', compact('crud'));
    }

    public function create()

    {
        return view('crud.create');  
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
        ]);

        Crud::create([
              'name' => $request->name,
              'description' => $request->description,
              'is_active' => $request->is_active == true ? 1: 0,
            ]);

        return redirect ('crud/create') ->with('status','Crud Created');
    }

    public function edit(int $id)
    {
        $crud = crud::findOrFail($id);
        //return $crud;
        return view('crud.edit', compact('crud'));

    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'description' => 'required|max:255|string',
            'is_active' => 'sometimes',
        ]);

        Crud::findOrFail($id)->update([
              'name' => $request->name,
              'description' => $request->description,
              'is_active' => $request->is_active == true ? 1: 0,
            ]);

        return redirect ()->back()->with('status','Crud Updated');
    }

    public function destroy(int $id)
    {
        $crud = crud::findOrFail($id);
        $crud->delete();
        
        return redirect ()->back()->with('status','Crud Deleted');
    }
}



