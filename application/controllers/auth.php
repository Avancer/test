<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 最初に呼ばれるクラス
 * ログイン画面
 * 
 * @property $login_url ログイン画面のURL
 * @property $base_url  アプリケーションのベースURL(http(s)://~/sail)
 */
class Auth extends CI_Controller
{
	private $login_url  = '';
	private $base_url   = '';
	/**
	 * コンストラクタ
	 * 
	 * @access public
	 * @return void
	 */
/*
 	public function __construct()
	{
		parent::__construct();
		$this->header['author'] = "SECOM";
		$this->header['title']  = "Sail ユーザーログイン";

		// Load database libs
		//$this->load->database();
		$this->load->library(array('modules/auth/VPN_auth'));
		$this->load->helper(array('form', 'log'));

		$this->login_url = $this->config->item('login_url');
		$this->base_url  = $this->config->item('base_url');

		$this->master_db = $this->load->database('master', TRUE);
		$this->slave_db  = $this->load->database('slave', TRUE);

		$this->_fetch_next();
	}
*/

	/**
	 * ログイン画面
	 * 
	 * セッションをリセットし、必要に応じて端末IDをCookieにセットします。
	 * 
	 * @param  string  $next    ログイン後にアクセスするコントローラ名
	 * @param  string  $method  ログイン後にアクセスするコントローラのメソッド名
	 * @param  string  $id      ログイン後にアクセスするコントローラのメソッドへ渡す引数
	 * 
	 * @return void
	 */
	public function index()
	{
		

		$this->load->helper('form');
		$this->load->view('navbar');
		$this->load->view('header');
//		$this->load->view('menu');
//		$this->load->view('content', $data);

		$this->load->view('login');
		$this->load->view('footer');

/*
		$this->session_auth->logout();

		if ($this->session_auth->fetch_terminal_id())
		{
			$this->session_auth->set_terminal_id();
		}

		$this->_load_view();
*/
	}

	/**
	 * ログイン認証
	 * 
	 * POSTされたユーザ名とパスワードでログイン認証を行います。
	 * 認証に成功した場合、APIトークンを発行します。
	 * 
	 * @access public
	 * @param  string  $next    ログイン後にアクセスするコントローラ名
	 * @param  string  $method  ログイン後にアクセスするコントローラのメソッド名
	 * @param  string  $id      ログイン後にアクセスするコントローラのメソッドへ渡す引数
	 * @return void
	 * 
	 */
	public function login()
	{
/*
		$username = $data['user_id']  = $this->input->post('user_id');
		$password = $data['password'] = $this->input->post('password');

		$tid      = $this->input->cookie('tid', TRUE);

		if ($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$next = $this->input->post('next');
		}

		$this->session_auth->set_username($this->input->post('user_id'));
		$this->session_auth->set_password($this->input->post('password'));

		if ($this->session_auth->login())
		{
			// vpnセッションを張る
			$this->vpn_auth->login();

			// 無限ログイン画面を避ける
			if ($this->session->flashdata('next_url') == 'auth/login')
				redirect('');

			redirect($this->session->flashdata('next_url'));
		}

		$data['next'] = $this->session->flashdata('next_url');

		$this->_load_view($data);
*/
	}

	/**
	 * ログアウト処理
	 * 
	 * セッション情報を無効化したのち、ログイン画面へリダイレクトします。
	 * 
	 * @access public
	 * @return void
	 * 
	 */
	public function logout()
	{
		$this->session_auth->logout();
		clog($this->session->userdata, 'logout', 'ユーザがログアウトしました。');

		redirect($this->login_url);
	}

	/**
	 * ログイン後にアクセスする画面を取得する。
	 * 
	 * @access private
	 * @return type
	 */
	private function _fetch_next()
	{
		if ($this->session->flashdata('next_url') == false)
		{
			$next_url = preg_replace('/^auth\/login\//', '', uri_string());
			$this->session->set_flashdata('next_url', $next_url);
		}
		else
		{
			$this->session->keep_flashdata('next_url');
		}
	}

	/**
	 * ビューのロード
	 * 
	 * ログイン画面はロードするビューが同じため、共通関数化しています。
	 * 
	 * @access private
	 * @param  array  $data  ビューへ引き渡すデータ
	 * @return void
	 */
	private function _load_view($data = array())
	{
//		$this->load->view('header', $this->header);
//		$this->load->view('login', $data);
	}
}
