<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function list(Request $request) {
        $query = Product::query();
        if ($request->has('query') && $request->input('query')) {
            $searchQuery = $request->input('query');
            $query->where('product_id', 'LIKE', "%{$searchQuery}%")
                  ->orWhere('name', 'LIKE', "%{$searchQuery}%");
        }
        if ($request->has('sort_by')) {
            $sortBy = $request->input('sort_by');
            $query->orderBy($sortBy, $request->input('sort_order', 'asc'));
        }
        $products = $query->paginate(10);

        return view('index', ['products' => $products]);
    }

    public function createForm() {
        return view('create');
    }
    public function create(Request $request) {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $data['image'], 'public');
        }

        Product::create($data);
        return redirect('/products');
    }
    public function show($id) {
        $product = Product::find($id);

        if ($product) {
            return view('show', ['product' => $product]);
        } else {
            return redirect('/products')->with('error', 'Product not found');
        }
    }
    public function edit($id) {
        $product = Product::find($id);

        if ($product) {
            return view('edit', ['product' => $product]);
        } else {
            return redirect('/products')->with('error', 'Product not found');
        }
    }

    public function update(Request $request, $id) {
        $product = Product::find($id);

        if ($product) {
            $data = $request->except('image');

            if ($request->hasFile('image')) {
                $data['image'] = time() . '_' . $request->file('image')->getClientOriginalName();
                $request->file('image')->storeAs('images', $data['image'], 'public');
            }

            $product->update($data);
            return redirect('/products/' . $id)->with('success', 'Product updated successfully');
        }

        return redirect('/products')->with('error', 'Product not found');
    }
    public function delete($id) {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products');
    }
}
