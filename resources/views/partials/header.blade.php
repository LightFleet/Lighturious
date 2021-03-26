<header class="">
    @if (\Illuminate\Support\Facades\Route::is('login'))
        <div class="container mx-auto flex items-center h-full">
            <a href="/products" class="font-bold text-3xl text-white">Логотип</a>
            <form method="get" action="/login">
                @csrf
                <button type="submit"class="font-bold text-white ml-20 mt-0.5">Войти в аккаунт</button>
            </form>
        </div>
    @else
        <div class="container mx-auto flex items-center justify-between h-full">
            <a href="/" class="font-bold text-3xl text-white">Логотип</a>
            <form method="get" action="/api/logout">
                @csrf
                <button type="submit">Выйти из аккаунта</button>
            </form>
        </div>
    @endif
</header>
