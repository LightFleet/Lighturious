@extends('layouts.app')

@section('content')
    <form method="post" action="/api/login" class="mx-auto mt-28 max-w-sm bg-white flex flex-col">
        @csrf
        <div class="mb-4">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                Логин
            </label>
            <input name="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="Введите Email">
        </div>
        <div class="mb-6">
            <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                Пароль
            </label>
            <input name="password" class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="Введите пароль">
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-login text-white hover:bg-blue-dark font-bold py-2 px-4 rounded" type="submit">
                Войти
            </button>
        </div>
    </form>
@endsection
