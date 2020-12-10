<?php

namespace App\Services\Productos;

use App\Models\Producto;

class ServiceProductos
{
    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }
    public function getAllProductos()
    {
        return $this->producto->all();
    }
    public function getProducto($id)
    {
        return $this->producto->findOrFail($id);
    }
    public function storeProducto($validated)
    {
        $this->producto->create($validated);
    }
    public function updateProducto($id,$validated)
    {
        $this->producto->findOrFail($id)->update($validated);
    }
    public function deleteProducto($id)
    {
        $this->producto->findOfFail($id)->delete();
    }
}