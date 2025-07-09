<?php
namespace App\Http\Controllers\V1\Categories;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategorieStoreRequest;
use App\Http\Service\V1\Categories\CategorieService;
use App\Models\Categorie; // Assuming you have a Category model
class CategorieController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $categorieService;
    public function __construct(CategorieService $categorieService)
    {
        $this->categorieService = $categorieService;
    }
    public function index()
    {
       return $this->categorieService->getAllCategories();
      
    }//

    public function show(Categorie $categorie)
    {
          $this->isAble('show', $categorie);
        return $this->categorieService->getCategoryById($categorie);
    }


    //store 

    public function store(CategorieStoreRequest $request)


       

{
       $this->isAble('store', $categorie);

    $categorie=$this->categorieService->CreateCategories($request);

    return response()->json([
        'category'=>$categorie
    ],201);

 }

    public function update(CategorieStoreRequest $request,Categorie $categorey)
 
  

{
  $this->isAble('update', $categorie); 


    $categorie=$this->categorieService->UpdateCategories($request,$categorey);

    return response()->json([
        'category'=>$categorie
    ],200);

}


//delete 

public function delete(Categorie $categorey){
  $this->isAble('delete', $categorey); 


    return $this->categorieService->DestroyCategories($categorey);
}
}