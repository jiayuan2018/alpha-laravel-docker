<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {

        //$this->mapWebRoutes();

        //$this->mapApiRoutes();

        $this->mapMyRoutes();

    }

    /**
     * Define the "my" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapMyRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(function(){
                 require base_path('app/Routes/route.php');
                 $currentDomain = Config::get('domain');
                 $configRoute   = $this->getRouteConfigByDomain($currentDomain);
                 unset($currentDomain);
                 if(!empty($configRoute['path'])){
                     $domain = $configRoute['domain'];
                     require base_path('app/Routes/'.$configRoute['path']);
                 }
             });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('app/Routes/group/groupWeb.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('app/Routes/group/groupApi.php'));
    }


    /**
     * @param $domain
     * @return string
     */
    private function getRouteConfigByDomain($domain){

        $domainArray  = explode('.',$domain,2);
        $returnPath   = $returnDomain = '';
        switch($domainArray[0]){
            case 'www':
                $returnPath   = 'group/groupWeb.php';
                $returnDomain = env('APP_WEB_DOMAIN','');
                break;
            case 'admin':
                $returnPath   = 'group/groupAdmin.php';
                $returnDomain = env('APP_ADMIN_DOMAIN','');
                break;
            case 'api':
                $returnPath   = 'group/groupApi.php';
                $returnDomain = env('APP_API_DOMAIN','');
                break;
            case 'wap':
                $returnPath   = 'group/groupWap.php';
                $returnDomain = env('APP_DOMAIN','');
                break;
            case 'wx':
                $returnPath   = 'group/groupWap.php';
                $returnDomain = env('APP_DOMAIN','');
                break;
            case 'android':
                $returnPath   = 'group/groupApp.php';
                $returnDomain = env('APP_DOMAIN','');
                break;
            case 'ios':
                $returnPath   = 'group/groupApp.php';
                $returnDomain = env('APP_DOMAIN','');
                break;
            case 'app':
                $returnPath   = 'group/groupApp.php';
                $returnDomain = env('APP_DOMAIN','');
                break;
            default:
                $returnDomain = $domain;
        }

        return [
            'path'   => $returnPath,
            'domain' => $returnDomain
        ];
    }
}
