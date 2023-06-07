@extends('master')

@section('title', 'Товар')

@section('content')
    <div class="starter-template">
        <h1>{{ $product->name }}</h1>
        <p>Цена: <b>{{ $product->price }} грн.</b></p>
        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 300px; max-height: 300px;">
        <p>{{ $product->description }}</p>
        <a class="btn btn-success" href="{{--TODO: Додати шлях--}}">Добавить в корзину</a>
    </div>
@endsection
