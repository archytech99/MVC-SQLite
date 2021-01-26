<?php

namespace archytech99\Controller;

class HomeController
{
    public function index() {
        view('home/index');
    }

    public function welcome($nama = "Arief BP", $hobi = "Game") {
        view('home/welcome', compact('nama','hobi'));
    }
}