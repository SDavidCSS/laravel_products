@extends('layout')

@section('title', __('messages.show'))

@section('content')

    <div class="container-md">

        @php($message = __('messages.back'))

        <x-link-button route="home" :title="$message" button-type="primary" icon="backward" />

        @include('products/partials/_product_desc', ['product' => $product, 'categories' => $categories])

    </div>
@endsection
