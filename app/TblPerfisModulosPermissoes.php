<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TblPerfisModulosPermissoes extends Model
{
    protected $fillable = ['id','id_igreja','id_modulo','id_permissao'];
}
