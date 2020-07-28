<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    //

    /** Relacion 1:1 de Perfil con Usuario **/

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
