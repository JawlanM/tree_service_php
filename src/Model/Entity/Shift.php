<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Shift Entity
 *
 * @property int $id
 * @property \Cake\I18n\Date $shift_date
 * @property string|null $shift_type
 * @property \Cake\I18n\Time $start_time
 * @property \Cake\I18n\Time $end_time
 * @property int|null $service_id
 * @property string|null $location
 * @property string|null $notes
 * @property \Cake\I18n\DateTime|null $created_time
 *
 * @property \App\Model\Entity\Service $service
 * @property \App\Model\Entity\ShiftAllocation[] $shift_allocations
 */
class Shift extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'shift_date' => true,
        'shift_type' => true,
        'start_time' => true,
        'end_time' => true,
        'service_id' => true,
        'location' => true,
        'notes' => true,
        'created_time' => true,
        'service' => true,
        'shift_allocations' => true,
        '*' => true,
        'id' => false,
    ];

}
