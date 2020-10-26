<?php

namespace App\Http\Controllers;

use App\Department;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

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
}