<?php

require_once 'Controller.php';

class DefaultController extends Controller
{
    public function index()
    {
        $this->render('login');
    }

    public function about()
    {
        $this->render('about');
    }

    public function contact()
    {
        $this->render('contact');
    }
}