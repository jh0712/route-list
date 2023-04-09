<?php

namespace Lkh\RouteList\Controller;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Carbon;
use Lkh\RouteList\Models\RouteList;
use Route;
use Closure;
class RouteListController extends Controller
{
    public function index(){
        $middlewareClosure = function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        };

        $routes = collect(Route::getRoutes());
        $filter = config('routelist.filter_regular');
        foreach ( $filter as $regex) {
            $routes = $routes->filter(function ($value, $key) use ($regex) {
                return !preg_match($regex, $value->uri());
            });
        }
        return view('routelist::index',compact('routes','middlewareClosure','filter'));
    }
    public function getRouteListData()
    {
        $routelist = RouteList::select(['id', 'domain','name', 'path', 'methods', 'action', 'middleware', 'created_at']);

        return datatables()->of($routelist)
            ->editColumn('created_at',function ($route){
                return Carbon::createFromFormat('Y-m-d H:i:s', $route->created_at);
            })
            ->make(true);
    }

}
