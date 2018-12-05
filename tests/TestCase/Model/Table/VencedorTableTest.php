<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VencedorTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VencedorTable Test Case
 */
class VencedorTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VencedorTable
     */
    public $Vencedor;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vencedor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Vencedor') ? [] : ['className' => VencedorTable::class];
        $this->Vencedor = TableRegistry::getTableLocator()->get('Vencedor', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Vencedor);

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
