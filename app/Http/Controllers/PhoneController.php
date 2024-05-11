<?php

namespace App\Http\Controllers;

use App\Http\Requests\phoneRequest;
use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phone = Phone::paginate(10);
        return response()->json($phone);
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
    public function store(phoneRequest $request)
    {
        $data = $request->all();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // $storedImagePath = Storage::putFile('usersImage', $image);
            $storedImagePath = $image->store("phoneImage", 'public');
            Phone::create([
                'company_id' => $request->input('company'),
                'battery_level' =>$request->input('battery_level'),
                'model' => $request->input('model'),
                'fingerprint' => $request->input('fingerprint') ? '1' : '0',
                'face' => $request->input('face') ? '1' : '0',
                'power_type' => $request->input('powertype'),
                'photo' => $storedImagePath,
                'memory' => $request->input('memory'),
                'camera_n' => $request->input('camera_quantity'),
                'ram' => $request->input('ram'),
                'cam_pexel'=> $request->input('pexel')
            ]);} else {
            Phone::create([
                'company_id' => $request->input('company'),
                'battery_level' =>$request->input('battery_level'),
                'model' => $request->input('model'),
                'fingerprint' => $request->input('fingerprint') ? '1' : '0',
                'face' => $request->input('face') ? '1' : '0',
                'power_type' => $request->input('powertype'),
                'memory' => $request->input('memory'),
                'camera_n' => $request->input('camera_quantity'),
                'ram' => $request->input('ram'),
                'cam_pexel'=> $request->input('pexel')
            ]);
        }
        return response()->json(['message' => 'Form Submited Successfully'], 200);
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
    public function edit(Phone $id)
    {
        return response()->json($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(phoneRequest $request)
    {
        $data = $request->all();

        $phone = Phone::find($request->phone_id);
        // $phone->update([
        //         'battery_level' => $request->battery_level,
        //         ]);
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');

            // $storedImagePath = Storage::putFile('usersImage', $image);
            $storedImagePath = $image->store("phoneImage", 'public');
            $phone->update([
                'company_id' => $request->input('company'),
                'battery_level' =>$request->input('battery_level'),
                'model' => $request->input('model'),
                'fingerprint' => $request->input('fingerprint') ? '1' : '0',
                'face' => $request->input('face') ? '1' : '0',
                'power_type' => $request->input('powertype'),
                'photo' => $storedImagePath,
                'memory' => $request->input('memory'),
                'camera_n' => $request->input('camera_quantity'),
                'ram' => $request->input('ram'),
                'cam_pexel'=> $request->input('pexel')
            ]);} else {
            $phone->update([
                'company_id' => $request->input('company'),
                'battery_level' =>$request->input('battery_level'),
                'model' => $request->input('model'),
                'fingerprint' => $request->input('fingerprint') ? '1' : '0',
                'face' => $request->input('face') ? '1' : '0',
                'power_type' => $request->input('powertype'),
                'memory' => $request->input('memory'),
                'camera_n' => $request->input('camera_quantity'),
                'ram' => $request->input('ram'),
                'cam_pexel'=> $request->input('pexel')
            ]);
        }
        return response()->json(['message' => 'Form Submited Successfully'], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Phone $phone)
    {
        //
    }
}
