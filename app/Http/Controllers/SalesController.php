<?php

namespace App\Http\Controllers;
use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::latest()->paginate(5);
    
        return view('sales.index',compact('sales'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('sales.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required',
        ]);
  
        Sales::create($request->all());
     
        return redirect()->route('sales.index')
                        ->with('success','Data Berhasil Ditambahkan.');
    }
    public function show(Sales $sales)
    {
        return view('sales.show',compact('sales'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales)
    {
        return view('sales.edit',compact('sales'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sales $sales)
    {
        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required',
        ]);
  
        $input = $request->all();
  
        $sales->update($input);
    
        return redirect()->route('sales.index')
                        ->with('success','Data Berhasil Diubah');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        $sales->delete();
     
        return redirect()->route('sales.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
