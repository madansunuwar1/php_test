<?php

namespace App\Http\Controllers\verification\bcpn;

use App\Models\Bcpn;
use App\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\VerificationStatus;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $bcpns = Bcpn::all();
        return view('verification.bcpn.index', compact('bcpns'));
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
        // Retrieve the item_id and status from the form data
        $itemId = $id;
        $status = $request->input('status');
        $randomPassword = Str::random(8);
        if ($status == 'verified') {
            // Update the status and set the password in the database
            Bcpn::where('id', $itemId)->update([
                'status' => 'verified',
            ]);
            $user = User::create([
                'name' => Bcpn::find($itemId)->name,
                'email' => Bcpn::find($itemId)->email,
                'role_id' => Role::IS_BCPN_MEMBER,
                'password' => bcrypt($randomPassword),
            ]);

            $user->assignRole('bcpn_member');

            // Retrieve the updated Bcio instance
            $bcpn = Bcpn::find($itemId);

            // Send the email with the password
            Mail::to($bcpn->email)->send(new VerificationStatus('verified', $randomPassword, $bcpn->email));
        } elseif ($status == 'deny') {
            Bcpn::where('id', $itemId)->update(['status' => 'rejected']);
            // No need to update status for 'reject'
            // Send email with rejection status
            $bcio = Bcpn::find($itemId); // Retrieve the Bcio instance
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
