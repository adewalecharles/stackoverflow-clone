<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection(Category::latest()->get());
    }

   
    public function store(Request $request)
    {
        $category = new Category;

        $category->name =  $request->name;
        $category->slug = Str::slug($request->name);
        $category->save();

        return response()->json('Created',Response::HTTP_CREATED);
    }

    
    public function show(Category $category)
    {
        return new CategoryResource($category);
    }


    
    public function update(Request $request, Category $category)
    {
         $category->update(
             [
                 'name' => $request->name, 
                 'slug' => Str::slug($request->name)
                 ]
                );

                return response()->json('Updated', Response::HTTP_ACCEPTED);
    }

    
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json('Deleted', Response::HTTP_NO_CONTENT);
    }
}
