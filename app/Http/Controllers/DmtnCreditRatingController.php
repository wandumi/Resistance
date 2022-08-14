<?php

namespace App\Http\Controllers;

use App\DmtnCreditRating;
use Illuminate\Http\Request;

class DmtnCreditRatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditRatings = DmtnCreditRating::latest()->paginate();

        return view('dmtn.creditRating.index', compact('creditRatings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dmtn.creditRating.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('pdf'))
        {
            $pdf = $request->pdf;
            $fileName = time() . $pdf->getClientOriginalName();
            $pdf->move(public_path('pdf_files/'), $fileName);
        }

        DmtnCreditRating::create([
                'name' => $request->name,
                'pdf'   => $fileName,
        ]);

       return back()->with('message','Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DmtnCreditRating  $dmtnCreditRating
     * @return \Illuminate\Http\Response
     */
    public function show(DmtnCreditRating $dmtnCreditRating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DmtnCreditRating  $dmtnCreditRating
     * @return \Illuminate\Http\Response
     */
    public function edit(DmtnCreditRating $dmtnCreditRating, $id)
    {
        $creditRating = DmtnCreditRating::where('id', $id)->first();

        return view('dmtn.creditRating.edit', compact('creditRating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DmtnCreditRating  $dmtnCreditRating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DmtnCreditRating $dmtnCreditRating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DmtnCreditRating  $dmtnCreditRating
     * @return \Illuminate\Http\Response
     */
    public function destroy(DmtnCreditRating $dmtnCreditRating, $id)
    {
        $creditRating = DmtnCreditRating::where('id', $id)->first();

        $pdf         = public_path("pdf_files\\") . $creditRating->pdf;
      
        if(File::exists($pdf)) {
            File::delete($pdf);
        }

        $creditRating->delete();

        return response()->json(['message' => 'Successfully Deleted']);
    }
}
