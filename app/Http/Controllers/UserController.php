<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(10);
        return $users;
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
    public function store(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email',
            'phone' => 'required|regex:/^[0-9]{10}$/',
            'address' => 'required|string',
            'password' => 'required|string',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',            // 'confirmPassword'=>'required|accepted|string|samepassword',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {

            if ($request->hasFile('photo')) {
                $image = $request->file('photo');

                // $storedImagePath = Storage::putFile('usersImage', $image);
                $storedImagePath = $image->store("userImage", 'public');
                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'phone' => $request->input('phone'),
                    'position' => $request->input('position'),
                    'photo' => $storedImagePath,
                    'address' => $request->input('address'),
                ]);
            } else {
                User::create([
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => Hash::make($request->input('password')),
                    'phone' => $request->input('phone'),
                    'position' => $request->input('position'),
                    'address' => $request->input('address'),
                ]);
            }

            return response()->json(['message' => 'Form Submited Successfully'], 200);
        }
    }


    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        // $users = User::all();

        // foreach ($users as $user) {
        //         $user->password = Hash::make($user->password);
        //         $user->save();

        // }
        // $password = $request->all();
        // $hashedPassword = Hash::make($request->password);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        } else {

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                $user = Auth::user();
                $token = $user->createToken('token')->plainTextToken;
                return response()->json(['token' => $token], 200);
            }
            // $user = User::where('email', $request->email)->first();


            // if ($user && Hash::check($request->password, $user->password)) {
            //     $token = $user->createToken('token')->plainTextToken;
            //     return response()->json(['token' => $token], 200);
            // }


            return response()->json(['message' => 'invalid ceradintialty'], 422);

            $user = User::where('email', $request->email)->first();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Auth::logout();
    }
}
