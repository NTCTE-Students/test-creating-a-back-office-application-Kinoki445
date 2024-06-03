<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionsController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'user.name' => 'required',
            'user.email' => 'required|email|unique:users,email',
            'user.password' => 'required|min:8|alpha_dash|confirmed',
        ], [
            'user.name.required' => 'Поле "Имя" обязательно для заполнения',
            'user.email.reqired' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email'=> 'Поле "Электронная почта" должно быть предоставлено в виде валидного адреса электронной почты',
            'user.password.required'=> 'Поле "Пароль" обязательно для заполнения',
            'user.password.min'=> 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.alpha_dash'=> 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
            'user.password.confirmed'=> 'Поле "Пароль" и "Повторите пароль" не совпадает',
        ]);

        $user = User::create($request -> input('user'));
        Auth::login($user);
        return redirect('/');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user.email'=> 'required|email',
            'user.password'=> 'required|min:8|alpha_dash',
        ], [
            'user.email.reqired' => 'Поле "Электронная почта" обязательно для заполнения',
            'user.email.email'=> 'Поле "Электронная почта" должно быть предоставлено в виде валидного адреса электронной почты',
            'user.password.required'=> 'Поле "Пароль" обязательно для заполнения',
            'user.password.min'=> 'Поле "Пароль" должно быть не менее, чем 8 символов',
            'user.password.alpha_dash'=> 'Поле "Пароль" должно содержать только строчные и прописные символы латиницы, цифры, а также символы "-" и "_"',
        ]);
        if(Auth::attempt($request -> input('user'))) {
            return redirect('/');
        } else {
            return back() -> withErrors([
                'user.email' => 'Предоставленная почта или пароль не подходят'
            ]);
        }
    }
    
    public function create_item(Request $request)
    {
        $request ->validate([
            'item.title'=> 'required',
            'item.price'=> 'required',
        ], [
            'item.title.required' => 'Поле "Заголовок" не может быть пустым',
            'item.price.required' => 'Поле "Текст" не может быть пустым',
        ]);

        Items::create( array_merge($request -> input('item'), ['user_id' => Auth::id()]));
        return redirect('/');
    }

}
