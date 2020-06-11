<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Printer;

class PrinterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $printers = Printer::all()->toArray();
        return view('printer.index', compact('printers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('printer.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'order_id' => 'required',
            'document_needed' => 'required',
            'quantity' => 'required',
            'area' => 'required',
            'order_status' => 'required'
        ]);
        $printer = new Printer([
            'order_id' => $request->get('order_id'),
            'document_needed' => $request->get('document_needed'),
            'quantity' => $request->get('quantity'),
            'area' => $request->get('area'),
            'order_status' => $request->get('order_status')
        ]);
        $printer->save();
        return redirect()->route('printer.index')->with('success', 'Data Added');
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
        $printer = Printer::findOrFail($id);
        return view('printer.edit', compact('printer', 'id'));
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
        $this->validate($request, [
            'order_id' => 'required',
            'document_needed' => 'required',
            'quantity' => 'required',
            'area' => 'required',
            'order_status' => 'required'
        ]);
        $printer = Printer::findOrFail($id);
        $printer->order_id = $request->get('order_id');
        $printer->document_needed = $request->get('document_needed');
        $printer->quantity = $request->get('quantity');
        $printer->area = $request->get('area');
        $printer->order_status = $request->get('order_status');
        $printer->save();
        return redirect()->route('printer.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $printer = Printer::findOrFail($id);
        $printer->delete();
        return redirect()->route('printer.index')->with('success', 'Data Deleted');
    }
}
