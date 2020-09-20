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
        $department = Department::find($id);
        //dd($department);
        return view('department.edit', compact('department'));
    }

    public function update(Request $request)
    {
        $rules = [
            'department_id' => 'required|exists:departments,id',
            'name' => 'required|string|min:4',
            'description' => 'string|max:256'
        ];

        $messages = [
            'department_id.required' => 'Es necesario enviar el id.',
            'department_id.exists' => 'No existe el id ingresado.',
            'name.required' => 'Es necesario ingresar un nombre del departamento.',
            'name.string' => 'El nombre contiene caracteres inválidos.',
            'name.min' => 'El nombre es demasiado corto.',
            'description.string' => 'La descripción contiene caracteres no válidos.',
            'description.max' => 'La descripción es demasiado larga.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        /*  id 2, name cereales
            request -> id 2, name cereales
        */

        /*  id 3, name cereales
            request -> id 2, name cereales
        */
        $validator->after(function ($validator) use ($request) {
            $department = Department::where('name', $request->get('name'))->first();
            if ( $department != null ) {
                if( ($department->id != $request->get('department_id')) ) {
                    $validator->errors()->add('name', 'No se puede colocar un nombre de otro departamento');
                }
            }
        });

        if( !$validator->fails() )
        {
            $department = Department::find($request->get('department_id'));
            $department->name = $request->get('name');
            $department->description = $request->get('description');
            $department->save();
        }

        return response()->json($validator->messages(),200);
    }

    public function destroy(Request $request)
    {
        $rules = [
            'department_id' => 'required|exists:departments,id',
        ];

        $messages = [
            'department_id.required' => 'Es necesario enviar el id.',
            'department_id.exists' => 'El departamento no existe.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if( !$validator->fails() )
        {
            $department = Department::find($request->get('department_id'));
            $department->delete();
        }

        return response()->json($validator->messages(),200);

    }

    public function trashed()
    {
        $departments = Department::onlyTrashed()->get();
        //dd($departments);

        return view('department.restore', compact('departments'));
    }

    public function restore(Request $request)
    {
        $rules = [
            'department_id' => 'required|exists:departments,id',
        ];

        $messages = [
            'department_id.required' => 'Es necesario enviar el id.',
            'department_id.exists' => 'El departamento no existe.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if( !$validator->fails() )
        {
            $department = Department::onlyTrashed()
                ->where('id', $request->get('department_id'))
                ->restore();
        }

        return response()->json($validator->messages(),200);
    }
}
