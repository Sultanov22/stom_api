<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Patient::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return Patient::create($request->only([
            'name',
            'lastname',
            'email',
            'phone',
            'card_number',
            'diagnosis',
            'image',
        ]));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Patient::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $patients = Patient::FindOrFail($id);
        $patients->update($request->only([
            'name',
            'lastname',
            'email',
            'phone',
            'card_number',
            'diagnosis',
            'image',
        ]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Patient::FindOrFail($id)->delete();
    }
}
