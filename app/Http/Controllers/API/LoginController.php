<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Model\UserController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $jsonData = $request->json()->all();
        $login = $jsonData["login"];
        if(isset($jsonData["password"])) // Soit on a un password, sinon, on cherche l'API TOKEN de l'user
        {
            $password = $jsonData['password'];
            $dbResponse = (new UserController())->login($login,$password);
            if($dbResponse != null)
            {
                return response()->json(["user" => $dbResponse, "message" => "Success"],200);
            }
            else
            {
                return response()->json(["message" => "Internal Error"],403);
            }
        }
        /*elseif(isset($jsonData["apiToken"]))
        {
            $apiToken = $jsonData['apiToken'];
            $dbResponse = (new UserController())->findAPIToken($login,$apiToken);
        }*/
        else
        {
            return response()->json(["message" => "Il semblerait que vous n'ayez pas les droits pour effectuer l'action"],403);
        }
    }

    public function test(Request $request)
    {

    }
}
