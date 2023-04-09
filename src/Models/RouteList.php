<?php

namespace Lkh\RouteList\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteList extends Model
{
    use HasFactory;
    protected $table = 'route_list';
    protected $fillable = ['id','created_at','updated_at','methods','domain','path','name','action','middleware'];
}
