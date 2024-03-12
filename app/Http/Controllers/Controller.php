<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @SWG\Tag(
 *   name="BaseController",
 *   description="Operations about base controller"
 * )
 */


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
