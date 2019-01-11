<?php

namespace App\Http\Controllers;

use App\Cleaner;
use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

  public function new()
  {
    return view('houses.new');
  }

  public function store(Request $request)
  {
    House::create([
      'name' => $request->name,
      'address' => $request->address,
      'host_id' => Auth::user()->host->id,
    ]);

    return redirect('/my-houses');
  }

  public function edit(House $house)
  {
    return view('houses.edit', [
      'house' => $house,
    ]);
  }

  public function update(Request $request)
  {
   $house = House::find($request->id);
   $house->name = $request->name;
   $house->address = $request->address;
   $house->save();

   return redirect('/my-houses');
  }
}
