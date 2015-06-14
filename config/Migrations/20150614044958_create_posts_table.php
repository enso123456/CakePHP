<?php

use Phinx\Migration\AbstractMigration;
use Cake\ORM\TableRegistry;

class CreatePostsTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
    public function change()
    {
    }
    */
    
    /**
     * Migrate Up.
     */
    public function up()
    {
        $product = $this->table('products');

        $product->addColumn('product_no','string',array('limit' => '255'))
                ->addColumn('product_name','string',array('limit' => '255'))
                ->addColumn('value','string',array('limit' => '255'))
                ->addColumn('variant','string')
                ->addColumn('pricing','string')
                ->addColumn('image','string')
                ->save();

        $modelName = 'products';

        $data = [
            [
                'product_no' => '1', 
                'product_name' => 'Acer Aspire i5', 
                'value' => '2',
                'variant' => 'Laptop',
                'pricing' => '25000',
                'image' => 'acer.jpg'
            ], [
                'product_no' => '2', 
                'product_name' => 'ASUS ROG', 
                'value' => '42',
                'variant' => 'Laptop',
                'pricing' => '99,500',
                'image' => 'asus.jpg'
            ], [
               'product_no' => '3', 
                'product_name' => 'DELL INSPIRON i5', 
                'value' => '32',
                'variant' => 'Laptop',
                'pricing' => '30,500',
                'image' => 'dell.jpg'
            ], [
               'product_no' => '4', 
                'product_name' => 'SONY VAIO X - Series', 
                'value' => '12',
                'variant' => 'Laptop',
                'pricing' => '80,000',
                'image' => 'vaio.jpg'
            ], [
               'product_no' => '5', 
                'product_name' => 'Lenovo Ideapad', 
                'value' => '5',
                'variant' => 'Laptop',
                'pricing' => '80,000',
                'image' => 'lenovo.jpg'
            ]
        ];

        $table = TableRegistry::get($modelName);
        $entities = $table->newEntities($data);
        // In a controller.
        foreach ($entities as $entity) {
            // Save entity
            $table->save($entity);
        }  
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $this->dropTable('products');
    }

}