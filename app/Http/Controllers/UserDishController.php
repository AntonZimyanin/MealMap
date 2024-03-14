<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDish\StoreDishRequest;
use App\Http\Requests\UserDish\UpdateDishRequest;
use App\Models\UserDishes;

use App\Http\Resources\UserDish\UserDishResource;


class UserDishController extends Controller
{

    public function index() { 
        $userDishes = UserDishes::all();
        return UserDishResource::collection($userDishes); 
    }


    public function store(StoreDishRequest $request)
    {
        $data = $request->validated();

        echo $data;

        $post = UserDishes::create($data);

        return UserDishResource::make($post);   
        // UserDishes::create([ 
        //     'user_id'=> $request->user_id,  
        //     'title' => $request->input('title'),
        //     'price' => $request->input('price'),    
        //     'description' => $request->input('description'),    
        //     'image' => $request->input('image'),
        // ]);
    }


    public function update(UpdateDishRequest $request, UserDishes $userDish)
    {
        $data = $request->validated();
        $post = $userDish::update($data);
        
        return UserDishResource::make($post);
    }
}
