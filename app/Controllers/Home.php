<?php namespace App\Controllers;
use CodeIgniter\HTTP\IncomingRequest;
class Home extends BaseController
{
	private $db;
	public function __construct()
	{
		$this->db = \Config\Database::connect();
	}
	public function index()
	{
		$builder = $this->db->table('categories');
		$query   = $builder->getWhere(['parent_id' => 0]);
		$data['cats'] = $query->getResult();
		return view('task',$data);
	}


	public function getSub()
	{
		$request = service('request');
		$builder = $this->db->table('categories');
		$query   = $builder->getWhere(['parent_id' => $request->getPost('id')]);
		$data['subCats'] = $query->getResult();
		return view('ajax/subCats',$data);
	}

	//--------------------------------------------------------------------

}
