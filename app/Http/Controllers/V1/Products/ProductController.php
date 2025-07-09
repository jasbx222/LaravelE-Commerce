<?php
namespace App\Http\Controllers\V1\Products;

use App\Http\ApiController\ApiController;
use App\Http\Requests\Admin\StoreProductRequest;
use App\Http\Requests\Admin\UpdateProductRequest;
use App\Models\Product;
use App\Http\Resources\Admin\ProductResource;
use App\Http\Service\Admin\Products\ProductService;

class ProductController extends ApiController
{
    private $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        // عموماً لا حاجة لصلاحيات هنا إلا إذا لديك قيود خاصة
        return $this->product->index();
    }

    public function show(Product $product)
    {
        $this->isAble('view', $product); // تحقق الصلاحية قبل عرض المنتج
        return $this->product->show($product);
    }

    public function store(StoreProductRequest $request)
    {
        $this->isAble('create', Product::class); // تحقق صلاحية الإنشاء
        $product = $this->product->store($request->validated());
        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->isAble('update', $product); // تحقق صلاحية التحديث
        $updatedProduct = $this->product->update($request->validated(), $product);

        return response()->json([
            'message' => 'تم تحديث المنتج بنجاح',
            'data' => $updatedProduct,
        ]);
    }

    public function destroy(Product $product)
    {
        $this->isAble('delete', $product); // تحقق صلاحية الحذف
        $this->product->destroy($product);

        return response()->json([
            'message' => 'تم حذف المنتج بنجاح'
        ], 200);
    }
}
