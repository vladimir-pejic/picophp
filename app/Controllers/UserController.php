<?php

namespace App\Controllers;

use PicoPHP\Classes\Controller;
use App\Models\UserModel;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller {
    public function show(Request $request, $id) {
        $user = UserModel::find($id);
        if (!$user) {
            return $this->response(['error' => 'User not found'], 404);
        }
        return $this->response($user);
    }
}
