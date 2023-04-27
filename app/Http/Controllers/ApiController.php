<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'sku' => 'required|unique:products',
            'price' => 'required',
            'image' => 'nullable|image',
            'status' => 'boolean',
            'type' => 'boolean',
        ]);
        // $product = Product::create($storeData);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        // Save the image to the server and get the file path


        // Add the user_id and image_path to the validated data
        // $validatedData['user_id'] = $userId;
        $storeData['image'] = $imageName;

        // Create the product
        $product = Product::create($storeData);

        // Show a success message and redirect to the product index page
        // if ($product) {
        //     $request->session()->flash('success', 'Product successfully added');
        // } else {
        //     $request->session()->flash('error', 'Oops something went wrong, product not saved');
        // }
        return response()->json($product);
        // return redirect('products');
        // return redirect('/products')->with('success', 'Product has been saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
        // return view('edit', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        
        if (!$product) {
            return redirect('product')->with('error', 'Product not found.');
        }
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'sku' => 'required|unique:products,sku,' . $id,
            'price' => 'required',
            'image' => 'nullable|image',
            'status' => 'boolean',
            'type' => 'boolean'
        ]);

        

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
            $fileName = public_path('images/'. $product->image);
            File::delete($fileName);
        }

        $productStatus = $product->update($validatedData);

        // if ($productStatus) {
        //     return redirect('products')->with('success', 'Product successfully updated.');
        // } else {
        //     return redirect('products')->with('error', 'Oops something went wrong. Product not updated');
        // }

        return response()->json($productStatus);
        
        // $product = Product::findOrFail($id);
        // $product->update($updateData);
        
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = $product->id . '.' . $image->getClientOriginalExtension();
        //     $image->storeAs('public/images/products', $filename);
        //     $product->image = $filename;
        //     $product->save();
        // }
        
        // return redirect('/products')->with('success', 'Product has been updated!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json('Product deleted ');
    }
}
