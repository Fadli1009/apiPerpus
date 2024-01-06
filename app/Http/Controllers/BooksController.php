<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function search(Request $request){
        try {            
            $data = Book::where('judulBuku','like','%'.$request->input('judulBuku').'%')->get();
            if($data->isEmpty()){
                return response()->json(['message'=>'data tidak ditemukan'],404);
            }else{
                return response()->json(['data'=>$data],200);
            }
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }
}