<?php
namespace App\Http\Service\Admin\Products;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\Admin\ProductResource;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductService extends Controller
{
    public function index()
    {
        return Product::all();
    }
    
//show

public function show($product)
{
    
    $product = Product::findOrFail($product);
    
    // إرجاع المنتج  
    return new ProductResource($product);
}

public function store( array $data)
{
       // تحقق من وجود صورة
    if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
        // خزن الصورة في مجلد مثلاً 'products' داخل public disk
        $data['image'] = $data['image']->store('products', 'public');
    }
   $product = Product::create($data);

        return $product;

}

public function update(array $data,  $product)
{
    if (isset($data['image']) && $data['image'] instanceof UploadedFile) {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $data['image']->store('products', 'public');
    }

    $product->update($data);

    return $product;
}

public function destroy(Product $product)
{
    // حذف الصورة لو موجودة
    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    $product->delete();
}


}