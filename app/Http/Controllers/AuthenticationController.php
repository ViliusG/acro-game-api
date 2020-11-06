<?php

namespace App\Http\Controllers;

use App\Constants\AuthenticationToken;
use App\Http\Requests\AuthenticationRequest;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthenticationController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function login(AuthenticationRequest $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        if (Hash::check($request->password, $user->password)) {
            $token = $this->createToken();
            $user->token = $token;
            $user->token_expiry = $this->tokenExpiryDate();
            $user->save();

            return $token;
        }

        return new JsonResponse('Incorrect Password', JsonResponse::HTTP_UNAUTHORIZED);
    }

    public function register(RegistrationRequest $request)
    {
        $data = $request->toArray();
        $data['password'] = Hash::make($request->password);
        $data['token'] = $this->createToken();
        $data['token_expiry'] = $this->tokenExpiryDate();

        return $this->item(User::create($data), new UserTransformer);
    }

    private function createToken():string
    {
        return Str::random(AuthenticationToken::LENGTH);
    }

    public function tokenExpiryDate():string
    {
        return Carbon::now()->addWeek()->toDateString();
    }
}
