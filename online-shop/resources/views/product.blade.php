@extends('layouts.master')

@section('title', 'Товар')

@section('content')
    <form action="{{ route('basket-add', $product) }}" method="POST">
        @csrf
        <h1>{{ $product->name }}</h1>
        <p>Цена: <b>{{ $product->price }} грн.</b></p>
        <img src="{{ $product->image }}" alt="{{ $product->name }}" style="max-width: 300px; max-height: 300px;">
        <p>{{ $product->description }}</p>
        <button type="submit" class="btn btn-success" role="button">Добавить в корзину</button>
    </form>
@endsection
