<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function index() {
        $user = Auth::user();
        $now = Carbon::now();
        
        // Split festivals into previous and upcoming
        $allFestivals = $user->festivals;
        $previousFestivals = $allFestivals
            ->filter(function ($festival) use ($now) {
                return Carbon::parse($festival->end_at)->isPast();
            })
            ->sortByDesc('start_at')
            ->groupBy(function ($festival) {
                return Carbon::parse($festival->end_at)->year;
            });
        
        // Get friends with their upcoming festivals
        $friends = $user->friends->map(function ($friend) use ($now) {
            $friend->upcomingFestival = $friend->festivals
                ->filter(function ($festival) use ($now) {
                    return Carbon::parse($festival->start_at)->isFuture();
                })
                ->sortBy('start_at');
            return $friend;
        });

        $currentYear = request('year') ?? Carbon::now()->year;
        $years = collect($previousFestivals->keys())->unique()->sort();

        return view('profile.index', compact('user', 'previousFestivals', 'friends', 'currentYear', 'years'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
