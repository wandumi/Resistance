<?php

namespace App\Http\Controllers;

use App\Financial;
use App\FinancialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\FinancialsRequest;

class FinancialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $financials = Financial::latest()->get();

        $financialLists = FinancialSection::all();
        
        return view("financials.index", compact('financials', 'financialLists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $financialLists = FinancialSection::all();

        return view("financials.create", compact('financialLists') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FinancialsRequest $request)
    {
        if($request->hasFile('pdf') && $request->hasFile('cover_image'))
        {
            $pdf        = $request->pdf;
            $pdfName    = time() . $pdf->getClientOriginalName();
            $pdf->move(public_path('pdf_files/'), $pdfName);

            $coverImage = $request->cover_image;
            $coverName  = time(). $coverImage->getClientOriginalName();
            $coverImage->move(public_path('cover_images/'), $coverName);
        }

        Financial::create([
            'financial_section_id'  => $request->financial_section_id,
            'pdf'                   => $pdfName,
            'cover_image'           => $coverName,
        ]);

        return back()->with('message', 'Successfully Submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function show(Financial $financial)
    {
        return $financial;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function edit(Financial $financial)
    {
       
        $financial->load('financial_section');

        // dd($financial->id);

        return view('financials.edit', compact('financial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Financial $financial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Financial  $financial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Financial $financial)
    {
        $pdf         = public_path("pdf_files/") .$financial->pdf;
        $coverImage  = public_path("cover_images/") .$financial->cover_image;

        if(File::exists($pdf) && File::exists($coverImage)) {
            File::delete($pdf);
            File::delete($coverImage);
        }
        
        $financial->delete();

        return response()->json(['message' => 'Successfully Deleted']);
    }
}
