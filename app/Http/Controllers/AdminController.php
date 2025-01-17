<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\Order;

use App\Models\Product;

use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    //
        public function view_category()
        {

        $data = Category::all();

        return view('admin.category', compact('data'));
        }

        public function add_category(Request $request)
        {
            try {
                // Validasi untuk memastikan kolom kategori tidak kosong dan unik
                $request->validate([
                    'category' => 'required|string|max:255|unique:categories,category_name',
                ], [
                    'category.unique' => 'Kategori ini sudah ada, silakan masukkan nama kategori yang berbeda.',
                ]);

                // Jika validasi lolos, lanjutkan dengan penyimpanan data
                $category = new Category;
                $category->category_name = $request->category;
                $category->save();

                // Menampilkan notifikasi sukses
                toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori Berhasil Ditambahkan');

                return redirect('/view_category');

            } catch (\Illuminate\Validation\ValidationException $e) {
                // Tangkap error validasi dan tampilkan dengan Toastr
                toastr()->timeOut(10000)->closeButton()->addError($e->validator->errors()->first());
                return redirect('/view_category')->withInput();
            }
        }

        
        public function delete_category($id){
            $data = Category::find($id);

            $data->delete();

            toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori Berhasil Dihapus');

            return redirect()->back();
        }

        public function edit_category($id){

            $data = Category::find($id);
            return view('admin.edit_category', compact('data'));
        }
        
        public function update_category(Request $request, $id)
        {
            try {
                // Validasi kolom kategori tidak kosong dan unik, kecuali kategori yang sedang diedit
                $request->validate([
                    'category' => 'required|string|max:255|unique:categories,category_name,' . $id,
                ], [
                    'category.unique' => 'Kategori ini sudah ada, silakan masukkan nama kategori yang berbeda.',
                ]);

                // Jika validasi lolos, lanjutkan dengan pembaruan data
                $category = Category::find($id);
                $category->category_name = $request->category;
                $category->save();

                // Menampilkan notifikasi sukses
                toastr()->timeOut(10000)->closeButton()->addSuccess('Kategori Berhasil Diperbarui');
                return redirect('/view_category');

            } catch (\Illuminate\Validation\ValidationException $e) {
                // Tangkap error validasi dan tampilkan dengan Toastr
                toastr()->timeOut(10000)->closeButton()->addError($e->validator->errors()->first());
                return redirect()->back()->withInput();
            }
        }



        public function add_product(){

            $category = Category::all();

            return view('admin.add_product', compact('category'));
        }

        public function upload_product(Request $request)
        {
            try {
                // Validasi input dengan pesan error khusus
                $request->validate([
                    'title' => 'required|unique:products,title', // Pastikan 'title' unik
                ], [
                    'title.unique' => 'Judul produk sudah ada, silakan gunakan judul lain.',
                ]);
        
                // Membuat instance baru
                $data = new Product;
                $data->title = $request->title;
                $data->description = $request->description;
                $data->price = $request->price;
                $data->quantity = $request->qty;
                $data->category = $request->category;
        
                // Upload file gambar jika ada
                if ($request->hasFile('image')) {
                    $image = $request->file('image');
                    $imageName = time() . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('products'), $imageName);
                    $data->image = $imageName;
                }
        
                // Simpan data ke database
                $data->save();
        
                // Menampilkan notifikasi sukses
                toastr()->timeOut(10000)->closeButton()->addSuccess('Produk Berhasil Ditambahkan');
        
                return redirect()->back();
            } catch (\Illuminate\Validation\ValidationException $e) {
                // Tangkap error validasi dan tampilkan dengan Toastr
                toastr()->timeOut(10000)->closeButton()->addError($e->validator->errors()->first());
                return redirect()->back()->withInput();
            }
        }
        

        public function view_product(){

            $product = Product::paginate(4  );
            return view('admin.view_product', compact('product'));
        }

        public function delete_product($id){
            $data = Product::find($id);

            $data->delete();

            $image_path = public_path('products/'.$data->image);

                if(file_exists($image_path)){

                    unlink($image_path);
                }



            toastr()->timeOut(10000)->closeButton()->addSuccess('Produk Berhasil Dihapus');

            return redirect()->back();
        }

        public function update_product($id){

            $data = Product::find($id);

            $category = Category::all();

            return view('admin.update_product', compact('data','category'));

        }

        public function edit_product(Request $request, $id)
        {
            // Validasi untuk memastikan judul produk tidak duplikat kecuali produk yang sedang diedit
            $validator = \Validator::make($request->all(), [
                'title' => 'required|string|max:255|unique:products,title,' . $id,

            ], [
                'title.unique' => 'Produk dengan judul ini sudah ada, silakan pilih nama produk lain.',
            ]);

            // Cek apakah validasi gagal
            if ($validator->fails()) {
                // Mengirimkan error dan kembali ke halaman sebelumnya
                toastr()->timeOut(10000)->closeButton()->addError($validator->errors()->first());
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Jika validasi lolos, lanjutkan dengan pembaruan data
            $data = Product::find($id);

            $data->title = $request->title;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->quantity = $request->quantity;
            $data->category = $request->category;

            $image = $request->image;

            if ($image) {
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $request->image->move('products', $imagename);
                $data->image = $imagename;
            }

            $data->save();

            toastr()->timeOut(10000)->closeButton()->addSuccess('Produk Berhasil Diperbarui');

            return redirect('/view_product');
        }


        public function product_search(Request $request){

            $search = $request->search;
            $product = Product::where('title','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->paginate(3);
            return view('admin.view_product',compact('product'));

        }

        public function view_order()
        {
            $data = Order::all();

            return view('admin.order',compact('data'));
        }

        public function on_the_way($id)
        {
            $data = Order::find($id);

            $data->status = 'Dikirim';

            $data->save();

            return redirect('/view_orders');
        }

        public function delivered($id)
        {
            $data = Order::find($id);

            $data->status = 'Terkirim';

            $data->save();

            return redirect('/view_orders');
        }

        public function print_pdf($id)
        {
            $data = Order::find($id);
            $pdf = Pdf::loadView('admin.invoice',compact('data'));
            return $pdf->download('invoice.pdf');
        }

}


