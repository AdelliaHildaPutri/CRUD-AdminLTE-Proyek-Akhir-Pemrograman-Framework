<?php

namespace App\Http\Controllers;
use App\Models\Konsumen;
use Illuminate\Http\Request;

class KonsumenController extends Controller
{
    public function index()
    {
        $konsumens = Konsumen::count();
        $konsumens = Konsumen::latest()->paginate(5);
    
        return view('konsumens.index',compact('konsumens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('konsumens.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'kendaraan' => 'required',
            'harga' => 'required',
            'metode_pembayaran' => 'required',
        ]);
  
        Konsumen::create($request->all());
     
        return redirect()->route('konsumens.index')
                        ->with('success','Data Berhasil Ditambahkan.');
    }
    public function show(Konsumen $konsumen)
    {
        return view('konsumens.show', compact('konsumen'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Konsumen  $Konsumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Konsumen $konsumen)
    {
        return view('konsumens.edit', compact('konsumen'));
    }
    public function update(Request $request, Konsumen $konsumen)
{
    $request->validate([
        'tanggal' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'kendaraan' => 'required',
            'harga' => 'required',
            'metode_pembayaran' => 'required',
    ]);

    $konsumen->update($request->all());

    return redirect()->route('konsumens.index')
                    ->with('success', 'Data Berhasil Diubah');
}
public function destroy(Konsumen $konsumen)
{
    $konsumen->delete();
 
    return redirect()->route('konsumens.index')
                    ->with('success','Data Berhasil Dihapus');
}
}
