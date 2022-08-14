<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DmtnPriceSupplements;
use Illuminate\Support\Facades\File;

class DmtnPriceSupplementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $priceSupplements = DmtnPriceSupplements::latest()->paginate();

        return view('dmtn.priceSupplements.index', compact('priceSupplements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dmtn.priceSupplements.create');
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

        DmtnPriceSupplements::create([
                'name' => $request->name,
                'pdf'   => $fileName,
        ]);

       return back()->with('message','Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DmtnPriceSupplements  $dmtnPriceSupplements
     * @return \Illuminate\Http\Response
     */
    public function show(DmtnPriceSupplements $dmtnPriceSupplements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DmtnPriceSupplements  $dmtnPriceSupplements
     * @return \Illuminate\Http\Response
     */
    public function edit(DmtnPriceSupplements $dmtnPriceSupplements, $id)
    {
        $priceSupplements = DmtnPriceSupplements::where('id', $id)->first();

        return view('dmtn.priceSupplements.edit', compact('priceSupplements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DmtnPriceSupplements  $dmtnPriceSupplements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DmtnPriceSupplements $dmtnPriceSupplements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DmtnPriceSupplements  $dmtnPriceSupplements
     * @return \Illuminate\Http\Response
     */
    public function destroy(DmtnPriceSupplements $dmtnPriceSupplements, $id)
    {
        $priceSupplements = DmtnPriceSupplements::where('id', $id)->first();

        $pdf         = public_path("pdf_files\\") . $priceSupplements->pdf;
      
        if(File::exists($pdf)) {
            File::delete($pdf);
        }

        $priceSupplements->delete();

        return response()->json(['message' => 'Successfully Deleted']);
    }
}
