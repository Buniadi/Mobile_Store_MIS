<?php

namespace App\Http\Controllers;

use App\Http\Requests\Phonerequest;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Phonerequest $request)
    {

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // $storedImagePath = Storage::putFile('usersImage', $image);
            $storedImagePath = $image->store("userImage", 'public');
            Phone::create([
                'name' => $request->input('name'),
                ' company_id ' => $request->input(' company_id '),
                'battery_level' => Hash::make($request->input('battery_level')),
                'model' => $request->input('model'),
                'fingerprint' => $request->input('fingerprint'),
                'photo' => $storedImagePath,
                'face' => $request->input('face'),
                'power_type' => $request->input('power_type'),
                'memory' => $request->input('memory'),
                'camera_n' => $request->input('camera_n'),
                'ram' => $request->input('ram')
            ]);} else {
            Phone::create([
                'name' => $request->input('name'),
                ' company_id ' => $request->input(' company_id '),
                'battery_level' =>$request->input('battery_level'),
                'model' => $request->input('model'),
                'fingerprint' => $request->input('fingerprint'),
                'face' => $request->input('face'),
                'power_type' => $request->input('power_type'),
                'memory' => $request->input('memory'),
                'camera_n' => $request->input('camera_n'),
                'ram' => $request->input('ram')
            ]);
        }

        return response()->json(['message' => 'Form Submited Successfully'], 200);

        return response()->json('hi');

    }

    /**
     * Display the specified resource.
     */
    public function show(Phone $phone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Phone $phone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Phone $phone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
