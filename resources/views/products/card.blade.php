<div class="w-1/3 border-gray-200 mx-3 border-2 rounded p-5 mb-6">
    <a href="/products/{{$product->id}}"><img src="{{$product->imageUrl}}" alt="test"></a>
    <div class="text-gray-500">{{$product->category ? $product->category : 'Роутер'}}</div>
    <div class="w-full flex justify-between">
       <a href="/products/{{$product->id}}"> <div class="text-3xl mb-3">{{$product->sku }}</div></a>
        <div class="text-3xl text-green-700 mb-3">{{$product->retailPrice }} грн</div>
    </div>
</div>
