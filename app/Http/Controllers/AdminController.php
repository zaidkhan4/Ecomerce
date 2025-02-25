<?php

namespace App\Http\Controllers;

use App\Models\Baner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use function Flasher\Toastr\Prime\toastr;
use function PHPUnit\Framework\returnArgument;

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
        $product = Product::where('slug', $slug)->get()->first();


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



    public function view_brand()
    {
        $brands = Brand::all();
        return view('admin.brand', compact('brands'));
    }

    public function add_brand(Request $request)
    {

        $brand = new Brand;

        $brand->brand_name = $request->brand_name;
        $brand->save();

        flash()->success('Brand Added Successfully.');

        return redirect()->back();
    }


    public function edit_brand($id)
    {
        $brand = Brand::find($id);
        return view('admin.edit_brand', compact('brand'));
    }

    public function update_brand(Request $request, $id){
        $data = Brand::find($id);

        $data->brand_name = $request->brand_name;
        $data->save();

        flash()->success('Brand Updated Successfully.');
        return redirect('view_brand');
    }

    public function delete_brand($id)
    {
        $data = Brand::find($id);
        $data->delete();

        flash()->success('Brand deleted Successfully.');
        return redirect()->back();
    }

    public function showcontact()
    {
        $contacts = Contact::all();
        return view('admin.showcontact', compact('contacts'));
    }

    public function deletecontact($id)
    {
        $data = Contact::find($id);
        $data->delete();

        flash()->success('Contact deleted Successfully.');
        return redirect()->back();
    }


    public function banershow()
    {
        $baners = Baner::all();
        return view('admin.baner', compact('baners'));
    }

    public function banersave(Request $request)
    {
        $baner = new Baner;

        $baner->name = $request->name;
        $baner->description = $request->description;
        $baner->save();

        flash()->success('Baner added Successfully.');
        return redirect()->back();

    }

    public function edit_baner($id)
    {
        $baner = Baner::find($id);
        return view('admin.editbaner', compact('baner'));
    }

    public function update_baner(Request $request, $id)
    {
        $baner = Baner::find($id);

        $baner->name = $request->name;
        $baner->description = $request->description;
        $baner->save();

        flash()->success('Baner updated Successfully.');
        return redirect()->route('banershow');

    }


    public function delete_baner($id)
    {
        $data = Baner::find($id);
        $data->delete();

        flash()->success('Baner deleted Successfully.');
        return redirect()->back();
    }


}
