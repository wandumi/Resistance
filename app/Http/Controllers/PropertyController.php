<?php

namespace App\Http\Controllers;

use App\Pronvice;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\PropertiesRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pronvices = Pronvice::all();
        
        $properties = Property::latest()->get();
        
        return view('properties.index', compact('properties','pronvices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pronvices = Pronvice::orderBy('name', 'asc')->get();

        return view('properties.create', compact('pronvices'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PropertiesRequest $request)
    {
        if($request->hasFile('cover_image'))
        {
            $cover = $request->cover_image;

            $coverImage = time(). $cover->getClientOriginalName();

            $cover->move(public_path('cover_images/'), $coverImage);
        }
   
        Property::create([
            'pronvice_id'   => $request->pronvice_id,
            'name'          => $request->name,
            'description'   => $request->description,
            'website_link'  => $request->website_link,
            'cover_image'   => $coverImage,
        ]);

        return back()->with('message','Successfully Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return $property;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $pronvices = Pronvice::all();

        return view('properties.edit', compact('property','pronvices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        
        $coverImage  = public_path("cover_images/") . $property->cover_image;

        if(File::exists($coverImage)) {
            File::delete($coverImage);
        }

        //remove relationship and delete
        $property->pronvice()->dissociate()->delete();

        return response()->json(['message' => 'Successfully Deleted']);
    }
}
