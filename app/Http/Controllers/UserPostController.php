<?php

namespace App\Http\Controllers;

use App\Features\UserPostIndexFeature;
use Lucid\Units\Controller;

class UserPostController extends Controller
{
    /**
     * @return mixed
     */
    public function index(){
        return $this->serve(UserPostIndexFeature::class);
    }
}
