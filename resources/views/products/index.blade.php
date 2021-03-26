@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap flex-col items-center">
        <h1 class="mr-auto text-center w-full text-gray-500 color-extreme py-6 mt-6 font-bold text-4xl">
            Наша продукция
        </h1>
        <div class="main-main lg:flex lg:flex-wrap -mx-2">
            @foreach($products as $product)
                @include('products.card')
            @endforeach
        </div>
    </div>
@endsection
