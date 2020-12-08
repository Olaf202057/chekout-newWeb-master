<?php

namespace App\Http\Controllers;

use App\Repositories\Users\UsersFirebaseRepository;
use App\Repositories\Users\UsersRepositoryInterface;
use App\Repositories\Vendors\VendorsRepositoryInterface;
use App\Services\FirebaseAuthService;
use Illuminate\Http\Request;
use Kreait\Firebase\Exception\Auth\EmailExists;
use Laravel\Fortify\Rules\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request){
        $service = new FirebaseAuthService;
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ])->validate();

        return $service->logInWithEmailAndPassword($request->email, $request->password);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request, UsersRepositoryInterface $usersRepository){
        // Todo: when registering, create a regular user
        // Todo: Validate
        $request->phone = trim($request->phone);
        Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'confirmed'],
            'phone' => ['required', 'numeric', 'digits:10'],
            'name' => ['required']
        ])->validate();

        $userProperties = [
            'email' => $request->email,
            'emailVerified' => false,
            'phoneNumber' => '+1' . $request->phone,
            'password' => $request->password,
            'displayName' => $request->name,
            'photoUrl' => '',
            'disabled' => false,
        ];

        try{
            $user = $usersRepository->createAuthUser($userProperties);
        }catch(EmailExists $e){
            return redirect()->back()->withErrors(['That email already exists']);
        }

        session()->flash('type', 'success');
        session()->flash('message', 'Account created successfully. Please log in below.');
        return redirect(route('auth.login'));
    }

    public function logout(){
        $service = new FirebaseAuthService;
        return $service->logUserOut();
    }
}
