<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * login
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        if (Auth::guard('sanctum')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'You were logged in!',
                'code' => JsonResponse::HTTP_CONFLICT,
                'user' => Auth::guard('sanctum')->user(),
                'token' => $request->bearerToken(),
                'token_type' => 'Bearer',
            ], JsonResponse::HTTP_CONFLICT);
        }

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $result = $this->userService->login($request->username, $request->password);
        if ($result && $result['error']) {
            if ($result['type'] === 'username') {
                return $this->notFound('User Not Found!');
            }

            return $this->failed('Password is incorrect!', JsonResponse::HTTP_UNAUTHORIZED);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'code' => JsonResponse::HTTP_OK,
            'user' => $result['user'],
            'token' => $result['token'],
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
        try {
            $users = $this->userService->allUsers();
            if (!$users) {
                return $this->success([], 'Don\'t any Users!');
            }

            return $this->success($users->toArray());
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
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
        try {
            $user = $this->userService->userDetail($id);
            if (!$user) {
                return $this->notFound('User not found');
            }

            return $this->success($user);
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
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
        try {
            $user = $this->userService->userDetail($id);
            if (!$user) {
                return $this->notFound('User not found');
            }

            if (!$user->delete()) {
                return $this->failed('Unable to delete user.');
            }

            return $this->success($user, 'User deleted successfully');
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
    }

    public function destroyPermanently($id)
    {
        try {
            $user = $this->userService->userDetail($id);
            if (!$user) {
                return $this->notFound('User not found');
            }

            if (!$user->forceDelete()) {
                return $this->failed('Unable to delete user.');
            }

            return $this->success($user, 'User deleted successfully');
        } catch (\PDOException $pdoException) {
            return $this->failed($pdoException->getMessage());
        } catch (\Exception $e) {
            return $this->failed($e->getMessage());
        }
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
