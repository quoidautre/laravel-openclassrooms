<?php
class UsersController extends BaseController {

    public function getInfos()
    {
        return View::make('infos');
    }

    public function postInfos()
    {
        echo 'Le nom est ' . Input::get('nom');
    }

    public function __construct()
    {
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

}