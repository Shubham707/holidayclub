<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table='tbl_roles';

    protected $fillable = ['role','assignSections'];
}
