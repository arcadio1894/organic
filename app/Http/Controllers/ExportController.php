<?php

namespace App\Http\Controllers;

use App\Department;
use App\Exports\ArrayExport;
use App\Exports\DeparmentExport;
use App\Exports\ExportableExport;
use App\Exports\UsersExport;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exports()
    {
        return view('exports.exports');
    }

    public function exportPDF()
    {
        // TODO: Prueba para Principiantes
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        $path = public_path() . '/exports/test.pdf';
        $pdf->save($path);
    }

    public function export2PDF()
    {
        // TODO: Prueba para Principiantes
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream('streamTest.pdf');
    }

    public function export3PDF()
    {
        // TODO: Prueba para Principiantes
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->download('streamTest.pdf');
    }

    public function export4PDF()
    {
        // TODO: Prueba para Principiantes
        $path = public_path() . '/exports/file.html';
        $pdf = PDF::loadFile($path);
        return $pdf->stream();
    }

    public function exportDepartments()
    {
        $departments = Department::with('products')->get();
        $view = view('exports.departments', compact('departments'));
        $pdf = PDF::LoadHTML($view);
        return $pdf->stream();
    }

    public function exportUsersExcel()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function exportArrayExcel()
    {
        //return Excel::download(new ArrayExport, 'array.xlsx');

        $header = ['ID', 'Nombre', 'Email'];
        $content = [];
        $users = User::all();
        foreach ( $users as $user )
        {
            array_push($content, [$user->id, $user->name, $user->email]);
        }

        return Excel::download(new ArrayExport([$header,$content]), 'usersArray.xlsx');
    }

    public function storeArrayExcel()
    {
        $header = ['ID', 'Nombre', 'Email'];
        $content = [];
        $users = User::all();
        foreach ( $users as $user )
        {
            array_push($content, [$user->id, $user->name, $user->email]);
        }

        //return Excel::store(new ArrayExport([$header,$content]), 'users.xlsx', 'excel');
        return Excel::store(new ArrayExport([$header,$content]), 'users.xlsx');

    }

    public function exportableExcel()
    {
        return (new ExportableExport)->download('exportable.xlsx');
    }

    public function exportDepartmentsExcel()
    {
        return (new DeparmentExport)->download('exportable.xlsx');
    }


}