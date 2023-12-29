<?php

namespace App\Http\Controllers;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $totalUnits = Unit::count();
        $units = Unit::latest()->paginate(5);

        return view('units.index', compact('units', 'totalUnits'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        return view('units.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'merek_motor' => 'required',
            'tahun_pembuatan' => 'required',
            'warna_motor' => 'required',
            'harga' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        Unit::create($input);
     
        return redirect()->route('units.index')
                        ->with('success','Data Berhasil Ditambahkan.');
    }
    public function show(Unit $unit)
    {
        return view('units.show',compact('unit'));
    }
    public function edit(Unit $unit)
    {
        return view('units.edit',compact('unit'));
    }
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'merek_motor' => 'required',
            'tahun_pembuatan' => 'required',
            'warna_motor' => 'required',
            'harga' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $unit->update($input);
    
        return redirect()->route('units.index')
                        ->with('success','Data Berhasil Diubah');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
     
        return redirect()->route('units.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
