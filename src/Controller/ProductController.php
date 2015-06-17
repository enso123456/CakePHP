<?php 
namespace App\Controller;

use Cake\ORM\TableRegistry;
 
class ProductController extends AppController
{

	public function initialize() {
	    parent::initialize();

	    $this->loadComponent('RequestHandler');
  	}

	public function index()
	{
		$query = TableRegistry::get('Products')->find();
		
		$this->set('products', $query);
	}

	public function get() {
		$query = TableRegistry::get('Products')->find();

		$this->autoRender = false;
	   echo json_encode($query);
	}

	public function search($query)
	{
		$search = preg_split("/[\s,]+/", $query);

		$data = TableRegistry::get('Products')
								->find('all')
								->where(['product_name LIKE ' => '%' . $query . '%'])
								->orWhere(['product_no Like' => '%' . $query . '%'])
								->orWhere(['value Like' => '%' . $query . '%'])
								->first();

	   $this->autoRender = false;
	   echo json_encode(array($data));
    }
}