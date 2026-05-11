<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ShiftsEquipmentFixture
 */
class ShiftsEquipmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public string $table = 'shifts_equipment';
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
                'equipment_id' => 1,
                'created_time' => '2026-04-22 21:23:48',
                'last_modified' => '2026-04-22 21:23:48',
            ],
        ];
        parent::init();
    }
}
