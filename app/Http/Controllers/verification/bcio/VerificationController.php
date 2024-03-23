<?php

namespace App\Http\Controllers\verification\bcio;

use App\Models\Bcio;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationStatus;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bcios = Bcio::all();
        return view('verification.bcio.index', compact('bcios'));
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
        //
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
    public function updateStatus(Request $request, $id)
    {
        $itemId = $id;
        $status = $request->input('status');
        $randomPassword = Str::random(8);
        if ($status == 'verified') {
            Bcio::where('id', $itemId)->update([
                'status' => 'verified',
            ]);
            $user = User::create([
                'name' => Bcio::find($itemId)->name,
                'email' => Bcio::find($itemId)->email,
                'role_id' => Role::IS_BCIO_MEMBER,
                'password' => bcrypt($randomPassword),
            ]);

            $user->assignRole('bcio_member');

            $bcio = Bcio::find($itemId);

            Mail::to($bcio->email)->send(new VerificationStatus('verified', $randomPassword, $bcio->email));
        } elseif ($status == 'deny') {
            Bcio::where('id', $itemId)->update(['status' => 'rejected']);
            $bcio = Bcio::find($itemId);
            Mail::to($bcio->email)->send(new VerificationStatus('rejected'));
        }
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
