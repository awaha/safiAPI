<?php

namespace App\Http\Controllers\Model;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Models;
use App\User;

class ModelController extends Controller
{
    /**
     * ModelsController donne accès à deux méthodes de Model
     * ça prend la classe du model et autorise l'utilisation de {Model}::getAll() et {Model}::query()
     * sans les définir
     */

    /**
     * @return string|string[]
     * Méthode spéciale pour récupérer le model du controller, c'est pour ça qu'on nomme le controller avec le même mot que pour le model
     * au début, sinon, ça ne marcherait pas
     */
    protected function getModelClassName()
    {
        $myModelClass =  str_replace('Controller','',static::class); //je retire "Controller" pour obtenir le nom de la classe
        $myModelClass = explode("\\", $myModelClass); // pour ne pas avoir le namespace
        $classname = end($myModelClass); // je récupère que le bout
        if($classname != "Userss") //traitement d'un bug qui ne récupère pas correctement le model User
        {
            return $classname;
        }
        else
        {
            return "User";
        }
        //For an unknown reason, the model "User" returns "Userss" even if i know that he's supposed to return "Users"
        // Because of "User's'Controller, he shouldn't be able to return a double S
    }

    /**
     * @return mixed|Collection //Model[]|Collection
     * Utilise la fonction Model::all() pour le model courant
     */
    public function getAll()
    {
        if(self::getModelClassName() != 'Userss' && self::getModelClassName() != 'User')
        {
            return call_user_func("App\\Models\\".self::getModelClassName()."::all");
        }
        else
        {
            return call_user_func("App\\User::all");
        }
    }

    /**
     * @return Builder //Model[]|Collection
     * Utilise la fonction Model::query() pour le model courant
     */
    public function query()
    {
        if(self::getModelClassName() != 'Userss' && self::getModelClassName() != 'User')
        {
            return call_user_func("App\\Models\\".self::getModelClassName()."::query");
        }
        else
        {
            return call_user_func("App\\User::query");
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getOneById($id)
    {
        return $this->query()->select()->where("id","=","$id")->get()->first();
    }

}
