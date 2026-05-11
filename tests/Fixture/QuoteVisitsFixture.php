<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * QuoteVisitsFixture
 */
class QuoteVisitsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'enquiry_id' => 1,
                'staff_id' => 1,
                'visit_date' => '2026-04-20',
                'visit_time' => '22:26:34',
                'location' => 'Lorem ipsum dolor sit amet',
                'created_time' => '2026-04-20 22:26:34',
                'last_modified' => '2026-04-20 22:26:34',
            ],
        ];
        parent::init();
    }
}
