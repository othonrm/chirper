<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('home', ['chirps' => $chirps]);
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
        $validated = $request->validate([
            'message' => [
                'required',
                'string',
                'max:255',
                // Rule::unique('chirps')->where(function ($query) use ($user) {
                //     return $query->where('user_id', $user->id);
                // }),
            ],
        ], [
            'message.required' => 'Write the f*** message!',
            'message.max' => 'WTF?! This is chirp, not a bible. Save some words!',
        ]);

        Chirp::create([
            'message' => $validated['message'],
        ]);

        return redirect('/')->with('success', 'Chirp created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view('chirps.edit', compact('chirp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        if ($request->user()?->cannot('update', $chirp)) {
            abort(403);
        }

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Chirp $chirp)
    {
        if ($request->user()?->cannot('delete', $chirp)) {
            abort(403);
        }

        $chirp->delete();

        return redirect('/')->with('success', 'Successfully deleted your chirp!');
    }
}
