<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShiftAllocationsFixture
 */
class ShiftAllocationsFixture extends TestFixture
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
                'shift_id' => 1,
                'employee_id' => 1,
                'status' => 'Lorem ipsum dolor sit amet',
                'created_time' => '2026-03-22 16:14:51',
            ],
        ];
        parent::init();
    }
}
