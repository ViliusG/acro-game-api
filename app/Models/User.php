<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

/**
 * @OA\Schema(
 *   schema="UserSchema",
 *   title="User Model",
 *   description="User",
 *   @OA\Property(
 *     property="id",
 *     description="ID of the user",
 *     @OA\Schema(
 *          type="string",
 *          example="User Name")
 *  ),
 *   @OA\Property(
 *     property="name",
 *     description="Name of the user",
 *     @OA\Schema(
 *          type="string",
 *          example="User Name")
 *  ),
 *   @OA\Property(
 *     property="email",
 *     description="Email of the user",
 *     @OA\Schema(
 *          type="string",
 *          example="acro@player.com")
 *  ),
 *   @OA\Property(
 *     property="password",
 *     description="Password of the user (it is hashed, so it's not visible in the database",
 *     @OA\Schema(
 *          type="string",
 *          example="$2y$10$ITck4VTSPdwrely7qGjGn.00rrgLpEpfkbLE.k784vRTtzbts1Dey")
 *  ),
 *   @OA\Property(
 *     property="token",
 *     description="User token used to authorize access for specific endpoints",
 *     @OA\Schema(
 *          type="string",
 *          example="h1bQsMqMsZnEg5qDs4ozCpnbYVsa00XhmIlo")
 *  ),
 *   @OA\Property(
 *     property="token_expiry",
 *     description="Since tokens don't last forever, this date indicates when user's token is not valid anymre (user has to relogin)",
 *     @OA\Schema(
 *          type="string",
 *          example="2020-11-10")
 *  )
 * )
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'token', 'token_expiry', 'role'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
