@extends('layouts.app')

@section('content')
    <div class="flex flex-wrap flex-col items-center">
        <h1 class="mr-auto text-center w-full text-gray-500 color-extreme py-6 mt-4 font-bold text-4xl">
            Товар
        </h1>
        <div class="flex justify-between w-full">
            <div class="w-1/2 border-gray-200 border-2 rounded p-5">
                <img src="{{$product->imageUrl}}" alt="test">
            </div>
            <div class="w-1/2 pl-10">
                <div class="flex-col flex">
                    <div class="text-gray-500">{{$product->category ? $product->category : 'Товар'}}</div>
                    <div class="text-3xl font-medium mb-3">{{$product->sku }}</div>
                    <div class="text-sm">Количество товара: {{$product->totalStock}} </div>
                    <div class="text-xl font-bold text-green-700">{{$product->retailPrice}} грн</div>
                    <div class="">{{$product->description}}</div>
                </div>
            </div>
        </div>
    </div>
        <h2 class="mr-auto text-center w-full text-blue-400 py-7 mt-5 font-medium text-4xl">
            Похожие товары
        </h2>
        <div class="flex justify-between items-center w-full pb-44 -mx-3">
            @foreach([1,2,3] as $test)
                @include('products.card')
            @endforeach
        </div>
@endsection
