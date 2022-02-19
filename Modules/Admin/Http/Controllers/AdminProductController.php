<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::with('category:id,c_name');

        // kiem tra tim kiem 
        if ($request->name) $products->where('pro_name', 'like', '%' . $request->name . '%');
        if ($request->cate) $products->where('pro_category_id', $request->cate);

        $products = $products->orderByDesc('id')->paginate(10); // phan trang

        // lay danh muc ra trong tim kiem
        $categories = $this->getCategories();

        $viewData = [
            'products' => $products,
            'categories' => $categories
        ];


        return view('admin::product.index', $viewData);
    }

    public function create()
    {
        $categories = $this->getCategories();
        return view('admin::product.create', compact('categories'));
    }

    public function store(RequestProduct $requestProduct)
    {
        // dd($requestProduct->all());
        $this->insertOrUpdate($requestProduct);
        return redirect()->back()->with('success','Một sản phẩm mới đã được thêm.');
    }

    // Ham chinh sua san pham
    public function  edit($id)
    {
        $product = Product::find($id);
        $categories = $this->getCategories();
        return view('admin::product.update', compact('product', 'categories'));
    }

    //Ham update
    public function update(RequestProduct $requestProduct, $id)
    {
        $this->insertOrUpdate($requestProduct, $id);
        return redirect()->back()->with('success','Sản phẩm đã được cập nhật.');
    }


    // ham lay danh muc
    public function getCategories()
    {
        return Category::all();
    }

    // ham them san pham vao csdl
    public function insertOrUpdate($requestProduct, $id = '')
    {
        $product = new Product();

        if ($id) $product = Product::find($id);

        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = str_slug($requestProduct->pro_name);
        $product->pro_category_id = $requestProduct->pro_category_id;
        $product->pro_price = $requestProduct->pro_price;
        // 
        $product->pro_number = $requestProduct->pro_number;
        // 
        $product->pro_sale = $requestProduct->pro_sale;
        $product->pro_description = $requestProduct->pro_description;
        $product->pro_content = $requestProduct->pro_content;
        $product->pro_title_seo = $requestProduct->pro_title_seo ? $requestProduct->pro_title_seo : $requestProduct->pro_name;
        $product->pro_description_seo = $requestProduct->pro_description_seo ? $requestProduct->pro_description_seo : $requestProduct->pro_description_seo;

        // kiểm tra upload 
        // dd($requestProduct->all());
        if ($requestProduct->hasFile('avatar')) {
            $file = upload_image('avatar');
            if (isset($file['name'])) {
                $product->pro_avatar = $file['name'];
            }
            
            // dd($file);
        }

        $product->save();
    }

    // Ham action Delete san pham
    public function action($action, $id)
    {
        $message = "";
        if ($action) {
            $product = Product::find($id);
            switch ($action) {
                case 'delete':
                    $product->delete();
                    $message = 'Sản phẩm đã được xóa khỏi hệ thống.';
                    break;
                case 'active':
                    $product->pro_active = $product->pro_active ? 0 : 1;
                    $product->save();
                    $message = 'Bạn vừa thay đổi trạng thái của sản phẩm.';
                    // dd('OK');
                    break;
                case 'hot':
                    $product->pro_hot = $product->pro_hot ? 0 : 1;
                    $product->save();
                    $message = 'Trạng thái sản phẩm nổi bật đã được thay đổi.';
                    break;
            }
            return redirect()->back()->with('success',$message);
        }
    }
}
