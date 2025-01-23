<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class RegisterForm extends Component
{
    public $firstname = '';
    public $lastname = '';
    public $patronymic = '';
    public $login = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $agree = false;

    protected function rules()
    {
        return [
            'firstname' => ['required', 'string', 'min:2', 'regex:/^[А-Яа-яЁё\s-]+$/u'],
            'lastname' => ['required', 'string', 'min:2', 'regex:/^[А-Яа-яЁё\s-]+$/u'],
            'patronymic' => ['nullable', 'string', 'min:2', 'regex:/^[А-Яа-яЁё\s-]+$/u'],
            'login' => ['required', 'string', 'min:3', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
            'agree' => ['accepted']
        ];
    }

    protected $messages = [
        'firstname.required' => 'Поле Имя обязательно для заполнения',
        'firstname.regex' => 'Имя должно содержать только кириллицу',
        'lastname.required' => 'Поле Фамилия обязательно для заполнения',
        'lastname.regex' => 'Фамилия должна содержать только кириллицу',
        'patronymic.regex' => 'Отчество должно содержать только кириллицу',
        'login.required' => 'Поле Логин обязательно для заполнения',
        'login.unique' => 'Такой логин уже занят',
        'email.required' => 'Поле E-mail обязательно для заполнения',
        'email.email' => 'Введите корректный E-mail адрес',
        'email.unique' => 'Такой E-mail уже зарегистрирован',
        'password.required' => 'Поле Пароль обязательно для заполнения',
        'password.min' => 'Пароль должен содержать минимум 8 символов',
        'password.confirmed' => 'Пароли не совпадают',
        'agree.accepted' => 'Необходимо принять условия использования'
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        $validatedData = $this->validate();

        $user = User::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'patronymic' => $validatedData['patronymic'],
            'login' => $validatedData['login'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user',
            'agree' => true
        ]);

        auth()->login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.register-form');
    }
}
