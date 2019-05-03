<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arena;
use App\ArenaType;
use App\Franchise;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ArenaRequest;

class ArenaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($fid)
    {
        $arena_types = ArenaType::all();
        $franchise = Franchise::find($fid);
        return view('arena.create', [
            'arena_types' => $arena_types,
            'franchise' => $franchise
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArenaRequest $request)
    {
        $validated = $request->validated();

        $arena = new Arena();
        $arena->franchise_id = $request->franchise_id;
        $arena->arena_type_id = $request->arena_type_id;
        $arena->description = $request->description;

        $arena->save();

        return redirect()->route('franchiseArenasPage', $request->franchise_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $fid)
    {
        $arena = Arena::find($id);
        $arena_types = ArenaType::all();
        $franchise = Franchise::find($fid);

        return view('arena.edit', [
            'arena' => $arena,
            'arena_type' => $arena_types,
            'franchise' => $franchise
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
