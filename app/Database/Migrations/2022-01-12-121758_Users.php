<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'idUsers' => [
                'type' => 'INT',
                'constraint' => 11,
                'auto_increment' => true
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 20,

            ],
            'namaLengkap' => [
                'type' => 'VARCHAR',
                'constraint' => 30,

            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 100,

            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 100,

            ]
        ]);
        $this->forge->addKey('idUsers');
        $this->forge->createTable('Users');
    }

    public function down()
    {
        //
    }
}