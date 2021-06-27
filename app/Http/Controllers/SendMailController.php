<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ForgetRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Mail;
use App\Mail\SendMail;

class SendMailController extends Controller
{
    public function sendEmail(ForgetRequest $request)
    {
        $email = $request->email;
        $id = DB::table('users')->where('email', $email)->count();
        if($id > 0){

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $pass = '';
            for ($i = 0; $i < 6; $i++) {
                $pass .= $characters[rand(0, $charactersLength - 1)];
            }
            $new['password'] = Hash::make($pass);
            User::where('email', $email)->update($new);

            $data = [
                'password' => $pass
            ];
            Mail::to($email)->send(new SendMail($data));

            return response()->json(['message' => $pass]);
        }
        else
            return response()->json(['error' => 'Địa chỉ Email không tồn tại'], 401);
    }

}
