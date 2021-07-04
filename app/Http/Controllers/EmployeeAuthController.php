<?php

namespace App\Http\Controllers;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Http\Requests\LoginEmployeeRequest;
use Illuminate\Support\Facades\Auth;
use JWTAuth;
use App\Http\Requests\EmployeeRequest;
use DB;
use Illuminate\Support\Facades\Hash;
use Neo\PusherLogger\PusherLogger;

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
        // $credentials = ['email' => $request->email, 'password' => '654321'];
        $credentials = request(['email', 'password']);
        $count = DB::table('employees')->where('email',$request->email)->count();
        if($count == 0)
            return response()->json(['error' => 'Địa chỉ Email không tồn tại'], 301);
        if (! $token = auth('employees')->attempt($credentials)) {
            return response()->json(['error' => 'Mật khẩu chưa đúng'], 401);
        }
        // $dispatched = PusherLogger::log($request->email, $request->password)
        //     ->setChannel('log-channel')
        //     ->setEvent('log-event')
        //     ->setInterests(['log-interest'])
        //     ->send();
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
            'id' => auth('employees')->user()->id,
            'email' => auth('employees')->user()->email,
            'phone' => auth('employees')->user()->phone,
            'email' => auth('employees')->user()->email,
            'address' => auth('employees')->user()->address,
            'photo' => auth('employees')->user()->photo,
        ]);
    }

    public function update(Request $request)
    {
        $data = array();
        $data['email'] = $request->email;
        $count = DB::table('employees')->where('email',$request->email)->count();
        if($count != 0)
        {
            $count = DB::table('employees')->where([
                                                    ['email', '=', $request->email],
                                                    ['id', '=', auth('employees')->user()->id],
                                                ])->count();
            if($count == 1){
                // checkPass($request->passNow, $request->passNew, $request->passVerify, $data);
                if(!empty($request->passNow) || $request->passNow != ""){
                    if(Hash::check($request->passNow, auth('employees')->user()->password)) {  
                        if(strlen($request->passNew) >= 6){
                            if($request->passNew == $request->passVerify){
                                $data['password'] = Hash::make($request->passNew);
                                DB::table('employees')->where('id',auth('employees')->user()->id)->update($data);
                                return response()->json(auth('employees')->user());
                            } else 
                                return response()->json(['error' => 'Mật khẩu xác nhận sai'], 201);
                        } else 
                            return response()->json(['error' => 'Mật khẩu ít nhất 6 kí tự'], 202);

                    } else {
                        return response()->json(['error' => 'Mật khẩu hiện tại sai'], 203);
                    }
                }else {
                    DB::table('employees')->where('id',auth('employees')->user()->id)->update($data);
                    return response()->json(auth('employees')->user());
                }
            }else 
                return response()->json(['error' => 'Địa chỉ Email đã tồn tại'], 204);
        }
        else
            // checkPass($request->passNow, $request->passNew, $request->passVerify, $data);
            {
                if(!empty($request->passNow) || $request->passNow != ""){
                    if(Hash::check($request->passNow, auth('employees')->user()->password)) {  
                        if(strlen($request->passNew) >= 6){
                            if($request->passNew == $request->passVerify){
                                $data['password'] = Hash::make($request->passNew);
                                DB::table('employees')->where('id',auth('employees')->user()->id)->update($data);
                                return response()->json(auth('employees')->user());
                            } else 
                                return response()->json(['error' => 'Mật khẩu xác nhận sai'], 201);
                        } else 
                            return response()->json(['error' => 'Mật khẩu ít nhất 6 kí tự'], 202);

                    } else {
                        return response()->json(['error' => 'Mật khẩu hiện tại sai'], 203);
                    }
                }else {
                    DB::table('employees')->where('id',auth('employees')->user()->id)->update($data);
                    return response()->json(auth('employees')->user());
                }
            }
    }

    // public function checkPass($passNow, $passNew, $passVerify, $email)
    // {
    //     // return response()->json(['message'=>'ahihi']);
    //     $data = array();
    //     $data['email'] = $email;
    //     if(!empty($passNow) || $passNow != ""){
    //         if(Hash::check($passNow, auth('employees')->user()->password)) {  
    //             if(strlen($passNew) == 6){
    //                 if($passNew == $passVerify){
    //                     $data['password'] = Hash::make($passNew);
    //                     DB::table('employees')->where('id',auth('employees')->user()->id)->update($data);
    //                     return response()->json(['message'=>'Thay đổi mật khẩu thành công']);
    //                 } else 
    //                     return response()->json(['error' => 'Mật khẩu xác nhận sai'], 201);
    //             } else 
    //                 return response()->json(['error' => 'Mật khẩu ít nhất 6 kí tự'], 202);

    //         } else {
    //             return response()->json(['error' => 'Mật khẩu hiện tại sai'], 203);
    //         }
    //     }else {
    //         DB::table('employees')->where('id',auth('employees')->user()->id)->update($data);
    //         return response()->json(auth('employees')->user());
    //     }
    // }

    public function forgot(Request $request)
    {
        
    }
}
