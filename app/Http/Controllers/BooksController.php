<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function favorite(Request $request){
        try {
            $data = Favorite::create([
                'id_buku' => $request->id_buku,
                'id_user' =>auth()->user()->id  
            ]);
            return response()->json(['data'=>$data]);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }
    public function cart(Request $request){
        try {
            $data = Cart::create([
                'id_user'=>auth()->user()->id,
                'id_buku'=>$request->id_buku,
                'qty'=>$request->qty
            ]);
            if(!$data){
                return response()->json(['message'=>'Data gagal dimasukan'],401);
            }
            return response()->json(['message'=>$data],200);
            
        } catch (\Throwable $th) {
            return response()->json(['message'=>'erorr','error'=>$th->getMessage()]);
        }
    }
    public function cartme(){
        $id = Auth::user()->id;
        $data = Cart::where('id_user',$id)->get();
        return response()->json(['data'=>$data],200);
    }
}
