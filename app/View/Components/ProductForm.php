<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ProductForm extends Component
{
    const TYPE_CREATE = 'create';
    const TYPE_UPDATE = 'update';

    public bool $isNewRecord = true;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $route,
        public string $type,
        public Collection $categories,
        public ?Product $product = null,
        public ?array $attachedCategories = []
    )
    {
        $this->isNewRecord = $this->type === self::TYPE_CREATE;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product-form');
    }
}
