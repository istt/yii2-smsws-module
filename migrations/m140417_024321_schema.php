<?php

use yii\db\Schema;

class m140417_024321_schema extends \yii\db\Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
    	}
    	// companies
    	$this->createTable('{{%template}}',[
    			'id' => Schema::TYPE_PK,
    			'title' => Schema::TYPE_STRING,
    			'description' => Schema::TYPE_TEXT,
    			'created_at' => Schema::TYPE_INTEGER,
    			'created_by' => Schema::TYPE_INTEGER,
    			'updated_at' => Schema::TYPE_INTEGER,
    			'updated_by' => Schema::TYPE_INTEGER,
    	], $tableOptions);
    }

    public function down()
    {
    	$this->dropTable('{{%template}}');
    }
}
