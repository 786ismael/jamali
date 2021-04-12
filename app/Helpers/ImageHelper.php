<?php

namespace App\Helpers;

use Session;
use App;
use Carbon\Carbon;
//use Image;
use url;

class ImageHelper {
  public static $getProfileImagePath  = 'public/uploads/profiles/';
  public static $getSelfieImagePath = 'public/uploads/selfie_image/';
  public static $getDocumentImagePath = 'public/uploads/document/';
  public static $userPlaceholderImage = 'public/uploads/others/user_placeholder.png';
  public static $getCategoryImagePath  = 'public/uploads/category/';
  public static $getRegistrationCardPath  = 'public/uploads/registration_card/';
  public static $getPortfolioImagePath  = 'public/uploads/portfolio/';
  public static $serviceImagePath  = 'public/uploads/service_image/';
  public static $productImagePath  = 'public/uploads/product_image/';

  public static function getProfileImage($image){
    if($image){
      if(file_exists(STATIC::$getProfileImagePath.$image)){
        return url(STATIC::$getProfileImagePath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }

  public static function getProductImage($image){
    if($image){
      if(file_exists(STATIC::$productImagePath.$image)){
        return url(STATIC::$productImagePath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }

  public static function getServiceImage($image){
    if(!empty($image)){
      if(file_exists(STATIC::$serviceImagePath.$image)){
        return url(STATIC::$serviceImagePath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }

  public static function getSelfieImage($image){
    if($image){
      if(file_exists(STATIC::$getSelfieImagePath.$image)){
        return url(STATIC::$getSelfieImagePath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }

  public static function getCategoryImage($image){
    if($image){
      if(file_exists(STATIC::$getCategoryImagePath.$image)){
        return url(STATIC::$getCategoryImagePath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }

  
  public static function getDocumentImage($image){
    if($image){
      if(file_exists(STATIC::$getDocumentImagePath.$image)){
        return url(STATIC::$getDocumentImagePath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }

  public static function getRegistrationCardImage($image){
    if($image){
      if(file_exists(STATIC::$getRegistrationCardPath.$image)){
        return url(STATIC::$getRegistrationCardPath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }

  public static function getPortfolioImage($image){
    if($image){
      if(file_exists(STATIC::$getPortfolioImagePath.$image)){
        return url(STATIC::$getPortfolioImagePath.$image);
      }
    }
    return url(STATIC::$userPlaceholderImage);
  }
  

  public static function getPlaceholderImage(){
    return url('public/uploads/others/user_placeholder.png');
  }
  public static function getProductPlaceholderImage(){
    return url('public/uploads/others/placeholder.png');
  }
}
