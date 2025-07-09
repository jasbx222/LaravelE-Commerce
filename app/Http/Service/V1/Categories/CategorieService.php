<?php
namespace App\Http\Service\V1\Categories;

use App\Models\Categorie;
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
    
        return  response()->json($category, 200);
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