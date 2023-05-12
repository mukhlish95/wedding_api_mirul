<?php

namespace App\Http\Controllers;

use App\Models\Rsvp;
use App\Models\Wish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function store_rsvp(Request $request){
       
        $data = $request->all();

        $validator = Validator::make($request->all(), [
                'nama'=>'required',
                'no_tel'=>'required',
                'kehadiran'=>'required',
        ]);

        if ($validator->fails()) {

            $message = '';
            foreach($validator->errors()->all() as $error){
                $message .= $error . ', ';
            }
            $error = [
                'status' =>  404,
                'message' => $message
            ];

            return $error;
        }

        Rsvp::create([
            'nama'=> $data['nama'],
            'no_tel'=> $data['no_tel'],
            'kehadiran'=> $data['kehadiran'],
        ]);

        $success = [
            'status' => 200,
            'message' => 'Successfully created data'
        ];
        return $success;
    }

    public function fetch_wish(){
        $wish = Wish::all();


        $success = [
            'status' => 200,
            'message' => 'Successfully found wishes',
            'data' => $wish
        ];
        return $success;
    }

    public function store_wish(Request $request){
       
        $data = $request->all();

        $validator = Validator::make($request->all(), [
                'nama'=>'required',
                'komen'=>'required',
        ]);

        if ($validator->fails()) {

            $message = '';
            foreach($validator->errors()->all() as $error){
                $message .= $error . ', ';
            }
            $error = [
                'status' =>  404,
                'message' => $message
            ];

            return $error;
        }

        Wish::create([
            'nama'=> $data['nama'],
            'komen'=> $data['komen'],
        ]);

        $success = [
            'status' => 200,
            'message' => 'Successfully created data'
        ];
        return $success;
    }
}
