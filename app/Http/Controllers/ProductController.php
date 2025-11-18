<?php
namespace App\Http\Controllers;

use App\Services\ProductService;
use App\Http\Requests\ProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
        $this->middleware('auth:api'); // JWT middleware works now
    }

    public function index()
    {
        return response()->json($this->service->getAllProducts());
    }

    public function store(ProductRequest $request)
    {
        $this->authorize('create', Product::class);
        return response()->json($this->service->createProduct($request->validated()), 201);
    }

    public function show($id)
    {
        $product = $this->service->getProduct($id);
        $this->authorize('view', $product);
        return response()->json($product);
    }

    public function update(ProductRequest $request, $id)
    {
        $product = $this->service->getProduct($id);
        $this->authorize('update', $product);
        return response()->json($this->service->updateProduct($id, $request->validated()));
    }

    public function destroy($id)
    {
        $product = $this->service->getProduct($id);
        $this->authorize('delete', $product);
        return response()->json($this->service->deleteProduct($id));
    }
}
