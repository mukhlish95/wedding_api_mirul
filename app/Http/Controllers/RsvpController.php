<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use Illuminate\Http\Request;

class RsvpController extends Controller
{
    public function index(){
        $rsvps = Rsvp::paginate(10);
        $counter = $rsvps->firstItem();
        $var = [
            'rsvps' => $rsvps,
            'counter' => $counter,
        ];
       
        return view('rsvp.index', $var);
    }
    public function create(){
        return view('rsvp.create');
    }
    public function store(Request $request){
        $validated_data=$request->validate([
            'nama'=>'required|min:5|max:255',
            'no_tel'=>'required|min:5|max:255',
            'kehadiran'=>'required|min:5|max:255',
        ]);
        Rsvp::create($validated_data);

        return redirect()->route('rsvp.index')->with('success', 'your item has been added.');
    }
    public function edit($id){
        $rsvp=Rsvp::find($id);

        $var=['rsvp'=>$rsvp];

        return view('rsvp.edit', $var);
    }
    public function update(Request $request, $id){

        $rsvps=Rsvp::findOrFail($id);
        $rsvps->nama=$request->nama;
        $rsvps->no_tel=$request->no_tel;
        $rsvps->kehadiran=$request->kehadiran;
        $rsvps->save();

        return redirect()->route('rsvp.index')->with('success', 'course has been updated');
    }
    public function destroy($id){
        $rsvp = Rsvp::findOrFail($id);
        $rsvp->delete();
        
        return redirect()->route('rsvp.index')->with('success', 'your course has been delete');
    }
}
