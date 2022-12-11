<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::all();

        return view('pages.portfolio.list', compact(['portfolio']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.portfolio.add');
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
            'company'       => 'required|string',
            'type'          => 'required|string',
            'url'           => 'required|string',
            'description'   => 'required|string',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $file = $request->image;
        $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
        $name = explode('.', $namewithextension)[0]; // Filename 'filename'
        $extension = $file->getClientOriginalExtension(); //Extension 'jpg'
        $uploadname = date('Y-m-d H:i:s') . '_' . $name . '.' . $extension;
        $image_path = $file->move('storage/portfolio', $uploadname);

        Portfolio::create([
            'name'          => $attributes['name'],
            'company_name'  => $attributes['company'],
            'type'          => $attributes['type'],
            'url'           => $attributes['url'],
            'description'   => $attributes['description'],
            'image'         => $image_path
        ]);

        return redirect()->route('portfolio.create')->with('success', 'Your data has been saved !');
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
        $portfolio = Portfolio::find($id);

        return view('pages.portfolio.edit', compact(['portfolio']));
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
        $portfolio = Portfolio::find($id);

        $attributes = $request->validate([
            'name'          => 'required|string',
            'company'       => 'required|string',
            'type'          => 'required|string',
            'url'           => 'required|string',
            'description'   => 'required|string',
            'image'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if($request->hasFile('image')){
            $file = $request->image;
            $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
            $name = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $file->getClientOriginalExtension(); //Extension 'jpg'
            $uploadname = date('Y-m-d H:i:s') . '_' . $name . '.' . $extension;
            unlink($portfolio->image);
            $image_path = $file->move('storage/portfolio', $uploadname);
        }else{
            $image_path = $portfolio->image;
        }

        $portfolio->update([
            'name'          => $attributes['name'],
            'company_name'  => $attributes['company'],
            'type'          => $attributes['type'],
            'url'           => $attributes['url'],
            'description'   => $attributes['description'],
            'image'         => $image_path
        ]);

        return redirect()->route('portfolio.edit', $id)->with('success', 'Your data has been updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Portfolio::where('id', $id)->delete();

        return redirect()->route('portfolio.index')->with('success', 'Your data has been deleted !');
    }
}
