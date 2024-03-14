<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Get(
 *     path="/user-dish",
 *     summary="Get all user dishes",
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(ref="#/components/schemas/UserDishResource")
 *     )
 * ),
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
 * ),
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

    //
}
