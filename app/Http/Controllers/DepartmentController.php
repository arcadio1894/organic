<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        //dd($departments);

        return view('department.index', compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:4|unique:departments,name',
            'description' => 'string|max:256'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre del departamento.',
            'name.string' => 'El nombre contiene caracteres inválidos.',
            'name.min' => 'El nombre es demasiado corto.',
            'name.unique' => 'Este nombre ya está usado.',
            'description.string' => 'La descripción contiene caracteres no válidos.',
            'description.max' => 'La descripción es demasiado larga.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if( !$validator->fails() )
        {
            $department = Department::create([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
            ]);
        }

        return response()->json($validator->messages(),200);
    }

    public function show( $id )
    {
        //
    }

    public function edit( $id )
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Request $request)
    {
        //
    }

    public function restore(Request $request)
    {
        //
    }
}
