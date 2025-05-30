<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_data_guru extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id' => [
                'type' => 'INT',
                'auto_increment' => TRUE
            ],
            'nama_guru' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nip' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'jk' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tempat_lahir' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'tgl_lahir' => [
                'type' => 'DATE',
            ],
            'alamat' => [
                'type' => 'TEXT',
            ],
            'no_hp' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('data_guru');
    }

    public function down()
    {
        $this->dbforge->drop_table('data_guru');
    }
}












?>