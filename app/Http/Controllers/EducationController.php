<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::all();

        return view('pages.education.list', compact(['education']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.education.add');
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
            'name'          => 'required|string',
            'year'          => 'required|string',
            'major'         => 'required|string',
            'description'   => 'required|string',
        ]);

        Education::create([
            'name'          => $attributes['name'],
            'year'          => $attributes['year'],
            'major'         => $attributes['major'],
            'description'   => $attributes['description'],
        ]);

        return redirect()->route('education.create')->with('success', 'Your data has been saved !');
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
        $education = Education::find($id);

        return view('pages.education.edit', compact(['education']));
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
            'name'          => 'required|string',
            'year'          => 'required|string',
            'major'         => 'required|string',
            'description'   => 'required|string',
        ]);

        Education::where('id', $id)->update([
            'name'          => $attributes['name'],
            'year'          => $attributes['year'],
            'major'         => $attributes['major'],
            'description'   => $attributes['description'],
        ]);

        return redirect()->route('education.edit', $id)->with('success', 'Your data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Education::where('id', $id)->delete();

        return redirect()->route('education.index')->with('success', 'Your data has been deleted !');
    }
}
