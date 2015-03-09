<?php
class ArticleController extends BaseController {

    public function show($n)
    {
        echo "Article::show";
        return View::make('article')->with('numero', $n);
    }

}