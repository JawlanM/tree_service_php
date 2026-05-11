<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EmployeeServicesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EmployeeServicesTable Test Case
 */
class EmployeeServicesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\EmployeeServicesTable
     */
    protected $EmployeeServices;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.EmployeeServices',
        'app.Employee',
        'app.Services',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('EmployeeServices') ? [] : ['className' => EmployeeServicesTable::class];
        $this->EmployeeServices = $this->getTableLocator()->get('EmployeeServices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->EmployeeServices);

        parent::tearDown();
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\EmployeeServicesTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
