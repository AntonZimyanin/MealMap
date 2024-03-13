<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDish\StoreDishRequest;
use App\Http\Requests\UserDish\UpdateDishRequest;
use App\Models\UserDishes;
use Illuminate\Http\Request;

use App\Http\Resources\UserDish\UserDishResource;

/**
 * @SWG\Post(
 *     path="/user-dishes",
 *     summary="Create a new user dish",
 *     tags={"UserDishes"},
 *     @SWG\Parameter(
 *         name="user_id",
 *         in="formData",
 *         description="The ID of the user",
 *         required=true,
 *         type="integer"
 *     ),
 *     @SWG\Parameter(
 *         name="title",
 *         in="formData",
 *         description="The title of the dish",
 *         required=true,
 *         type="string"
 *     ),
 *     @SWG\Parameter(
 *         name="price",
 *         in="formData",
 *         description="The price of the dish",
 *         required=true,
 *         type="number"
 *     ),
 *     @SWG\Parameter(
 *         name="description",
 *         in="formData",
 *         description="The description of the dish",
 *         required=true,
 *         type="string"
 *     ),
 *     @SWG\Parameter(
 *         name="image",
 *         in="formData",
 *         description="The image of the dish",
 *         required=true,
 *         type="string"
 *     ),
 *     @SWG\Response(response=200, description="Successful operation"),
 *     @SWG\Response(response=400, description="Invalid request")
 * )
 */

class UserDishController extends Controller
{

    public function index() { 
        $userDishes = UserDishes::all();
        return UserDishResource::collection($userDishes); 
    }


    public function store(StoreDishRequest $request)
    {
        $data = $request->validated();
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
