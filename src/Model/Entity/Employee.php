<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Employee Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $status
 * @property \Cake\I18n\DateTime|null $created_time
 * @property \Cake\I18n\DateTime|null $last_modified
 *
 * @property \App\Model\Entity\Service[] $services
 * @property \App\Model\Entity\EmployeeService[] $employee_services
 * @property \App\Model\Entity\ShiftAllocation[] $shift_allocations
 * @property \App\Model\Entity\Shift[] $shifts
 */
class Employee extends Entity
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
        'name' => true,
        'email' => true,
        'phone' => true,
        'status' => true,
        'created_time' => true,
        'last_modified' => true,
        'services' => true,
        'employee_services' => true,
        'shift_allocations' => true,
        'shifts' => true,
    ];
}
