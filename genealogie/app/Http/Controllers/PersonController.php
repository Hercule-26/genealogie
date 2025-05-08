<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;
use Illuminate\Support\Facades\Log;
class PersonController extends Controller
{
    public function index()
    {
        $peoples = Person::with('creator')->get();
        return view('index', ['peoples' => $peoples]);
    }

    public function show($id)
    {
        $person = Person::with(['children', 'parents'])->findOrFail($id);
        return view('show', ['person' => $person]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
        ]);

        try {
            $person = new Person();
            $person->first_name = $validated['first_name'];
            $person->last_name = $validated['last_name'];
            $person->birth_name = $validated['birth_name'] ?? null;
            $person->middle_names = $validated['middle_names'] ?? null;
            $person->date_of_birth = $validated['date_of_birth'] ?? null;
            $person->created_by = 1;

            $person->save();

            return redirect()->route('index')->with('success', 'Person added successfully.');
        } catch (\Exception $e) {
            Log::error('Error while saving person: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'An error occurred while saving the person.');
        }
    }
}
