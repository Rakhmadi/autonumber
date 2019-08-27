<?php

namespace App\Http\Controllers;
use App\data_model;
use Illuminate\Http\Request;

class article extends Controller
{
    
   

    public function inputing(Request $req){
        

        
        $integer=$req['nourut']; // bisa inpur ke bulan 

        $integer = intval($integer);
 $result = '';
 // Create a lookup array that contains all of the Roman numerals.
 $lookup = array('M' => 1000,
 'CM' => 900,
 'D' => 500,
 'CD' => 400,
 'C' => 100,
 'XC' => 90,
 'L' => 50,
 'XL' => 40,
 'X' => 10,
 'IX' => 9,
 'V' => 5,
 'IV' => 4,
 'I' => 1);
 foreach($lookup as $roman => $value){
  // Determine the number of matches
  $matches = intval($integer/$value);
  // Add the same number of characters to the string
  $result .= str_repeat($roman,$matches);
  // Set the integer to be the remainder of the integer and the value
  $integer = $integer % $value;
 }

 $l= data_model::orderby('id', 'desc')->first();// mengambil data terakhir
 $c=$l->id +1;// menambah satu

        $g=data_model::create([ //create harus fillable ke model
            'no_urut'=>$result .' - '. $c,
            'data'=>$req['data'],
            'datas'=>$req['datas'],
        ]);
        $g->save();
        return response()->Json(['success'=>$g]); //melihat hasli response
    }
}
