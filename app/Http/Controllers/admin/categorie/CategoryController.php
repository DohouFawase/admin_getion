<?php

namespace App\Http\Controllers\admin\categorie;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategorieFormRequest;
use App\Models\admin\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.categorie.index', [
            "categories" => Category::orderBy('created_at', 'asc')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $category = new Category();
       return view('admin.categorie.form',[
            "category" => $category

       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieFormRequest $request)
    {
        //
      $category = Category::create($request->validated());
      return to_route('admin.categorie.index')->with('success','la categorie a buen étét Cerer');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //

       

        return view('admin.categorie.form',[
            "category" => $category

       ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryController $request, Category $category)
    {
        //

        $category->update($request->validated());
        return to_route('admin.categorie.index')->with('la categorie a buen étét modifier');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
