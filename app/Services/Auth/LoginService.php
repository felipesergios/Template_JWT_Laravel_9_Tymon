<?php

namespace App\Services\Auth;

use DateTime;
use Illuminate\Support\Facades\Auth;

class LoginService
{
    public function execute(array $credentials)
    {
       $token = Auth::attempt($credentials);
       if(!$token)
       {
        throw new \Exception($message="Not Authorized",$code=401);
       }
       return [
        'access_token'=>$token,
        'type'=>'Bearer',
        'user'=>Auth::user()
       ];
    }
}

?>