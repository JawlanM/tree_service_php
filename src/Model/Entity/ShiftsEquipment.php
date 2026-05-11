<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ShiftsEquipment Entity
 *
 * @property int $id
 * @property int $shift_id
 * @property int $equipment_id
 * @property \Cake\I18n\DateTime|null $created_time
 * @property \Cake\I18n\DateTime|null $last_modified
 *
 * @property \App\Model\Entity\Shift $shift
 * @property \App\Model\Entity\Equipment $equipment
 */
class ShiftsEquipment extends Entity
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
        'shift_id' => true,
        'equipment_id' => true,
        'created_time' => true,
        'last_modified' => true,
        'shift' => true,
        'equipment' => true,
    ];
}
