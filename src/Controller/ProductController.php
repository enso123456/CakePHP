<?php 
namespace App\Controller;

use Cake\ORM\TableRegistry;
 
class ProductController extends AppController
{

	public function index()
	{
		$query = TableRegistry::get('Products')->find();
		
		$this->set('products', $query);
	}

	public function search($query)
	{
		$this->render();
	}
}