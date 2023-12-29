<?php

namespace App\Http\Controllers;
use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function dashboard() {
        return view('dashboard');
    }
    public function index() {

        $datax = User::get();

        return view('users.index',compact('datax'));
    }
    public function create() {
        return view('users.create');
    }
    public function store(Request $request) {
        $validator = validator::make($request->all(),[
            'email' => 'required|email',
            'nama'  => 'required',
            'password'  => 'required'
        ]);

        if($validator->fails()) return redirect()->back()->withInput()->withError($validator);

        $datax['name']     =$request->nama;
        $datax['email']    =$request->email;
        $datax['password'] =Hash::make($request->password);

        User::create($datax);

        return redirect()->route('users.index');
    }
    public function edit(Request $request, $id) {
        $data = User::find($id);
        return view('users.edit', compact('data'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name'     => 'required',
            'email'    => 'required|email',
            'password' => 'nullable',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
    
        $datax = [
            'name'  => $request->name,
            'email' => $request->email,
        ];
    
        if ($request->filled('password')) {
            $datax['password'] = Hash::make($request->password);
        }
    
        User::where('id', $id)->update($datax);
    
        return redirect()->route('users.index');
    }
    
    public function delete(Request $request,$id) {
        $datax = User::find($id);

        if($datax) {
            $datax->delete();
        }

        return redirect()->route('users.index');
    }
}
