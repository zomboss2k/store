<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{
    // controller tu Module chua admin 
    public function index()
    {
        $categories = Category::select('id', 'c_name', 'c_title_seo', 'c_active','c_home')->get();
        $viewData = [
            'categories' => $categories
        ];
        return view('admin::category.index', $viewData);
    }

    // controller create category 
    public function create()
    {
        return view('admin::category.create');
    }

    // Thêm danh mục - INSER
    public function store(RequestCategory $requestCategory)
    {
        // show thong tin nhap tu input
        // dd($requestCategory->all());
        $this->inserOrUpdate($requestCategory);
        return redirect()->back()->with('success', 'Một danh mục sản phẩm mới đã được tạo.');
    }

    // controller edit 
    public function edit($id)
    {
        // lay id danh muc can update
        $category = Category::find($id);
        // lay danh muc can update tra ve view
        return view('admin::category.update', compact('category'));
    }


    // Cập nhật danh mục theo id - UPDATE
    public function update(RequestCategory $requestCategory, $id)
    {
        $this->inserOrUpdate($requestCategory, $id);
        return redirect()->back()->with('success', 'Danh mục sản phẩm đã được cập nhật.');
    }

    // viet lại ham insert va update
    public function inserOrUpdate($requestCategory, $id = '')
    {
        $code = 1;
        try {
            $category = new Category();

            if ($id) {
                $category = Category::find($id);
            }
            $category->c_name = $requestCategory->name;
            $category->c_slug = str_slug($requestCategory->name); //slug dinh dang tren url danh+muc+san+pham 
            $category->c_icon = str_slug($requestCategory->icon);
           
            // toan tu 3 ngoi
            $category->c_title_seo = $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->name;
            $category->c_description_seo = $requestCategory->c_description_seo;
            $category->save();
        } catch (\Exception $exception) {
            $code = 0;
            Log::error("[Error inserOrUpdate Category]" . $exception->getMessage());
        }
        return $code;
    }

    // Ham Delete
    public function action($action, $id)
    {
        $messages = "";
        if ($action) {

            $category = Category::find($id);
            switch ($action) {
                case 'delete':
                    $category->delete();
                    $messages = 'Danh mục sản phẩm đã xóa.';
                    break;

                case 'home':
                    $category->c_home = $category->c_home == 1 ? 0 : 1;
                    $category->save();
                    $messages = 'Cập nhật thành công.';
                    break;
                
                case 'active':
                    $category->c_active = $category->c_active == 1 ? 0 : 1;
                    $category->save();
                    $messages = 'Đã thay đổi trạng thái.';
                    break;
            }
            return redirect()->back()->with('success', $messages);
        }
    }
}
