<?php
namespace App\Http\Service\Admin\Categories;

use App\Models\Categorie;
use App\Http\Requests\StoreCategorieRequest;
use App\Http\Requests\UpdateCategorieRequest;
use App\Http\Resources\Admin\CategoryResource;

class CategorieService 
{
     public function getAllCategories()
    {
        $categores = Categorie::all();
        return response()->json($categores, 200);
    }

    public function getCategoryById($category)
    {
    
        return  new CategoryResource($category);
    }

    //store

    public function CreateCategories($request){

        $validatedData = $request->validated();

        $categorey=Categorie::create($validatedData);

        return   $categorey;

    }

    //put 


    public function UpdateCategories($request,$categorey){

        $validatedData = $request->validated();

        $categorey->update($validatedData);

        return   $categorey;

    }


    //delete


    public function DestroyCategories($categorey){

        $categorey->delete();

        return response()->json([
            'message'=>'deleted has been successfully !'
        ],201);

    }
}