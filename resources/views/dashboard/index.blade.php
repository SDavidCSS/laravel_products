@extends('layout')

@section('title', 'Dashboard')

@section('content')
    @include('partials.alert')
    @include('products.partials._product_modal')

    @php($message = __('messages.create_prod'))

    <x-link-button route="products.create" :title="$message" button-type="success" icon="plus" />

    @if(!count($products))

        <h3 class="no-products">{{ __('messages.no_products') }}</h3>

    @else

        <table class="table table-sm table-striped mt-2">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">{{ __('messages.name') }}</th>
                <th scope="col">{{ __('messages.hash') }}</th>
                <th scope="col">{{ __('messages.created_at') }}</th>
                <th scope="col">{{ __('messages.updated_at') }}</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->unique_hash }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->updated_at }}</td>
                    <td>
                        <div class="action-buttons d-flex gap-1 justify-content-center">
                            <a href="{{ route('products.show', ['product' => $product->id]) }}" class="btn btn-success btn-sm btn-show" title="{{ __('messages.show') }}" data-id="{{ $product->id }}" ><i class="fas fa-eye"></i></a>
                            <a href="{{ route('products.edit', ['product' => $product->id]) }}" class="btn btn-primary btn-sm btn-update" title="{{ __('messages.edit') }}" ><i class="fas fa-pencil"></i></a>
                            <form method="POST" action="{{ route('products.destroy', ['product' => $product->id]) }}">
                                @method('DELETE')
                                @csrf

                                <button type="submit" class="btn btn-danger btn-sm btn-delete" title="{{ __('messages.delete') }}"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{ $products->links() }}

    @endif
@endsection

@push('scripts')
    <script>
        $(function() {
            function fireConfirm(e) {
                e.preventDefault();
                const button = $(e.target);

                Swal.fire({
                    title: '{{ __('messages.confirm_delete') }}',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: '{{ __('messages.delete') }}',
                    denyButtonText: `{{ __('messages.cancel') }}`,
                    denyButtonColor: '#3085d6',
                    confirmButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        button.closest('form').submit();
                    } else if (result.isDenied) {
                        Swal.fire('{{ __('messages.cancel_delete') }}', '', 'info');
                    }
                });
            }

            function showProduct(e) {
                e.preventDefault();
                const productID = e.currentTarget.getAttribute('data-id');

                $.get(`products/${productID}/show-ajax`, function(res) {
                    const modal = $('#product-show');
                    modal.find('.modal-body').html(res);
                    modal.modal('show');
                });
            }

            $('.btn-show').on('click', showProduct);
            $('.btn-delete').on('click', fireConfirm);
        });
    </script>
@endpush
