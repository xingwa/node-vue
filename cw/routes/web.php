<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//用户登录
$router->group(['prefix' => getenv('API_VERSION')], function() use ($router) {
    $router->get('login', ['as'=>'home','uses'=>'UserController@login']);
});

//登录后获取的接口
$router->group(['prefix' =>getenv('API_VERSION'), 'middleware' => 'jwt'], function() use ($router) {
    $router->get('user', 'UserController@userinfo');
    $router->get('logout', 'UserController@logout');
    $router->get('refresh-token', 'UserController@refreshToken');
});
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
// //首页路由
// $router->get('/', function () use ($router) { return redirect()->route('errors');});
// //错误信息
// $router->get('/errors',['as'=>'errors', 'uses'=> 'UserErrorsController@index']);


//     $router->get('/',function() use ($router){return redirect()->route('errors');});


    // //     Redis::lpush("tutorial-list", "Redis");
    // //     // 获取存储的数据并输出
    // //     $arList = Redis::lrange("tutorial-list", 0 ,5);
    // //     echo "Stored string in redis";
    // //     return($arList);
    // //     Redis::setex('site_name', 10, 'Lumen的redis');
    // //     return Redis::get('site_name');
    
    
    //     DB::connection()->enableQueryLog();
    //     $count = DB::table('department')->where('id','>=', '1001')->count();
    
    //     print_r(DB::getQueryLog()) ;
    //     print_r($count);
    //     $results = DB::select('select * from cw_department where id >= ?', [1001]);
    //     return show();
    //     $array = ['name' => 'Joe', 'age' => 27, 'votes' => 1];
    //     $array = array_only($array, ['name', 'votes']);
    
    //     return $array;
    //    // return $router->app->version();
