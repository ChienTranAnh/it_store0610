<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class UserController extends Controller
{
    /**
     * login
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        // check user was logged in?
        $bearerToken = $request->bearerToken();
        if ($bearerToken !== 'null') {
            $token = explode('|', $bearerToken)[1];
            $checkToken = PersonalAccessToken::findToken($token);
            if ($checkToken) {
                return response()->json([
                    'success' => false,
                    'message' => 'You were logged in!',
                    'code' => JsonResponse::HTTP_CONFLICT,
                    'user' => User::where('id', $checkToken->tokenable_id)->first(),
                    'token' => $bearerToken,
                    'token_type' => 'Bearer',
                ], JsonResponse::HTTP_CONFLICT);
            }
        }

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('username', $request->username)->first();
        if (!$user) {
            return $this->notFound('User Not Found!');
        }
        if (!Hash::check($request->password, $user->password)) {
            return $this->failed('Password is incorrect!', JsonResponse::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'code' => JsonResponse::HTTP_OK,
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
        ], JsonResponse::HTTP_OK);
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        return $this->success(User::all());
    }

    /**
     * Display current user
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getUser(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return $this->notFound('User not found');
        }

        return $this->success($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'tel' => $request->telephone,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('api_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'message' => 'User created successfully!',
            'code' => JsonResponse::HTTP_OK,
            'data' => $user,
            'token' => $token,
            'token_type' => 'Bearer',
        ], JsonResponse::HTTP_CREATED);
    }

    /**
     * Display user was chosen
     *
     * @param User $user
     * @return JsonResponse
     */
    public function showUserDetail($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return $this->notFound('User not found');
        }

        return $this->success($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return $this->notFound('User not found');
        }

        if (!$user->delete()) {
            return $this->failed('Unable to delete user.');
        }

        return $this->success($user, 'User deleted successfully');
    }

    public function destroyPermanently($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return $this->notFound('User not found');
        }

        if (!$user->forceDelete()) {
            return $this->failed('Unable to delete user.');
        }

        return $this->success($user, 'User deleted successfully');
    }

    /**
     * logout
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return $this->success(null, 'Logout success!');
    }
}
