<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * GrupoFixture
 *
 */
class GrupoFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'grupo';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'data_adesao' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'id_usuario' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_plano' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_usuario' => ['type' => 'index', 'columns' => ['id_usuario'], 'length' => []],
            'id_plano' => ['type' => 'index', 'columns' => ['id_plano'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'grupo_ibfk_1' => ['type' => 'foreign', 'columns' => ['id_usuario'], 'references' => ['usuario', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'grupo_ibfk_2' => ['type' => 'foreign', 'columns' => ['id_plano'], 'references' => ['plano', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'data_adesao' => '2018-11-26 23:55:44',
                'id_usuario' => 1,
                'id_plano' => 1
            ],
        ];
        parent::init();
    }
}
