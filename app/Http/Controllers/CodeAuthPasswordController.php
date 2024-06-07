<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSendPasswordEmail;
use App\Mail\AutenticationMessageEmail;
use App\Models\AntiSpan;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CodeAuthPasswordController extends Controller
{
    private $userController;
    public function __construct(UserController $userController ) {
        $this->userController=$userController;
    }
    public function sendPassword(Request $request) {




        $email= $request->email;
        $user =User::where('email',$email);

        if ($user->count() > 0) {
            //Genero el codigo
            $codigo= $this->codigoAleatorio();
            //Actualizo el password
            $this->userController->updatePasswordCode($user,$codigo);
            //Envio el email.
            $this->enviarEmail($email, $codigo );
            //Deberia de crear al variable de sesion para controlar el correo electronico
            session(['email_autenticacion' => $email]);
            //Devuelvo la vista
            return view('auth.passwordCode', ['email' => $email ]);
        }else {
            return redirect()->route('login');
        }
    }
    public function autenticationCode(Request $request){

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $model = AntiSpan::where('ip',request()->ip())->first();
           // dd($model==true ? true:false );
            if ($model) {
                $model->delete();
            }

            return redirect()->intended('home');
        }
        return redirect()->route('login');

    }







    private function enviarEmail(string $email,int $numero ):void {
         ProcessSendPasswordEmail::dispatchSync($numero,$email);

    }
    private function codigoAleatorio():int {
        //alimentamos el generador de aleatorios
        mt_srand(time());
        //generamos un número aleatorio
       return mt_rand(1000,9999);
    }





}
