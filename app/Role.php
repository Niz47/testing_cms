<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole {

    protected $fillable = ['name', 'display_name', 'description'];

    public static $important = [
        'superadmin',
        'admin',
        'user'
    ];

    public function isImportant(){
        return in_array($this->name,static::$important);
    }

}
