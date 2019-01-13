<?php

namespace App\Http\Controllers;

use App\Cleaner;
use App\Host;
use App\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HostController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function show(Host $host)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function edit(Host $host)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Host $host)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Host  $host
     * @return \Illuminate\Http\Response
     */
    public function destroy(Host $host)
    {
        //
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
      $availableCleaners = Auth::user()->host->availableCleaners();

      foreach($availableCleaners as $cleaner) {
        if($cleaner->user->email == $request->email) {
          Auth::user()->host->cleaners()->attach($cleaner->id);
        }
      }

      return view('hosts.my-cleaners');
    }

    public function deleteCleanerConnection(Cleaner $cleaner)
    {
      // Cancel cleaning projects

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
}
