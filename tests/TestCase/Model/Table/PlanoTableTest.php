<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PlanoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlanoTable Test Case
 */
class PlanoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PlanoTable
     */
    public $Plano;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.plano'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Plano') ? [] : ['className' => PlanoTable::class];
        $this->Plano = TableRegistry::getTableLocator()->get('Plano', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Plano);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
