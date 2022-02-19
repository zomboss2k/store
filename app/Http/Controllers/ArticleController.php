<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends FrontendController
{
    public function  __construct()
    {
        parent::__construct();
    }

    // Danh sach bai viet
    public function getListArticle()
    {
        // Lay ra 5 bai viet ở tin tức
        $articles = Article::orderBy('id','DESC')->simplePaginate(5);
        // Lấy các bài viết nổi bật
        $articleHot = Article::where('c_hot', Article::HOT)->get();
        return view('article.index', compact('articles', 'articleHot'));
    }

    // Chi tiet bai viet
    public function getDetailArticle(Request $request)
    {
        $arrayUrl = (preg_split("/(-)/i", $request->segment(2)));
        // dd( $arrayUrl);
        $id = array_pop($arrayUrl);
        // dd($id);
        if ($id) {
            $articleDetail = Article::find($id);
            // Lấy ra 2 bài viết khác ở chi tiết bài viết
            $articles = Article::orderBy('id', 'DESC')-> paginate(2);
            // Lấy các bài viết nổi bật
            $articleHot = Article::where('c_hot', Article::HOT)->get();
            $viewData = [
                'articles' => $articles,
                'articleDetail' => $articleDetail,
                'articleHot'=>$articleHot
            ];

            return view('article.detail', $viewData);
        }
        return redirect('/');
    }
}
