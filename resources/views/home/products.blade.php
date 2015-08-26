@extends('layouts.layout')

@section('title')
    {{ $pageTitle }}
@stop

@section('content')
    <h2 class="page-title">{{ $pageTitle }}</h2>
    <div class="page-wrapper products">
        @foreach($products as $product)
            <div>
                <h3>{{ $product->name }}</h3>
                <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" width="200px" height="150px"/>
                <p>
                    {{ $product->short_description }}
                </p>
                {!! link_to('about', 'Узнать подробнее >>') !!}
            </div>
        @endforeach
    </div>
@stop