<?php

namespace App\Http\Controllers;

use App\Cleaner;
use App\House;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function show(Request $request, House $house)
    {
        return view('houses.show', [
            'house' => $house
        ]);
    }

    public function all()
    {
        return response()->json(House::all(), 200);
    }
}
