<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::all();

        return view('pages.experience.list', compact(['experience']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.experience.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'company'       => 'required|string',
            'position'      => 'required|string',
            'date'          => 'required|string',
            'description'   => 'required',
        ]);

        Experience::create([
            'company'       => $attributes['company'],
            'position'      => $attributes['position'],
            'date'          => $attributes['date'],
            'description'   => $attributes['description'],
        ]);

        return redirect()->route('experience.create')->with('success', 'Your data has been saved !');
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
    public function edit($id)
    {
        $experience = Experience::find($id);

        return view('pages.experience.edit', compact(['experience']));
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
        $attributes = $request->validate([
            'company'       => 'required|string',
            'position'      => 'required|string',
            'date'          => 'required|string',
            'description'   => 'required',
        ]);

        Experience::where('id', $id)->update([
            'company'       => $attributes['company'],
            'position'      => $attributes['position'],
            'date'          => $attributes['date'],
            'description'   => $attributes['description'],
        ]);

        return redirect()->route('experience.edit', $id)->with('success', 'Your data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Experience::where('id', $id)->delete();

        return redirect()->route('experience.index')->with('success', 'Your data has been deleted !');
    }
}
