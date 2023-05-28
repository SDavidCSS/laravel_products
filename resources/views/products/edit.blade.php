@php use App\View\Components\ProductForm; @endphp

@extends('layout')

@section('title', __('messages.edit'))

@section('content')
    @php($message = __('messages.back'))

    <x-link-button route="home" :title="$message" button-type="primary" icon="backward" />

    @php($title = __('messages.edit_prod', ['name' => $product->name]))

    <x-card :title="$title">
        <x-product-form
            route="products.update"
            :type="ProductForm::TYPE_UPDATE"
            :categories="$categories"
            :product="$product"
            :attachedCategories="$attachedCategories"
        />

        <x-slot:footer>
            <button type="submit" form="product-form" class="btn btn-success d-block">{{ __('messages.update') }}</button>
        </x-slot:footer>
    </x-card>
@endsection
