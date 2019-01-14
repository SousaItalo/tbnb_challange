<?php

namespace App\Http\Controllers;

use App\Cleaner;
use App\Host;
use App\House;
use App\CleaningProject;
Use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function myCleaners(Request $request)
  {
    return view('hosts.my-cleaners');
  }

  public function getMyCleaners(Request $request)
  {
    /** @var Host $host */
    $host = $request->user()->host;

    $cleaners = $host->cleaners()->with([
      'user',
      'houses' => function ($query) use ($request) {
        $query->where('host_id', $request->user()->host->id);
      }])->get();

    return response()->json($cleaners, 200);
  }

  public function newCleanerConnection(Request $request)
  {
    return view('hosts.new-cleaner-connection');
  }

  public function storeCleanerConnection(Request $request)
  {
    $cleaner = Cleaner::whereHas('user', function($query) use ($request) {
      $query->where('email', '=', $request->email);
    })->first();

    if($cleaner && $cleaner->hosts->find(Auth::user()->host->id) == null) {
      Auth::user()->host->cleaners()->attach($cleaner->id);
    }

    return view('hosts.my-cleaners');
  }

  public function deleteCleanerConnection(Cleaner $cleaner)
  {
    //Delete Cleaning projects
    $cleaner->cleanings()->with([
      'house' => function($query) {
        $query->whereHas('host', function($q) {
          $q->where('id', Auth::user()->host->id);
        });
      }
    ])->delete();

    // Dismiss from every Host's houses
    foreach(Auth::user()->host->houses as $house) {
      $house->cleaners()->detach($cleaner->id);
    }

    // Delete Host + cleaner conn
    Auth::user()->host->cleaners()->detach($cleaner->id);

    return view('hosts.my-cleaners');
  }

  public function myHouses(Request $request)
  {
    return view('hosts.my-houses');
  }

  public function getMyHouses(Request $request)
  {
    /** @var Host $host */
    $host = $request->user()->host;

    return response()->json($host->houses, 200);
  }

  public function myCleanings(Request $request)
  {
    return view('hosts.my-cleanings');
  }

  public function houseDetails(Request $request, House $house)
  {
    $house->load('cleaners.user');

    return view('houses.host-show', [
      'house' => $house
    ]);
  }

  public function cleanerDetails(Request $request, Cleaner $cleaner)
  {
    $cleaner->load('user');
    $cleaner->load([
      'houses' => function ($query) use ($request) {
        $query->where('host_id', $request->user()->host->id);
      }
    ]);

    return view('cleaners.host-cleaner-details', [
      'cleaner' => $cleaner
    ]);
  }

  public function listCleaningProjects()
  {
    $cleanings = collect([]);

    // For some reason ->merge() didn't work here
    // personally I avoid nested loops, but since
    // I'm looking at this project as an MVP, in this case that should be fine.

    foreach(Auth::user()->host->houses as $house) {
      foreach($house->cleanings as $cleaning) {
        $cleanings->push([
          'id' => $cleaning->id,
          'houseName' => $house->name,
          'houseAddress' => $house->address,
          'cleanerName' => $cleaning->cleaner->name,
          'start' => $cleaning->start,
          'end' => $cleaning->end,
        ]);
      }
    }

    return view('hosts.cleaning-projects',[
      'cleanings' => $cleanings,
    ]);
  }

  public function newCleaningProject()
  {
    return view ('hosts.new-cleaning-project');
  }

  public function storeCleaningProject(Request $request) {
    $start = substr((string)$request->start, 0, 10);
    $end = substr((string)$request->start, 0, 10);

    $start = Carbon::createFromTimestamp($start)->toDateTimeString();
    $end = Carbon::createFromTimestamp($end)->toDateTimeString();

    CleaningProject::create([
      'house_id' => $request->house,
      'cleaner_id' => $request->cleaner,
      'start' => $start,
      'end' => $end,
    ]);

    return redirect('/cleaning-projects');
  }

  public function showCleaningProject(CleaningProject $cleaningProject)
  {
    // TODO Research better way to serialize controller answers
    return view('hosts.cleaning-project-details', [
      'cleaningProject' => $cleaningProject,
      'house' => $cleaningProject->house,
    ]);
  }

  public function deleteCleaningProject(CleaningProject $cleaningProject)
  {
    $cleaningProject->delete();
    return redirect('/cleaning-projects');
  }
}
