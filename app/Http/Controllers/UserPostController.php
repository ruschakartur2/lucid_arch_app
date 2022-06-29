<?php

namespace App\Http\Controllers;

use App\Features\UserPostIndexFeature;
use Lucid\Units\Controller;

class UserPostController extends Controller
{
    public function index(){
        return $this->serve(UserPostIndexFeature::class);
    }
}
