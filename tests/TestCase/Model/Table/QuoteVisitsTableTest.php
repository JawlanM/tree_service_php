<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\QuoteVisitsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\QuoteVisitsTable Test Case
 */
class QuoteVisitsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\QuoteVisitsTable
     */
    protected $QuoteVisits;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.QuoteVisits',
        'app.Enquiries',
        'app.Staffs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('QuoteVisits') ? [] : ['className' => QuoteVisitsTable::class];
        $this->QuoteVisits = $this->getTableLocator()->get('QuoteVisits', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->QuoteVisits);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @link \App\Model\Table\QuoteVisitsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @link \App\Model\Table\QuoteVisitsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
