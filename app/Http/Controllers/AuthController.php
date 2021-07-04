<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\ResetRequest;

class AuthController extends Controller
{
    
 /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['login','signup']]);
        Auth::shouldUse('api');
    }

    // 

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        //  $validateData = $request->validate([
        //  'email' => 'required',
        //  'password' => 'required',
         
        //  ]);



        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Địa chỉ Email hoặc mật khẩu không đúng'], 401);
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
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Đăng xuất thành công']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }



    public function signup(SignUpRequest $request){

        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        DB::table('users')->insert($data);

        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Xảy ra lỗi khi đăng ký tài khoản'], 401);
        }

        return $this->respondWithToken($token);

    }




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
            'expires_in' => auth()->factory()->getTTL() * 60,
            'name' => auth()->user()->name,
            'user_id' => auth()->user()->id,
            'email' => auth()->user()->email,
        ]);
    }


    public function profile(ProfileRequest $request)
    {
        $data = array();
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        // $check = DB::table('users')->where('id',auth()->user()->id)->update($data);
        $data['photo'] = null;
        $image = $request->photo;

         if ($image) {
            $position = strpos($image, ';');
            $sub = substr($image, 0, $position);
            $ext = explode('/', $sub)[1];

            $name = time().".".$ext;
            $img = Image::make($image)->resize(240,200);
            $upload_path = 'backend/employee/';
            $image_url = $upload_path.$name;
            $success = $img->save($image_url);
            
            if ($success) {
               $data['photo'] = $image_url;
               $img = DB::table('users')->where('id',auth()->user()->id)->first();
               $image_path = $img->photo;
               $done = unlink($image_path);
               $user  = DB::table('users')->where('id',auth()->user()->id)->update($data);
            }
            
         }else{
               $oldphoto = $request->photo;
               $data['photo'] = $oldphoto;
               $user = DB::table('users')->where('id',auth()->user()->id)->update($data);
         }

        return response()->json( DB::table('users')->where('id',auth()->user()->id)->get());

    }
    public function reset(ResetRequest $request )
    {
        $data = array();
        $data['password'] = Hash::make($request->passwordnew);

        if(Hash::check($request->passwordnow, auth()->user()->password)) {   
            DB::table('users')->where('id',auth()->user()->id)->update($data);
            return response()->json(['message'=>'Thay đổi mật khẩu thành công']);

        } else {
            return response()->json(['error' => 'Mật khẩu hiện tại sai'], 401);
        }
    }

    



}
 