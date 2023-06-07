<p class="mb-4">{{ $products[0]['adminName'] }} 様の商品が注文されました。</p>

<div class="mb-4">商品情報</div>
@foreach ($products as $product)
    <ul class="mb-4">
        <li>商品名：{{ $product['name'] }}</li>
        <li>商品金額：{{ number_format($product['price']) }}円</li>
        <li>商品数：{{ $product['quantity'] }}</li>
        <li>合計金額：{{ number_format($product['price'] * $product['quantity']) }}円</li>
    </ul>
@endforeach
    
<div class="mb-4">購入者情報</div>
<ul>
    <li>{{ $user->name }} 様</li>
</ul>
