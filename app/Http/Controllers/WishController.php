<?php

namespace App\Http\Controllers;

use App\Models\Wish;
use Illuminate\Http\Request;

class WishController extends Controller
{
    public function index(){
        $wishes = Wish::paginate(10);
        $counter = $wishes->firstItem();
        $var = [
            'wishes' => $wishes,
            'counter' => $counter,
        ];
       
        return view('wish.index', $var);
    }
    public function create(){
        return view('wish.create');
    }
    public function store(Request $request){
        $validated_data=$request->validate([
            'nama'=>'required|min:5|max:255',
            'komen'=>'required|min:5|max:255',
        ]);
        Wish::create($validated_data);

        return redirect()->route('wish.index')->with('success', 'your item has been added.');
    }
    public function edit($id){
        $wish=Wish::find($id);

        $var=['wish'=>$wish];

        return view('wish.edit', $var);
    }
    public function update(Request $request, $id){

        $wishes=Wish::findOrFail($id);
        $wishes->nama=$request->nama;
        $wishes->komen=$request->komen;
        $wishes->save();

        return redirect()->route('wish.index')->with('success', 'course has been updated');
    }
    public function destroy($id){
        $wish = Wish::findOrFail($id);
        $wish->delete();
        
        return redirect()->route('wish.index')->with('success', 'your course has been delete');
    }
}
