<?php namespace App\Http\Controllers;

use App\Commands\SendCode;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmail;
use App\Models\User;
use Bus;
use Illuminate\Http\Request;
use Session;
use Validator;

class RegisterController extends Controller {

	public function showForm($what = 'email')
    {
        $code = '';
        for($i=0; $i<4; $i++) {
            $code.=rand(0,9);
        }
        Session::set('code',$code);
        return view('register.reg', ['what'=>$what]);
    }

    public function sendEmail(StoreEmail $request)
    {
        $user = User::where('email', $request->email)->first();
        if (is_null($user)) {
            $user = User::create($request->all());
        }
        Session::set('user_id', $user->id);
        $mailContent = [];
        $mailContent['code'] = Session::get('code');
        $mailContent['email'] = $request->email;
        Bus::dispatch(new SendCode($mailContent));
        return view('register.reg', ['what'=>'code']);
    }

    public function checkCode(Request $request)
    {
        $validationRules = [
            'code' => 'required|only_numbers_like_string|max:4|min:4'
        ];

        $v = Validator::make($request->all(), $validationRules);

        if ($v->fails())
        {
            $error = $v->errors()->get('code')[0];
            return redirect('fail/'.$error.'/code');
        }

        $currentCode = Session::get('code');

        if($currentCode == $request->code) {
            $user = User::find(Session::get('user_id'));
            if($user->name) {
                //return redirect('personal_area');
                return redirect()->action('RegisterController@account');
            } else {
                return view('register.reg', ['what'=>'name']);
            }
        } else {
            $error = 'Введен неверный код. Пожалуйста, прочтите письмо внимательнее.';
            return redirect('fail/'.$error.'/code');
        }

    }

    public function setUserName(Request $request)
    {
        $validationRules = [
            'name' => 'required|alpha|max:50'
        ];

        $v = Validator::make($request->all(), $validationRules);

        if ($v->fails())
        {
            $error = $v->errors()->get('name')[0];
            return redirect('fail/'.$error.'/name');
        }

        $user = User::find(Session::get('user_id'));
        $user->name = $request->name;
        $user->save();

        return redirect('personal_area');
    }

    public function account()
    {
        $user = User::find(Session::get('user_id'));
        return view('register.account',['user'=>$user]);
    }

    public function fail($error, $what)
    {
        return view('register.reg', ['what'=>$what])->withErrors([$what=>$error]);
    }

}
