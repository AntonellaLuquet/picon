<?php

class cProfile extends cGeneral
{
    public function __construct()
    {
        parent::__construct ();
    }

    public function index()
    {
        $this->load->view ('template/header');
        $this->load->view ('template/menu');
        $this->load->view ('template/menu-modal');
        $this->load->view ('profile/profile');
        $this->load->view ('template/footer');
    }
}