<?php

namespace App\Http\Controllers\Model;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends ModelController
{
    /**
     * @param $login
     * @param $apiToken
     * @return mixed
     */
    public function findAPIToken($login,$apiToken)
    {
        return $this->getAll()->where("apiToken","=",$apiToken)->where("login","=",$login)->first();
    }

    /**
     * @param $login
     * @param $password
     * @return mixed
     */
    public function login($login,$password)
    {
        $queryResult = $this->query()->select()->where("login","=",$login)->get()->first();
        if(Hash::check($password,$queryResult->password ?? ''))
        {
            return $queryResult;
        }
        else
        {
            return null;
        }
    }
}
