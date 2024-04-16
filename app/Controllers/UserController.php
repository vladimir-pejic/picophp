<?php

namespace App\Controllers;

use PicoPHP\Classes\Controller;
use App\Models\UserModel;

class UserController extends Controller {
    public function show($id)
    {
        $user = UserModel::find($id);
        return $this->response($user);
    }
}
