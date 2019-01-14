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

  public function manageCleaners(House $house)
  {
    return view('houses.manage-cleaners',[
      'house' => $house,
    ]);
  }

  public function getCleanersByHouse(House $house)
  {
    $cleaners = $this->getCleanersCollection($house);
    return response()->json($cleaners, 200);
  }

  public function dismissCleaner($house, $cleaner)
  {
    $house = House::find($house);
    $house->cleaners()->detach($cleaner);

    $cleaners = $this->getCleanersCollection($house);

    return response()->json($cleaners, 200);
  }

  public function assignCleaner(Request $request, House $house)
  {
    $availableCleaners = Auth::user()->host->cleaners->diff($house->cleaners);

    foreach ($availableCleaners as $cleaner) {
      if ($cleaner->user->email == $request->email) {
        $house->cleaners()->attach($cleaner->id);
      }
    }

    // TODO: find better way of refresh the $house object
    $cleaners = $this->getCleanersCollection(House::find($house->id));
    return response()->json($cleaners, 200);
  }

  public function deleteHouse(House $house)
  {
    // Delete cleaning projects
    foreach($house->cleanings as $cleaning) {
      $cleaning->delete();
    }
    // Delete House
    $house->delete();
    // Redirect to Houses List
    return redirect('/my-houses');
  }

  function getCleanersCollection(House $house)
  {
    $cleaners = collect([]);
    foreach ($house->cleaners as $cleaner) {
      $cleaners->push([
        'id' => $cleaner->id,
        'name' => $cleaner->user->name,
        'email' => $cleaner->user->email,
      ]);
    }
    return $cleaners;
  }
}
