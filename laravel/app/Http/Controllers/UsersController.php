<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UserRequest;
use App\Http\Resources\User\UserCollectionResource;
use App\Http\Resources\User\UserResource;
use App\Models\AccessLink;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @param UserRequest $request
     * @return UserResource
     */
    public function create(UserRequest $request): UserResource
    {
        $user = User::where('phone', '=', $request->phone)->first();
        if (empty($user)) {
            $user = User::create([
                'phone' => $request->phone,
                'name' => $request->name,
            ]);
        }

        return new UserResource($user);
    }

    /**
     * @return UserCollectionResource
     */
    public function index(): UserCollectionResource
    {
        $users = User::paginate();

        return new UserCollectionResource($users);
    }

    /**
     * @param UpdateUserRequest $request
     * @return UserResource
     */
    public function update(UpdateUserRequest $request): UserResource
    {
        $accessLink = AccessLink::where('uuid', '=', $request->uuid)->first();
        $user = $accessLink->user;

        $user->is_active = (bool)$request->is_active;
        $user->save();

        return new UserResource($user);
    }

}
