<?php

namespace App\Http\Controllers;

use App\Models\Pembobotan;
use Illuminate\Http\Request;

class PembobotanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembobotan = Pembobotan::all();

        return view('skriteria.index', compact('pembobotan'));
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
    public function show(Pembobotan $pembobotan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembobotan $pembobotan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembobotan $pembobotan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembobotan $pembobotan)
    {
        //
    }
}
