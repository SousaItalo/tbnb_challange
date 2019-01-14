<?php

namespace App\Http\Controllers;

use App\Cleaner;
use App\Host;
use App\House;
use App\CleaningProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CleanerController extends Controller
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
  {
    return view('cleaners.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Cleaner  $cleaner
   * @return \Illuminate\Http\Response
   */
  public function show(Cleaner $cleaner)
  {
    return view('cleaners.show');
  }

  public function myCustomers(Request $request)
  {
    $hosts = $request->user()->cleaner->hosts()->with([
      'houses' => function ($query) use ($request) {
        $query->whereHas('cleaners', function ($q) use ($request) {
          $q->where('cleaners.id', $request->user()->cleaner->id);
        });
      }
    ])->get();

    return view('cleaners.my-customers', [
      'hosts' => $hosts
    ]);
  }

  public function customerDetails(Request $request, Host $host)
  {
    $host->load(['user',
      'houses' => function ($query) use ($request) {
        $query->whereHas('cleaners', function($query2) use ($request) {
          $query2->where('cleaners.id', $request->user()->cleaner->id);
        });
      }
    ]);

    return view('hosts.cleaner-host-details', [
      'host' => $host
    ]);
  }

  public function myCleanings()
  {
    $houses = House::whereHas('cleanings', function($query) {
      $query->where('cleaner_id','=', Auth::user()->cleaner->id);
    })->get();

    return view('cleaners.my-cleanings', [
      'houses' => $houses
    ]);
  }

  public function cleaningDetails(CleaningProject $cleaningProject)
  {
    return view('cleaners.cleaning-details', [
      'cleaning' => $cleaningProject
    ]);
  }
}
