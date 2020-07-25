<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\PayPal\PayPalClient;
use App\Providers\RouteServiceProvider;
use App\User;
use Exception;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\Exceptions\IncompletePayment;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function register(Request $request)
    {
        $validation = $this->validator($request->only(['name', 'email', 'password', 'password_confirmation']))->validate();

        // clearout email validation commented for now
        // $emailValidation = $this->validateEmail($request->email);
        // if ($emailValidation->getOriginalContent()['status'] == "invalid") {
        //     return response()->json(['errors' => ['email' => ["L'email est invalid"]]]);
        // }

        // if ($validation->fails()) {
        //     return response()->json(['errors' => $validation->errors()]);
        // }

        event(new Registered($user = $this->create($request->only(['name', 'email', 'password']))));

        return redirect()->route('home')->with(['email' => $user->email, 'intent' => $user->createSetupIntent()->client_secret]);

        // DB::beginTransaction();


        // if ($request->payment_method == "paypal") {
        //     try {
        //         $user->payment_method = "paypal";
        //         $user->payment_confirmed = false;
        //         $user->save();
        //     } catch (Exception $ex) {
        //         DB::rollback();
        //         return response()->json(['error' => $ex->getMessage()]);
        //     }
        // } else {
        //     try {
        //         $stripeCharge = $user->charge(100, $request->payment_method);

        //         $user->payment_method = "stripe";
        //         $user->payment_confirmed = true;
        //         $user->save();
        //     } catch (IncompletePayment $exception) {
        //         DB::rollback();

        //         //handle payment errors here
        //         return response()->json(['error' => $exception->getMessage()]);
        //     }
        // }

        // DB::commit();
        Auth::loginUsingId($user->id, true);
        if (Auth::check()) {
            return response()->json(['success' => true]);
        }
    }


    public function validateEmail(string $email)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.clearout.io/v2/email_verify/instant',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{"email": "' . $email . '"}',
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer:" . env('CLEAROUT_TOKEN')
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return response(['error' => $err]);
        } else {
            $response = json_decode($response, true);
            return response(['status' => $response['data']['status']]);
        }
        return;
    }

    public function showRegistrationForm()
    {
        return view('home');
    }
}
