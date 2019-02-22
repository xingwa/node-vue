<?php
/**
 * 回显
 * @return \Illuminate\Http\JsonResponse;
 */
use Illuminate\Support\Facades\Lang;

/**
 * 返回正常情况下（别名）
 * @param array $data
 * @param array $header
 * @return \Illuminate\Http\JsonResponse
 */
function display($data=['count'=>0,'body'=>[]],$header=[]){
   return show($data,$header);
}
/**
 * 返回正常的情况下
 * @param array $data
 * @param array $header
 * @return \Illuminate\Http\JsonResponse;
 */
function show($data=['count'=>0,'body'=>[]],$header=[]){
   $resonse =  response()->json(
        ['code'=>200,
        'status'=>'success',
            'message'=> Lang::get('messages.success'),
            'data'=>$data
         ]);
   
   if($header && is_array($header) &&  count($header)>0){
       foreach ($header as $key=>$val){
           $resonse->header($key, $val);
       }
   }elseif($header && is_string($header)){
       $resonse->header('Authorization', 'Bearer '.$header);
   }
   return $resonse;
}
/**
 * 方法找不到的情况下
 * @param string $message
 * @param array $data
 * @param string $status
 * @param number $code
 * @return \Illuminate\Http\JsonResponse;
 */
function display404($message='',$data=['count'=>0,'body'=>[]], $status='notfound', $code=404){
    return response()->json(
        ['code'=>$code,
            'status'=>$status,
            'message'=>$message ? $message : Lang::get('messages.notfound'),
            'data'=>$data
        ],$code);
}
/**
 * 内部服务器错误情况下
 * @param string $message
 * @param number $code
 * @param array $data
 * @param string $status
 * @return \Illuminate\Http\JsonResponse;
 */
function display500($message='', $code=500, $data=['count'=>0,'body'=>[]], $status='failure'){
    return response()->json(
        ['code'=>$code,
            'status'=>$status,
            'message'=>$message ? $message : Lang::get('messages.failure'),
            'data'=>$data
        ],$code);
}

/**
 * 未认证的情况下
 * @param string $message
 * @param number $code
 * @param array $data
 * @param string $status
 * @return \Illuminate\Http\JsonResponse;
 */
function unauthorized($message='', $code=401, $data=['count'=>0,'body'=>[]], $status='unauthorized'){
    return response()->json(
        ['code'=>$code,
            'status'=>$status,
            'message'=>$message ? $message : Lang::get('messages.token_invalid'),
            'data'=>$data
        ],$code);
}
