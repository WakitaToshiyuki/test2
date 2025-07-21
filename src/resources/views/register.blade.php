@extends('layouts.app') @section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}" />
@endsection 

@section('content')
<form action="/products" method="post" enctype="multipart/form-data" >
    @csrf
    <div class="register__title">
        <p>商品登録</p>
    </div>
    <div class="register__form">
        <div class="register__form-content">
            <lavel class="register__form-title" for="name">
                商品名<span class="span__required">必須</span>
            </lavel>
            <input class="register__form-text" type="text" name="Product[name]" value="{{ old('Product.name') }}" placeholder="商品名を入力" />
            <div class="form__error">
                @error('Product.name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register__form-content">
            <lavel class="register__form-title" for="price">
                値段<span class="span__required">必須</span>
            </lavel>
            <input class="register__form-text" type="text" name="price" value="{{ old('price') }}" placeholder="値段を入力" />
            <div class="form__error">
                @error('price')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register__form-content">
            <lavel class="register__form-title">
                商品画像<span class="span__required">必須</span>
            </lavel>
            <input type="file" name="image" value="{{ old('image') }}" >
            <div class="form__error">
                @error('image')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register__form-content">
            <lavel class="register__form-title">
                季節
                <span class="span__required">必須</span>
                <span class="span__choice">複数選択可</span>
            </lavel>
            <label><input type="checkbox" name="Season[name]" value="春"> 春</label>
            <label><input type="checkbox" name="Season[name]" value="夏"> 夏</label>
            <label><input type="checkbox" name="Season[name]" value="秋"> 秋</label>
            <label><input type="checkbox" name="Season[name]" value="冬"> 冬</label>
            <div class="form__error">
                @error('Season.name')
                {{$message}}
                @enderror
            </div>
        </div>
        <div class="register__form-content">
            <lavel class="register__form-title" for="description">
                商品説明<span class="span__required">必須</span>
            </lavel>
            <textarea class="contact__form-textarea" name="description" id="" cols="30" rows="5" placeholder="商品の説明を入力" >
                {{ old('description') }}
            </textarea>
            <div class="form__error">
                @error('description')
                {{$message}}
                @enderror
            </div>
        </div>
        <div style="display: flex; gap: 10px;">
            <a href="/products">
                <button type="button" class="register__form-cancel">戻る</button>
            </a>
            <button type="submit" value="save" class="register__form-save">登録</button>
            <!-- name="action" -->
        </div>
    </div>
</form>
@endsection
