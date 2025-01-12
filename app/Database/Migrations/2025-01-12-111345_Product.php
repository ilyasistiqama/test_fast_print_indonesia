<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_product' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'product_name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'price' => [
                'type' => 'INT',
                'constraint' => '11',
                'null' => true,
            ],
            'category_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'status_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'synced_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id_product', true);
        $this->forge->addForeignKey('category_id', 'category', 'id_category', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('status_id', 'status', 'id_status', 'CASCADE', 'CASCADE');
        $this->forge->createTable('product');
    }

    public function down()
    {
        $this->forge->dropTable('product');
    }
}
