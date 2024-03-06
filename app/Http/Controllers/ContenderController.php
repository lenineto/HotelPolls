<?php

namespace App\Http\Controllers;

use App\Models\Contender;
use Illuminate\Http\Request;

class ContenderController extends Controller
{
    public function index()
    {
        return Contender::all();
    }

    public function store(Request $request)
    {
        return Contender::create($request->all());
    }

    public function show(Contender $contender)
    {
        return $contender;
    }

    public function update(Request $request, Contender $contender)
    {
        $contender->update($request->all());
        return $contender;
    }

    public function destroy(Contender $contender)
    {
        $contender->delete();
        return response()->json(null, 204);
    }
}
