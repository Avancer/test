<?php // if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends MY_Controller {

	function __construct()
	{

/*
		parent::__construct();
		$this->header['author'] = 'S**OM';
		$this->header['title']  = 'ポータル -S**l-';
*/
/*
		$this->load->library('table');
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->helper('url');
*/
		//		$this->output->enable_profiler(TRUE);//デバッグ情報表示
	}



	public function index()
	{
		$this->load->view('login');
/*
		$this->load->view('header',$this->header);
		$this->load->view('navbar');
		$this->load->view('index');
*/
	}

	public function login()
	{
		$this->load->view('login');
	}
}
