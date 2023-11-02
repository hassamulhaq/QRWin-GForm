<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParticipantRequest;
use App\Models\Participant;

class ParticipantController extends Controller
{
    public function index()
    {
        return Participant::all();
    }

    public function store(ParticipantRequest $request)
    {
        return Participant::create($request->validated());
    }

    public function show(Participant $participant)
    {
        return $participant;
    }

    public function update(ParticipantRequest $request, Participant $participant)
    {
        $participant->update($request->validated());

        return $participant;
    }

    public function destroy(Participant $participant)
    {
        $participant->delete();

        return response()->json();
    }
}
