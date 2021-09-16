<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    /**

     * The attributes that are mass assignable.

     *	

     * @var array

     */

    protected $fillable = [

        'name', 'detail', 'image'

    ];
    public static function getCount(){
        return Products::count();
    }
}
