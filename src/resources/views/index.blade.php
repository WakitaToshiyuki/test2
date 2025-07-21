@extends('layouts.app') @section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection 

@section('content')
<div class="base">
    @csrf
    <div style="display: flex; justify-content: space-between;">
        <h2>商品一覧</h2>
        <a href="/products/register">
            <button type="button" class="button__move">+商品を追加</button>
        </a>
    </div>
    <div class="main">
        <div style="display: flex; gap: 10px;">
            <div class="side">
                <form class="side__search" action="/products/search" method="get" >
                    @csrf
                    <input class="side__search-write" type="text" name="keyword" placeholder="商品名で検索">
                    <button class="side__search-button" type="submit">検索</button>
                </form>
                <div class="side__reorder">
                    <h4>価格順で表示</h4>
                    <select class="side__reorder-select" name="reorder" placeholder="価格で並び替え">
                        <option value="高い順に表示">高い順に表示</option>
                        <option value="低い順に表示">低い順に表示</option>
                    </select>
                </div>
            </div>
            <div class="main__contents">
                <div class="card__container">
                    @foreach ($products as $product)
                    <div class="card">
                        <img class="card__image" src="{{ asset('storage/images/' . $product->image) }}" alt="{{ $product->name }}">
                        <div class="card__body">
                            <p class="card__name">{{ $product->name }}</p>
                            <p class="card__price">¥{{ number_format($product->price) }}</p>
                        </div>
                    </div>
                    @endforeach
                    <div class="paginate">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


