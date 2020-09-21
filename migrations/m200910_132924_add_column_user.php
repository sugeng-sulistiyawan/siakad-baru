<?php

use yii\db\Migration;

/**
 * Class m200910_132924_add_column_user
 */
class m200910_132924_add_column_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'verification_token', $this->string()->defaultValue(null));
        $this->addColumn('{{%user}}', 'kode_user', $this->string(32)->notNull()->unique());
        $this->addColumn('{{%user}}', 'nama_lengkap', $this->string(128));
        $this->addColumn('{{%user}}', 'no_hp', $this->string(32));
        $this->addColumn('{{%user}}', 'photo', $this->string());
        $this->addColumn('{{%user}}', 'jenis_kelamin', $this->string(16));
        $this->addColumn('{{%user}}', 'alamat', $this->string());
        $this->addColumn('{{%user}}', 'tentang', $this->string());
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'verification_token');
        $this->dropColumn('{{%user}}', 'nama_lengkap');
        $this->dropColumn('{{%user}}', 'no_hp');
        $this->dropColumn('{{%user}}', 'photo');
        $this->dropColumn('{{%user}}', 'jenis_kelamin');
        $this->dropColumn('{{%user}}', 'alamat');
        $this->dropColumn('{{%user}}', 'tentang');
    }
}
