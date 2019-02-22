<?php

namespace App\Http\Controllers;
use Tymon\JWTAuth\JWTAuth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    protected $jwt;

    public function __construct(JWTAuth $jwt)
    {
        $this->jwt = $jwt;
    }
    
    public function login(Request $request)
    {
//         $data = app('captcha')->create();
//         print_r($data);

       echo  date('m'); exit;
        
     
//         $compressed   = gzdeflate('Compress me', 9);
//         $uncompressed = gzinflate($compressed);
//         echo $uncompressed;
        
     //   $data = gzdeflate(json_encode($array, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES), 6, ZLIB_ENCODING_DEFLATE);
        
          $compressed = "middle12312312312312312312312312312312312323123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123123456";
          $compressed= base64_encode(gzencode(urlencode($compressed)));
        
//         $compressed = base64_encode( gzdeflate('123123123123123123123123123123123123123123123123',6,ZLIB_ENCODING_DEFLATE));
//      //   echo 'gzcompress:'.strlen($compressed).','."<br />"; 
        
//        $compressed =  gzinflate(base64_decode($compressed),6);
        
        
//         throw new \ErrorException('dd');
//         $a = 0/0;

        $response['count'] = 1;
        $compressed= base64_encode(gzencode(json_encode(['id'=>$compressed])));
        
        $response['body'] = $compressed;
        return display($response, 'Header Value');
        
//         return response()->json(['id'=>100])
//         ->header('Content-Type', '11')
//         ->header('X-Header-One', 'Header Value')
//         ->header('X-Header-Two', 'Header Value');
        

        
//         //这里要检测以前是否有，如果有，要删除掉
//         //具体参考：https://laravelacademy.org/post/3640.html
//         try {
           
           
// //             $rules = [
// //                 'mobile'   => [
// //                     'required',
// //                     'exists:users',
// //                 ],
// //                 'password' => 'required|string|min:6|max:20',
// //             ];
// //             $params = $this->validate($request, $rules);
// //             print_r($params);exit;
            
            
//             $token = Auth::check();
           
            
//             $token = Auth::getToken();
//             print_r($token);
            
  
            
//             $params = $request->all();
//             Auth::clearResolvedInstances();
// //             echo md5(md5('12345678').'199956');exit;
//          //   Auth::invalidate(true);
//             DB::connection()->enableQueryLog(); // 开启查询日志
//             $arr=['username'=> 'xingwa2'];
//             $u = \App\User::where($arr)->first(['_rand']);
            
//           //  DB：raw('函数或者字段');
            
//            // DB:whereRaw('函数或者字段');
            
//            // DB:orderbyRaw('函数或者字段');
            
//                  //    例子：DB::raw('rand()')、DB::raw('date()')
            
//             $arr=['username'=> 'xingwa2','password'=> md5(md5('12345678').$u->_rand)];
  
// //          print_r($RES);exit;
//             $user = User::where($arr)->first();
//             $queries = DB::getQueryLog(); // 获取查询日志
//             // print_r($queries); // 即可查看执行的sql，传入的参数等等
            

          
//             if(!$user){
//                 echo 999;exit;
//             }
//             $token = Auth::login($user);
//             $response['id'] = strval($user->id);
//             $response['token'] = $token;
//             $response['expire']   = strval(time() + getenv('JWT_TTL') * 60);
//         } catch (Exception $e) {
//             print_r($e);
//             echo 11;exit;
//             print_r($e);
//         }
   
        
  
//         return show($response);
    
        
        
//         echo "原来比率<br />";
//         $str = '{.....}';
//         echo strlen($str).'<br />';
//         //压缩率居中
//         $compressed = gzcompress($str, 9);
//         echo 'gzcompress:'.strlen($compressed).','."<br />"; //gzuncompress($compressed)
        
        
//         //压缩率并列最高
//         $compressed = gzdeflate($str, 9);
//         echo 'gzdeflate:'.strlen($compressed).','."<br />"; //gzinflate($compressed)
        
//         $bzstr = bzcompress($str, 9);
//         echo 'bzcompress:'.strlen($bzstr).','."<br />"; //bzdecompress($bzstr)
        
        
        
        
        
        
        
    }
    
    public function userinfo(Request $request)
    {
//      return response()->json(compact('user'));
        print_r(Auth::user()->getUserInfo()) ;
        return 123;
    }
    
    /**
     * 用户登出
     *
     * @author AdamTyn
     *
     * @return \Illuminate\Http\Response;
     */
    public function logout()
    {
        $response = array('code' => '0');
        Auth::invalidate(true);
        return response()->json($response);
      
    }
    
    public function refreshToken()
    {
        
        $response = array('code' => '0');
        if (!$token = Auth::refresh(true, true)) {
            $response['code']     = '5000';
            $response['message'] = '无法生成令牌';
        } else {
            $response['token'] = $token;
            $response['expire']   = strval(time() + 86400);
        }
        return response()->json($response);
    }
    
}
