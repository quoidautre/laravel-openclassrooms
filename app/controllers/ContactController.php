<?php
//noel2014pestreaktasfamily
use Lib\Validation\ContactValidator;

class ContactController extends BaseController {

    public function __construct(ContactValidator $validation)
    {
        parent::__construct();
        $this->validation = $validation;
    }

    public function getForm()
    {
        return View::make('contact');
    }

    public function postForm()
    {
        if ($this->validation->fails()) {
            return Redirect::to('contact/form')->withErrors($this->validation->errors())->withInput();
        } else {
           /* Mail::send('emails.contact', Input::all(), function($m)	{
                $m->to('monadresse@free.fr')->subject('Contact');
            });   */
            echo "mail envoyé !";
            return View::make('confirm');
        }
    }

}