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

	public function search($query)
	{

		$data = TableRegistry::get('Products')
								->find()
							    ->where(['product_name LIKE ' => '%' . $query . '%'])
							    ->first();

	    $this->autoRender = false;

	    echo json_encode(array($data));
    }
}