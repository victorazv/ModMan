<?php

namespace Modman\Api\V1\Controllers\Auth;

use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Modman\Api\V1\Controllers\ApiController;

class AuthController extends ApiController{

    /**
     * @param Request $request
     * @return mixed
     */
    public function authenticate(Request $request)
    {

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['INVALID_CREDENTIALS'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['INVALID_CREDENTIALS'], $e->getStatusCode());
        }

        $user = JWTAuth::toUser($token);

        $user = [
            'name' => $user->name,
            'email' => $user->email,
        ];

        return $this->respond(compact('token', 'user'));
    }

}