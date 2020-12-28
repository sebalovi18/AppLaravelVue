<?php

namespace App\Services\Productos;

use App\Models\Producto;
use Exception;

class ServiceProductos
{
    public function __construct(Producto $producto)
    {
        $this->producto = $producto;
    }
    public function getAllProductos()
    {
        try {
            return $this->producto->all();
        } catch (Exception $err) {
            abort(404, "Clientes no encontrados"); // o 400 ? o 412?
        }
    }
    public function getProducto($id)
    {
        try {
            return $this->producto->findOrFail($id);
        } catch (Exception $err) {
            abort(404, "Clientes no encontrados"); // o 400 ? o 412?
        }
    }
    public function storeProducto($validated)
    {
        try {
            $this->producto->create($validated);
        } catch (Exception $err) {
            abort(409, "El producto ya existe");
        }
    }
    public function updateProducto($id, $validated)
    {
        try {
            $this->producto->findOrFail($id)->update($validated);
        } catch (Exception $err) {
            abort(422);
        }
    }
    public function deleteProducto(int $id)
    {
        try {
            $this->producto->findOrFail($id)->delete();
        } catch (Exception $err) {
            abort(422);
        }
    }
    /***************** MOMENTANEO BACKUP *****************/
    public function loadDefaultDb()
    {
        $productos = json_decode(
            (file_get_contents(base_path('ProductosDbBackup/ProductosBackup.json')))
        );
        $collection = collect($productos);
        $collection = $collection->map(
            function ($value) {
                return [
                    'nombre' => $value->nombre,
                    'precio' => $value->precio,
                    'descripcion' => $value->descripcion
                ];
            }
        );
        foreach ($collection as $producto) {
            $this->storeProducto($producto);
        }
        echo "Finalizado...";
    }
    /*******************************************************************/
}
