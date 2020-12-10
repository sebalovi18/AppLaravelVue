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
        return ProductoResource::collection($this->productos->getAllProductos());
    }
    public function store(ProductoRequest $request)
    {
        $this->productos->storeProducto($request);
        return $this->getAllProductos();
    }
    public function update(ProductoRequest $request, int $id)
    {
        $this->productos->updateProducto($id,$request);
        return $this->getAllProductos();
    }
    public function destroy(int $id)
    {
        $this->productos->deleteProducto($id);
        return $this->getAllProductos();
    }
    
}
