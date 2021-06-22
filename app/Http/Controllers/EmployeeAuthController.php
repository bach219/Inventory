<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\LoginEmployeeRequest;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class EmployeeAuthController extends Controller
{
      
 /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('JWT', ['except' => ['login']]);
        Auth::shouldUse('employees');
    }

    // 

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginEmployeeRequest $request)
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('employees')->attempt($credentials)) {
            return response()->json(['error' => 'Địa chỉ Email hoặc Mật khẩu chưa đúng'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth('employees')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('employees')->logout();

        return response()->json(['message' => 'Đăng xuất thành công']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('employees')->refresh());
    }



    // public function signup(Request $request){
     
    //  $validateData = $request->validate([
    //    'email' => 'required|unique:users|max:255',
    //    'name' => 'required',
    //    'password' => 'required|min:6|confirmed'

    //  ]);

    //  $data = array();
    //  $data['name'] = $request->name;
    //  $data['email'] = $request->email;
    //  $data['password'] = Hash::make($request->password);
    //  DB::table('users')->insert($data);

    //  return $this->login($request);



    // }




    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('employees')->factory()->getTTL() * 60,
            'name' => auth('employees')->user()->name,
            'user_id' => auth('employees')->user()->id,
            'email' => auth('employees')->user()->email,
        ]);
    }

}
