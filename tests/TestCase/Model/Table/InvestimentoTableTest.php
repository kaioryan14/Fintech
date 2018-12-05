<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\InvestimentoTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InvestimentoTable Test Case
 */
class InvestimentoTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\InvestimentoTable
     */
    public $Investimento;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.investimento'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Investimento') ? [] : ['className' => InvestimentoTable::class];
        $this->Investimento = TableRegistry::getTableLocator()->get('Investimento', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Investimento);

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
