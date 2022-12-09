<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::all()->first();

        return view('pages.about.content', compact(['about']));
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
        $about = About::find($id);

        if($request->hasFile('image')){
            $file = $request->image;
            $namewithextension = $file->getClientOriginalName(); //Name with extension 'filename.jpg'
            $name = explode('.', $namewithextension)[0]; // Filename 'filename'
            $extension = $file->getClientOriginalExtension(); //Extension 'jpg'
            $uploadname = date('Y-m-d H:i:s') . '_' . $name . '.' . $extension;
            unlink($about->image);
            $image_path = $file->move('storage/about', $uploadname);
        }else{
            $image_path = $about->image;
        }
        $about->update([
            'name'          => $request->name,
            'birthday'      => $request->birthday,
            'address'       => $request->address,
            'age'           => $request->age,
            'degree'        => $request->degree,
            'major'         => $request->major,
            'email'         => $request->email,
            'status'        => $request->status,
            'image'         => $image_path,
        ]);

        return redirect()->route('about.index')->with('success', 'All data has been updated successfully !');
    }
}
