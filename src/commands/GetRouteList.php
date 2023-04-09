<?php

namespace Lkh\RouteList\Commands;

use Illuminate\Console\Command;
use Route;
use Closure;
use Illuminate\Support\Facades\DB;
use RouteList\Models\RouteList;
class GetRouteList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:get-route-list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'The purpose of this command is to insert route data into the database.';

    /**
     *
     *
     * @var string
     */
    protected $progress;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //clear db
        $this->info('clear db');
        $this->cleardb();
        $this->info('clear db done!');
        //get route
        $this->info('get the routes data');
        $routes = $this->get_route();
        $this->info('get data done!');
        //insert db
        DB::beginTransaction();
        try{
            $this->info('insert to db');
            $this->set_progress_bar($routes->count());
            $routes->map(function($route){
                $this->insert_data($route);
                $this->progress->advance();
            });
            $this->progress->finish();
            $this->info("\r\nfinished!");
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
    public function set_progress_bar($num){
        $this->progress = $this->output->createProgressBar($num);
        $this->progress->setFormat("%message%\n%current%/%max% [%bar%] %percent:3s%%");
        $this->progress->setMessage("100? I won't insert all that!");
    }
    public function cleardb(){
        RouteList::truncate();
    }
    public function  get_route(){
        $routes = collect(Route::getRoutes());
        $filter = config('routelist.filter_regular');
        foreach ($filter as $regex) {
            $routes = $routes->filter(function ($value, $key) use ($regex) {
                return !preg_match($regex, $value->uri());
            });
        }
        return $routes;
    }

    public function insert_data($route){
        // set Closure
        $middlewareClosure = function ($middleware) {
            return $middleware instanceof Closure ? 'Closure' : $middleware;
        };
        //save model
        $model = New RouteList();
        $model->methods = implode(",", array_diff($route->methods(),config('routelist.filter_regular')));
        $model->domain = $route->domain();
        $model->path = $route->uri();
        $model->name = $route->getName();
        $model->action = $route->getActionName();
        //check controllerMiddleware function
        if(is_callable([$route, 'controllerMiddleware'])){
            $model->middleware = implode(', ', array_map($middlewareClosure, array_merge($route->middleware(), $route->controllerMiddleware())));
        }else{
            $model->middleware = implode(', ', $route->middleware());
        }
        $model->save();
    }
}
