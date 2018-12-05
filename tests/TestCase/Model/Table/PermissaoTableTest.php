<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PermissaoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PermissaoTable Test Case
 */
class PermissaoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PermissaoTable
     */
    public $Permissao;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.permissao'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Permissao') ? [] : ['className' => PermissaoTable::class];
        $this->Permissao = TableRegistry::getTableLocator()->get('Permissao', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Permissao);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
