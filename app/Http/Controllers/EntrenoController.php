<?php

namespace App\Http\Controllers;

use App\Models\Entreno;
use Illuminate\Http\Request;

class EntrenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('entrenos.index', [
            'entrenos' => Entreno::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('entrenos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Entreno::create($request->all());

        return redirect()->route('entrenos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Entreno  $entreno
     * @return \Illuminate\Http\Response
     */
    public function show(Entreno $entreno)
    {
        return view('entrenos.show', [
            'entreno' => $entreno,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Entreno  $entreno
     * @return \Illuminate\Http\Response
     */
    public function edit(Entreno $entreno)
    {
        return view('entrenos.edit', [
            'entreno' => $entreno,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Entreno  $entreno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entreno $entreno)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Entreno  $entreno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entreno $entreno)
    {
        $entreno->delete();

        return redirect()->route('entrenos.index');
    }
}