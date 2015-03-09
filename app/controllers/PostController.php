<?php

use Lib\Validation\PostValidator as PostValidator;
use Lib\Gestion\PostGestion as PostGestion;

class PostController extends BaseController {

    protected $validation;
    protected $gestion;

    public function __construct(PostValidator $validation, PostGestion $gestion)
    {
        parent::__construct();
        $this->beforeFilter('auth', array('except' => 'getListe'));
        $this->beforeFilter('admin', array('only' => 'getDel'));
        $this->validation = $validation;
        $this->gestion = $gestion;
    }

    public function getListe()
    {
        return View::make('liste', $this->gestion->liste(4));
    }

    public function getAdd()
    {
        return View::make('add');
    }

    public function postAdd()
    {
        if ($this->validation->fails()) {
            return Redirect::to('post/add')
                ->withErrors($this->validation->errors())
                ->withInput();
        } else {
            $this->gestion->save();
            return Redirect::to('post/liste');
        }
    }

    public function getDel($id)
    {
        $this->gestion->del($id);
        return Redirect::back();
    }

}