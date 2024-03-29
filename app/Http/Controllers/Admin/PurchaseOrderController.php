<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseOrderLine;
use App\Models\Salesman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function getProductList(){
        $products = Product::paginate(10);
        return view('admin.products.index', ["products" => $products]);
    }
    public function getProductCreate(){
        $products = Product::paginate(10);
        return view('admin.products.create', ["products" => $products]);
    }
    public function getProductShow($id){
        $product = Product::findOrFail($id);
    return view('admin.products.show', compact('product'));
    }
    public function getProductEdit($id)
{
    $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
}

    public function getProductDestroy($id){
        // Temukan dan hapus produk berdasarkan ID
        $product = Product::findOrFail($id);
        $product->delete();

        // Redirect ke halaman indeks produk dengan pesan sukses
        return redirect()->route('admin.products.index')->with('success', 'Product has been deleted successfully.');
    }
    public function storeProduct(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_code' => 'required|string|max:255|unique:products',
            'price' => 'required|numeric|min:0',
        ]);

        // Membuat produk baru berdasarkan data yang diterima
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->product_code = $request->input('product_code');
        $product->price = $request->input('price');
        $product->save();

        // Redirect kembali ke halaman pembuatan produk dengan pesan sukses
        return redirect()->route('admin.products.create')->with('success', 'Product created successfully');
    }
    public function getPurchaseOrderLineList()
    {
        $purchaseOrderLines = PurchaseOrderLine::paginate(10);
        return view('admin.purchaseOrderLines.index', ["purchaseOrderLines" => $purchaseOrderLines]);
    }

    public function getPurchaseOrderLineShow($id)
    {
        $purchaseOrderLine = PurchaseOrderLine::findOrFail($id);
        $purchaseOrderLines = PurchaseOrderLine::paginate(10);
        return view('admin.purchaseOrderLines.show', ['purchaseOrderLine' => $purchaseOrderLine, 'purchaseOrderLines' => $purchaseOrderLines]);
    }

    public function getPurchaseOrderLineEdit($id)
    {
        $purchaseOrderLine = PurchaseOrderLine::findOrFail($id);
    $products = Product::all();
    return view('admin.purchaseOrderLines.edit', ['purchaseOrderLine' => $purchaseOrderLine, 'products' => $products]);
    }
    public function getProductUpdate(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'product_name' => 'required',
            'product_code' => 'required|unique:products,product_code,'.$id,
            'price' => 'required|numeric',
        ]);

        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Update the product with the validated data
        $product->update($validatedData);

        // Redirect back to the product index page with a success message
        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }
    public function getPurchaseOrderLineDestroy($id)
    {

    $purchaseOrderLine = PurchaseOrderLine::findOrFail($id);


    $purchaseOrderLine->delete();


    return redirect()->route('admin.purchase.order.lines')->with('success', 'Purchase order line has been deleted successfully.');
    }


    public function getPurchaseOrderLineCreate(){
        $products = Product::all();

        return view('admin.purchaseOrderLines.create', [
            'products' => $products,
        ]);

    }
    public function postPurchaseOrderLineUpdate(Request $request, $id){
        {

            $validatedData = $request->validate([
                'product_id' => 'required|exists:products,id',
                'qty' => 'required|numeric',
                'price' => 'required|numeric',
                'discount' => 'nullable|numeric',
            ]);


            $qty = $validatedData['qty'];
            $price = $validatedData['price'];
            $discount = $validatedData['discount'] ?? 0;
            $total = ($qty * $price) - $discount;


            $purchaseOrderLine = PurchaseOrderLine::findOrFail($id);


            $purchaseOrderLine->update([
                'product_id' => $validatedData['product_id'],
                'qty' => $qty,
                'price' => $price,
                'discount' => $discount,
                'total' => $total,
            ]);

            // Redirect kembali ke halaman daftar purchase order lines dengan pesan sukses
            return redirect()->route('admin.purchase.order.lines')->with('success', 'Purchase order line has been updated successfully.');
        }
    }
    public function postPurchaseOrderLineInsert(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'product_id' => 'required|exists:products,id',
        'qty' => 'required|numeric',
        'price' => 'required|numeric',
        'discount' => 'nullable|numeric',
    ]);

    // Menghitung total
    $qty = $validatedData['qty'];
    $price = $validatedData['price'];
    $discount = $validatedData['discount'] ?? 0;
    $total = ($qty * $price) - $discount;

    // Simpan data ke dalam database
    $purchaseOrderLine = new PurchaseOrderLine();
    $purchaseOrderLine->product_id = $validatedData['product_id'];
    $purchaseOrderLine->qty = $qty;
    $purchaseOrderLine->price = $price;
    $purchaseOrderLine->discount = $discount;
    $purchaseOrderLine->total = $total;
    $purchaseOrderLine->save();

    // Redirect kembali ke halaman sebelumnya dengan pesan sukses
    return redirect()->route('admin.purchase.order.lines')->with('success', 'Purchase order line has been created successfully.');
}


}
