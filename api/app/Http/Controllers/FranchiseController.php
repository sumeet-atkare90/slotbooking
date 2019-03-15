<?php

namespace App\Http\Controllers;

use App\Franchise;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    public function showAllFranchises()
    {
        return response()->json(Franchise::all());
    }

    public function showFranchise($id)
    {
        $franchise = Franchise::find($id);
        return response()->json($franchise);
    }
}
