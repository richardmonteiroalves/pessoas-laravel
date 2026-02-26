<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index()
    {
        return Person::query()->orderBy('id')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => ['required', 'string', 'max:255'],

        ]);

        $person = Person::create($data);

        return response()->json($person, 201);
    }

    public function show(Person $person)
    {
        return $person;
    }

    public function update(Request $request, Person $person)
    {
        $data = $request->validate([
            'name'  => ['sometimes', 'required', 'string', 'max:255'],
            
        ]);

        $person->update($data);

        return $person;
    }

    public function destroy(Person $person)
    {
        $person->delete();

        return response()->noContent();
    }
}
