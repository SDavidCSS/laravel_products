@php($title = __('messages.show_prod', ['name' => $product->name]))

<x-card :title="$title">
    <div class="row">
        <div class="col-6">
            <table class="table">
                <tbody>
                <tr>
                    <th>{{ __('messages.name') }}</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('messages.description') }}</th>
                    <td>{{ $product->description }}</td>
                </tr>
                <tr>
                    <th>{{ __('messages.hash') }}</th>
                    <td>{{ $product->unique_hash }}</td>
                </tr>
                <tr>
                    <th>{{ __('messages.created_at') }}</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th>{{ __('messages.updated_at') }}</th>
                    <td>{{ $product->updated_at }}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6">
            <div class="categories px-2">
                <h3>{{ __('messages.related_cat') }}</h3>
                <ul class="list-group list-group-flush">
                    @forelse($categories as $category)
                        <li class="list-group-item">{{ $category->name }}</li>
                    @empty
                        <p>{{ __('messages.no_related_cat') }}</p>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</x-card>
