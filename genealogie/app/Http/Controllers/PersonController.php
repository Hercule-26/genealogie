<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

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
        return redirect()->route('index')->with('success', 'Person added succesfuly.');
    }
}
