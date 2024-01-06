<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Book::all();
        return response()->json(['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {            
            Book::create([
                'judulBuku'=>$request->judulBuku,
                'hargaBuku'=>$request->hargaBuku,
                'id_category'=>$request->id_category,
                'sipnosis'=>$request->sipnosis,
                'coverBuku'=>$request->coverBuku
            ]);
            return response()->json(['message'=>'successs'],200);
        } catch (\Exception $e) {
            return response()->json(['message'=>'error','error'=>$e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        try {            
            return response()->json(['data'=>$book]);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()],500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        try {
            $data = $request->validate([
                'judulBuku'=>'required',
                'hargaBuku'=>'required',
                'id_category'=>'required',
                'sipnosis'=>'required',
                'coverBuku'=>'required'
            ]);
            $book->update($data);
            return response()->json(['data'=>$book]);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        try {
            $book->delete();
            return response()->json(['message'=>'berhasil menghapus data'],200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()]);
        }
    }
}
