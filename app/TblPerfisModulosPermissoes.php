<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblPerfisModulosPermissoes extends Model
{
    protected $fillable = ['id','id_igreja','id_modulo_igreja','id_permissao'];
}
