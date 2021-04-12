<?php
namespace App\Http\Middleware;
use Closure;
class localization
{
  /**
  * Handle an incoming request.
  *
  * @param \Illuminate\Http\Request $request
  * @param \Closure $next
  * @return mixed
  */
  public function handle($request, Closure $next)
  {

    if($request->lang){
      $local=$request->lang;
    }else{
      $local='en';
    }
    //echo $local;
    //die;
    //print_r($input);
    // Check header request and determine localizaton
    //$request->X-localization
    // $local = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'ar';
    //$local = ($input['lang']) ? $input['lang'] : 'ar';
     // set laravel localization
     app()->setLocale($local);
    // continue request
    return $next($request);
  }
}