<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use function Flasher\Toastr\Prime\toastr;

class AdminController extends Controller
{


    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }



    public function add_category(Request $request)
    {

        $category = new Category;

        $category->category_name = $request->category;
        $category->save();

        flash()->success('Category Added Successfully.');

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        flash()->success('Category deleted Successfully.');
        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);

        $data->category_name = $request->category;
        $data->save();

        flash()->success('Category Updated Successfully.');
        return redirect('view_category');
    }


    public function add_product()
    {
        $categores = Category::all();
        return view('admin.add_product', compact('categores'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();


        flash()->success('Products Added Successfully.');
        return redirect()->back();




    }


    public function view_product()
    {
        $products = Product::paginate(6);
        return view('admin.view_product', compact('products'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);

        $image_path = public_path('products/'.$product->image);

        if(file_exists($image_path))
        {
            unlink($image_path);
        }
        $product->delete();
        flash()->success('Product deleted Successfully.');
        return redirect()->back();
    }


    public function edit_product($slug)
    {
        $product = Product::where('slug',$slug)->get()->first();


        $categores = Category::all();
        return view('admin.edit_product',compact('product','categores'));
    }


    public function update_product($id, Request $request)
    {
        $data = Product::find($id);

        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->qty;
        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }

        $data->save();


        flash()->success('Products updated Successfully.');
        return redirect('view_product');

    }


    public function product_search(Request $request)
    {
        $search = $request->search;

        $products = Product::where('title','LIKE','%'.$search.'%')
        ->orWhere('category','LIKE','%'.$search.'%')
        ->paginate(3);
        return view('admin.view_product',compact('products'));
    }

    public function view_products()
    {
        $orders = Order::all();
        return view('admin.order', compact('orders'));
    }


    public function on_the_way($id)
    {
        $data = Order::find($id);
        $data->status = 'on the way';
        $data->save();

        return redirect('/view_products');
    }


    public function delivered($id)
    {
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();

        return redirect('/view_products');
    }


    public function change_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');
    }




}
