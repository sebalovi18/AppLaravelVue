<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductoRequest;
use App\Http\Resources\ProductoResource;
use App\Services\Productos\ServiceProductos;

class ProductoController extends Controller
{
    public function __construct(ServiceProductos $productos)
    {
        $this->productos = $productos;
    }
    public function getAllProductos()
    {
        $response = $this->productos->getAllProductos();
        return
            response(
                ProductoResource::collection($response),
                200
            );
    }
    public function store(ProductoRequest $request)
    {
        $this->productos->storeProducto($request->validated());
        return
            response('', 201);
    }
    public function update(ProductoRequest $request, int $id)
    {
        $this->productos->updateProducto($id, $request->validated());
        return
            response('', 201);
    }
    public function destroy(int $id)
    {
        $this->productos->deleteProducto($id);
        return
            response('', 204);
    }
}
