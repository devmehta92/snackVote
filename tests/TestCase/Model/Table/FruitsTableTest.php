<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FruitsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FruitsTable Test Case
 */
class FruitsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FruitsTable
     */
    public $Fruits;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.fruits',
        'app.votes',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Fruits') ? [] : ['className' => FruitsTable::class];
        $this->Fruits = TableRegistry::get('Fruits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Fruits);

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
