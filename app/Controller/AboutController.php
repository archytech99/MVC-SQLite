<?php

namespace archytech99\Controller;

class AboutController
{
    public function index()
    {
        $data['nama'] = 'Arief Budi Prasetyo';
        $data['hobi'] = ['Game', 'Coding'];
        $data['umur'] = '29';
        view('about/index', $data);
    }
}