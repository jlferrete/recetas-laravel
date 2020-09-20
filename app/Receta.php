<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{

    // Campos que se agregaran
    protected $fillable = [
        'titulo', 'preparacion', 'ingredientes', 'imagen', 'categoria_id'
    ];
    
    // Obtiene la categoria de la receta via FK
    public function categoria()
    {
       return $this->belongsTo(CategoriaReceta::class);
    }

    // Obtiene la información del usuario via FK
    public function autor()
    {
        return $this->belongsTo(User::class, 'user_id'); // FK de esta tabla
    }

    // Likes que ha recibido una receta
    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes_receta');
    }

}
