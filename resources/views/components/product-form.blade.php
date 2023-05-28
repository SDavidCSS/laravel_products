<form id="product-form" action="{{ $type === 'create' ? route($route) : route($route, ['product' => $product->id])  }}" method="POST">
    @csrf
    @method($isNewRecord ? 'POST' : 'PUT')

    <label for="name" class="form-label fw-bold">{{ __('messages.name') }}</label>
    <input
        type="text"
        name="name"
        id="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $isNewRecord ? '' : $product->name) }}"
    />
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <label for="description" class="form-label fw-bold">{{ __('messages.description') }}</label>
    <textarea
        name="description"
        id="description"
        class="form-control @error('description') is-invalid @enderror">{{ old('description', $isNewRecord ? '' : $product->description) }}</textarea>
    @error('description')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <label for="categories" class="form-label fw-bold">{{ __('messages.categories') }}</label>
    <select name="categories[]" id="categories" class="form-control form-select" multiple>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected($isNewRecord ? in_array($category->id, old('categories', [])) : in_array($category->id, $attachedCategories))>{{ $category->name }}</option>
        @endforeach
    </select>
</form>
