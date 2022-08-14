<?php

namespace App\Http\Controllers;

use App\PresentationSection;
use Illuminate\Http\Request;

class PresentationSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = PresentationSection::latest()->get();

        return view("presentations.sections.index", compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presentations.sections.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        PresentationSection::create([
            'name' => $request->name
        ]);

        return back()->with('message','Successfully Submitted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PresentationSection  $presentationSection
     * @return \Illuminate\Http\Response
     */
    public function show(PresentationSection $presentationSection)
    {
        return $presentationSection;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PresentationSection  $presentationSection
     * @return \Illuminate\Http\Response
     */
    public function edit(PresentationSection $presentationSection)
    {
        return view('presentations.sections.edit', compact('presentationSection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PresentationSection  $presentationSection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PresentationSection $presentationSection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PresentationSection  $presentationSection
     * @return \Illuminate\Http\Response
     */
    public function destroy(PresentationSection $presentationSection)
    {
        $presentationSection->delete();

        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
}
