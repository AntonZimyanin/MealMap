<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserDish\StoreDishRequest;
use App\Http\Requests\UserDish\UpdateDishRequest;
use App\Models\UserDishes;

use App\Http\Resources\UserDish\UserDishResource;

/**
 * @OA\Get(
 *     path="/user-dish",
 *     summary="Get all user dishes",
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(ref="#/components/schemas/UserDishResource")
 *     )
 * )
 */
public function index() { 
    $userDishes = UserDishes::all();
    return UserDishResource::collection($userDishes); 
}

/**
 * @OA\Post(
 *     path="/user-dish/store",
 *     summary="Store a new user dish",
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(
 *                 @OA\Property(
 *                     property="user_id",
 *                     type="integer"
 *                 ),
 *                 @OA\Property(
 *                     property="title",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="price",
 *                     type="number"
 *                 ),
 *                 @OA\Property(
 *                     property="description",
 *                     type="string"
 *                 ),
 *                 @OA\Property(
 *                     property="image",
 *                     type="string"
 *                 ),
 *                 example={"user_id": 123, "title": "Test Title", "price": 99.99, "description": "This is a test description.", "image": "test_image.jpg"}
 *             )
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(ref="#/components/schemas/UserDishResource")
 *     )
 * )
 * @OA\Put(
 *     path="/user-dish/{id}",
 *     summary="Update a user dish",
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\RequestBody(
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/UpdateDishRequest")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(ref="#/components/schemas/UserDishResource")
 *     )
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
