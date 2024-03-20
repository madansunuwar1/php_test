<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Models\Bcio;
use App\Models\Bcpn;
use App\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    public function index()
    {
        $authUser = auth()->user();
        $roleId = $authUser->role->value('id');

        // Assuming you want to get the id of the first role in the collection
        //$roleId = $roles->first()->id;
        switch ($roleId) {
            case Role::IS_BCIO:
                $profile = Bcio::where('email', $authUser->email)->first();
                $blade = 'profile.bcio';
                break;
            case Role::IS_BCPN:
                $profile = Bcpn::where('email', $authUser->email)->first();
                $blade = 'profile.index';
                break;
            default:
                $profile = Bcio::where('email', $authUser->email)->first();
                $blade = 'profile.index';
                break;
        }
        return view($blade, compact('profile'));

        /*if ($roleId == Role::IS_BCIO) {
            $profile = Bcio::where('email', $authUser->email)->first();
            return view('profile.bcio', compact('profile'));
        } elseif ($roleId == Role::IS_BCPN) {
            $profile = Bcpn::where('email', $authUser->email)->first();
            return view('profile.index', compact('profile'));
        } else {
            // Handle other roles or default to Bcio if needed
            $profile = Bcio::where('email', $authUser->email)->first();
            return view('profile.index', compact('profile'));
        }*/

        // $profile = Bcio::where('user_id', Auth::user()->id)->first();

    }

    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        $authUser = auth()->user();
        $roleId = $authUser->role->value('id');
        switch ($roleId) {
            case Role::IS_BCIO:
                $profile = Bcio::where('email', $authUser->email)->first();
                $blade = 'profile.bcio-edit';
                break;
            case Role::IS_BCPN:
                $profile = Bcpn::where('email', $authUser->email)->first();
                $blade = 'profile.bcpn-edit';
                break;
            default:
                $profile = Bcio::where('email', $authUser->email)->first();
                $blade = 'profile.edit';
                break;
        }
        return view($blade, compact('profile'));

        /*// Assuming you want to get the id of the first role in the collection
        $roleId = $roles->first()->id;
        $roles = $authUser->role;

        // Assuming you want to get the id of the first role in the collection
        $roleId = $roles->first()->id;
        if ($roleId == '2') {
            $profile = Bcio::where('email', $authUser->email)->first();
            return view('profile.bcio-edit', compact('profile'));
        } elseif ($roleId == '3') {
            $profile = Bcpn::where('email', $authUser->email)->first();
            return view('profile.bcpn-edit', compact('profile'));
        } else {
            // Handle other roles or default to Bcio if needed
            $profile = Bcio::where('email', $authUser->email)->first();
            return view('profile.index', compact('profile'));
        }

        $profile = Bcio::where('id', '1')->first();
        return view('profile.e', compact('profile'));*/
    }

    /**
     * Update the user's profile information.
     */
    public function update(CreateProfileRequest $request)
    {
        $user = \auth()->user()->role->value('id');
        $currentUserRoleID = $user->role->value('id');
        switch ($currentUserRoleID) {
            case Role::IS_BCPN:
                $profile = Bcpn::where('email', $user->email)->first();
                $profile->update($request->validated());
                break;
            case Role::IS_BCIO:
            default:
                $profile = Bcio::where('email', $user->email)->first();
                $profile->update($request->validated());
                break;
        }
        return Redirect::route('profile.index')->with('profile');


        /*$roles = $user->role;

        // Assuming you want to get the id of the first role in the collection
        $roleId = $roles->first()->id;
        if ($roleId == '2') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'club_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'contact' => 'required|string|max:255',
                'position' => 'required|string|max:255',
                'date' => 'string|max:255|nullable',
                'personal_email' => 'string|email|max:255|nullable',
                'status' => 'string|max:255|nullable',
                'activities' => 'string|max:255|nullable',
                'telephone' => 'string|max:255|nullable',
                'fax' => 'string|max:255|nullable',
                'president' => 'string|max:255|nullable',
                'based_on' => 'string|max:255|nullable',
                'established_on' => 'string|max:255|nullable',
                'facebook' => 'string|max:255|nullable',
                'instagram' => 'string|max:255|nullable',
            ]);
            $profile = Bcio::where('email', $user->email)->first();
            $profile->update($validated);
            return Redirect::route('profile.index')->with('status', 'profile-updated');
        } elseif ($roleId == '3') {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'club_name' => 'required|string|max:255',
                'date' => 'string|max:255',
                'dob' => 'date|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'contact' => 'required|string|max:255',
                'gender' => 'string|email|max:255|nullable',
                'current_country' => 'string|max:255|nullable',
                'university' => 'string|max:255|nullable',
                'faculty' => 'string|max:255|nullable',
                'current_job' => 'string|max:255|nullable',
                'other_job' => 'string|max:255|nullable',
                'field_of_expertise' => 'string|max:255|nullable',
                'area_of_interest' => 'string|max:255|nullable',
                'hobbies' => 'string|max:255|nullable',
                'intro' => 'string|max:255|nullable',
                'status' => 'string|max:255|nullable',
                'facebook' => 'string|max:255|nullable',
                'linkedin' => 'string|max:255|nullable',
            ]);

            $profile = Bcpn::where('email', $user->email)->first();
            $profile->update($validated);
            return Redirect::route('profile.index')->with('status', 'profile-updated');
        } else {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'club_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'contact' => 'required|string|max:255',
            ]);
            // Handle other roles or default to Bcio if needed
            $profile = Bcio::where('email', $user->email)->first();
            $profile->update($validated);
            return Redirect::route('profile.index')->with('status', 'profile-updated');
        }*/
    }

    public function bcpnUpdate(CreateProfileRequest $request)
    {
        /*$validated = $request->validate([
            'name' => 'required|string|max:255',
            'club_name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'contact' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'date' => 'string|max:255|nullable',
            'personal_email' => 'string|email|max:255|nullable',
            'status' => 'string|max:255|nullable',
            'activities' => 'string|max:255|nullable',
            'telephone' => 'string|max:255|nullable',
            'fax' => 'string|max:255|nullable',
            'president' => 'string|max:255|nullable',
            'based_on' => 'string|max:255|nullable',
            'established_on' => 'string|max:255|nullable',
            'facebook' => 'string|max:255|nullable',
            'instagram' => 'string|max:255|nullable',
        ]);*/
        $authUser = auth()->user();
        $profile = Bcpn::where('email', $authUser->email)->first();
        $profile->update($request->validated());
        return Redirect::route('profile.index')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();
        $user->delete();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
