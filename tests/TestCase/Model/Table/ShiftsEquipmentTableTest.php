<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShiftsEquipmentTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShiftsEquipmentTable Test Case
 */
class ShiftsEquipmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ShiftsEquipmentTable
     */
    protected $ShiftsEquipment;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.ShiftsEquipment',
        'app.Shifts',
        'app.Equipment',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('ShiftsEquipment') ? [] : ['className' => ShiftsEquipmentTable::class];
        $this->ShiftsEquipment = $this->getTableLocator()->get('ShiftsEquipment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->ShiftsEquipment);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\ShiftsEquipmentTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\ShiftsEquipmentTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
