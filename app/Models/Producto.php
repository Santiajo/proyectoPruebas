<?php

namespace App\Models;

// PARA PODER DEFINIR LOS CAMPOS QUE SE PUEDEN LLENAR
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // LLAMAMOS HasFactory PARA USARLO
    use HasFactory;

    // ASIGNAMOS EL NOMBRE DE LA TABLA
    protected $table = 'productos';

    // ESPECÍFICAMOS LOS CAMPOS QUE SE PUEDEN LLENAR
    protected $fillable = [
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
        'fecha_vencimiento',
        'disponible',
    ];

    // CREAMOS RELACIÓN CON EL MODELO CATEGORIA
    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }
    // USAMOS EL MÉTODO belongsTo PARA INDICAR QUE UN PRODUCTO PERTENECE A UNA CATEGORÍA
}
