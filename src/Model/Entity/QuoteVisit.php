<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuoteVisit Entity
 *
 * @property int $id
 * @property int $enquiry_id
 * @property int $staff_id
 * @property \Cake\I18n\Date $visit_date
 * @property \Cake\I18n\Time $visit_time
 * @property string $location
 * @property \Cake\I18n\DateTime|null $created_time
 * @property \Cake\I18n\DateTime|null $last_modified
 *
 * @property \App\Model\Entity\ContactMessage $enquiry
 * @property \App\Model\Entity\Employee $staff
 */
class QuoteVisit extends Entity
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
        'enquiry_id' => true,
        'staff_id' => true,
        'visit_date' => true,
        'visit_time' => true,
        'location' => true,
        'created_time' => true,
        'last_modified' => true,
        'enquiry' => true,
        'staff' => true,
    ];
}
