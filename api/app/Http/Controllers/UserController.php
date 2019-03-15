<?php

namespace App\Http\Controllers;

use App\User;
use App\Franchise;
use App\FranchiseWorkingDay;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showAllUsers()
    {
        return response()->json(User::all());
    }

    public function showUser($id)
    {
        return response()->json(User::find($id));
    }

    public function create(Request $request)
    {
        $user = User::create($request->all());
        return response()->json($user, 201);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function delete($id)
    {
        User::findOrFail()->delete($id);
        return response('Deleted Successfully', 200);
    }

    public function showUserAllFranchises($id)
    {
        $franchises = User::find($id)->franchises;
        return response()->json($franchises);
    }

    public function showUserFranchise($id, $fid)
    {
        $franchise = User::find($id)->franchises()->where('id', $fid)->get();
        return response()->json($franchise);
    }

    public function showUserFranchiseWorkingDays($id, $fid)
    {
        $franchise = User::find($id)->franchises()->where('id', $fid)->get();
        $franchiseWorkingDays = Franchise::find($franchise[0]['id'])->franchiseWorkingDays;
        return response()->json($franchiseWorkingDays);
    }

    public function showUserFranchiseArenas($id, $fid)
    {
        $franchise = User::find($id)->franchises()->where('id', $fid)->get();
        $arenas = Franchise::find($franchise[0]['id'])->arenas;
        return response()->json($arenas);
    }
}
