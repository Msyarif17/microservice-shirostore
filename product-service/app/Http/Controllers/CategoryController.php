<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Patern\ResponsePatern;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoryController extends Controller
{
    private $message = [
        'Success:',
        'Error:',
    ];

    
    
    public function get(){
        try{
            return response()->json(
                ResponsePatern::patern(true,$this->message[0]."get data",Category::all())
            );
        }catch(Exception $e){
            return response()->json(ResponsePatern::patern(false, $e), 500);    
        }
    }

    public function edit(Request $data){
        $this->validate($data,[
            'id'=>'numeric',
        ]);

        try{
            $category = Category::find($data['id']);
            $category->update($data);
            
            return response()->json(
                ResponsePatern::patern(true,$this->message[0]."edit data")
            );
        }catch(Exception $e){
            return response()->json(
                ResponsePatern::patern(false,$e),500
            );
        }
    }
}
