<?php

namespace App\Models;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'categorias';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // CREAMOS RELACIÓN CON EL MODELO PRODUCTO
    public function productos() {
        return $this->hasMany(Producto::class);
    }
    // USAMOS EL MÉTODO hasMany PARA INDICAR QUE UNA CATEGORÍA PUEDE TENER MUCHOS PRODUCTOS
}
