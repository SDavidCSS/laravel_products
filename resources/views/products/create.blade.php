@php use App\View\Components\ProductForm; @endphp

@extends('layout')

@section('title', __('messages.create'))

@section('content')
    <div class="container-md">

        @php($message = __('messages.back'))

        <x-link-button route="home" :title="$message" button-type="primary" icon="backward" />

        @php($title = __('messages.create_prod'))

        <x-card :title="$title">
            <x-product-form
                route="products.store"
                :type="ProductForm::TYPE_CREATE"
                :categories="$categories"
            />

            <x-slot:footer>
                <button type="submit" form="product-form" class="btn btn-success d-block">{{ __('messages.save') }}</button>
            </x-slot:footer>
        </x-card>

    </div>
@endsection
