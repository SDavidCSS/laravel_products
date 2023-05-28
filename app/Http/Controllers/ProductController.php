<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Mail\ProductMail;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductRequest $request
     * @return RedirectResponse
     */
    public function store(ProductRequest $request): RedirectResponse
    {
        if ($newProduct = Product::create($request->validated())) {
            if(!empty($request->categories)) {
                $newProduct->categories()->sync($request->categories);
            }

            Mail::to('admin@test.com')->later(now()->addMinutes(15), new ProductMail($newProduct));
        };

        return redirect()->route('home')->with('success', __('messages.prod_created', ['name' => $newProduct->name]));
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @return View
     */
    public function show(Product $product): View
    {
        $categories = $product->categories()->orderBy('name')->get();

        return view('products.show', compact('product', 'categories'));
    }

    /**
     * Display the specified product asynchronously.
     *
     * @param  Product  $product
     * @return View
     */
    public function showAjax(Product $product): string
    {
        $categories = $product->categories()->orderBy('name')->get();

        return view('products.partials._product_desc', compact('product', 'categories'))->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @return View
     */
    public function edit(Product $product): View
    {
        $categories = Category::all();
        $attachedCategories = $product->categories()->allRelatedIds()->toArray();

        return view('products.edit', compact('product', 'categories', 'attachedCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductRequest  $request
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function update(ProductRequest $request, Product $product): RedirectResponse
    {
        $product->update($request->validated());
        $product->categories()->sync($request->categories);

        return redirect()->route('home')->with('success', __('messages.prod_updated', ['name' => $product->name]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('home')->with('success', __('messages.prod_deleted', ['name' => $product->name]));
    }
}
