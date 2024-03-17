<?php

namespace App\Http\Controllers\Auth;

use App\Models\Bcio;
use App\Models\Bcpn;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }
    public function index()
    {
        return view('auth.bcio-register');
    }
    

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Bcio::class],
            'country' => 'required',
            'date' => 'required',
            'club_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'personal_email' => 'required|string|email|max:255',
            'contact' => 'required|string|max:255',
        ]);
        
        $user = Bcio::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'date' => $request->date,
            'club_name' => $request->club_name,
            'position' => $request->position,
            'status' => 'pending', // default status is 'pending'
            'personal_email' => $request->personal_email,
            'contact' => $request->contact,
        ]);
        

        event(new Registered($user));

       

        return redirect('/');
    }
    public function storeBcpn(Request $request): RedirectResponse
    {
      
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Bcpn::class],
            'country' => 'required',
            'date' => 'required',
            'dob' => 'required', // added 'dob' field to the database
            'club_name' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]); 
        $user = Bcpn::create([
            'name' => $request->name,
            'email' => $request->email,
            'country' => $request->country,
            'date' => $request->date,
            'dob' => $request->dob, // added 'dob' field to the database
            'club_name' => $request->club_name,
            'status' => 'pending', // default status is 'pending'
            'contact' => $request->contact,
        ]);
        

        event(new Registered($user));

       

        return redirect('/');
    }
}
