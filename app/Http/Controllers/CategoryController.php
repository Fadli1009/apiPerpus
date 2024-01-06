<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Category::all();
        return response()->json(['data'=>$data],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Category::create([
                'namaCategory'=>$request->namaCategory
            ]);
            return response()->json(['message'=>'berhasil memasukan data'],200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        try {
            return response()->json(['category'=>$category],200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()],500);
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $category->update([
                'namaCategory'=>$request->namaCategory
            ]);
            return response()->json(['category'=>$category],200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            $category->delete();
            return response()->json(['message'=>'berhasil menghapus'],200);
        } catch (\Throwable $th) {
            return response()->json(['message'=>'error','error'=>$th->getMessage()],500);
        }
    }
}
