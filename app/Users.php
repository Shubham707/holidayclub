<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table= 'users';

    $fillable = ['name','email','password','locID','roleId'];
    $hidden = ['isDeleted','createdBy']
}
