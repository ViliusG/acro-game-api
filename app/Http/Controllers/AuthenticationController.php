<?php

namespace App\Http\Controllers;

use App\Constants\AuthenticationToken;
use App\Http\Requests\Authentication\LoginRequest;
use App\Http\Requests\Authentication\RegisterRequest;
use App\Models\User;
use App\Transformers\UserTransformer;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// We can define the request parameter inside the Requests or here

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

    /**
     * @OA\Post(
     *   path="/login",
     *   summary="Logs in the user, returns api token on success",
     *   tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/LoginRequest"),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login",
     *         @OA\JsonContent(ref="#/components/schemas/LoginResponse")
     *     )
     * )
     * @param LoginRequest $request
     * @return JsonResponse|string
     */
    public function login(LoginRequest $request)
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

    /**
     * @OA\Post(
     *   path="/register",
     *   summary="Registration. Returns user info",
     *   tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/RegisterRequest"),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Register",
     *         @OA\JsonContent(ref="#/components/schemas/RegisterResponse")
     *     )
     * )
     * @param RegisterRequest $request
     * @return JsonResponse|string
     */
    public function register(RegisterRequest $request)
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
