<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Shifts Model
 *
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 * @property \App\Model\Table\ShiftAllocationsTable&\Cake\ORM\Association\HasMany $ShiftAllocations
 *
 * @method \App\Model\Entity\Shift newEmptyEntity()
 * @method \App\Model\Entity\Shift newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Shift> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Shift get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Shift findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Shift patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Shift> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Shift|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Shift saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Shift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shift>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shift> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shift>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Shift>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Shift> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ShiftsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('shifts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
        ]);
        $this->hasMany('ShiftAllocations', [
            'foreignKey' => 'shift_id',
        ]);
        $this->belongsToMany('Employees', [
            'through' => 'ShiftAllocations',
            'foreignKey' => 'shift_id',
            'targetForeignKey' => 'employee_id',
        ]);
        $this->belongsToMany('Equipment', [
            'joinTable' => 'shifts_equipment',
            'foreignKey' => 'shift_id',
            'targetForeignKey' => 'equipment_id',
        ]);
        $this->addBehavior('Timestamp');
        $this->belongsTo('Enquiries', [
            'foreignKey' => 'enquiry_id',
            'className' => 'ContactMessages',
        ]);
        $this->belongsTo('Customers', [
            'foreignKey' => 'customer_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {


        $validator
            ->scalar('shift_type')
            ->allowEmptyString('shift_type');

        $validator
            ->time('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyTime('start_time');

        $validator
            ->time('end_time')
            ->requirePresence('end_time', 'create')
            ->notEmptyTime('end_time', 'Please select a start time and duration.');

        $validator
            ->integer('service_id')
            ->allowEmptyString('service_id');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->notEmptyString('location', 'Location is required.');

        $validator
            ->scalar('notes')
            ->allowEmptyString('notes');

        $validator
            ->dateTime('created_time')
            ->allowEmptyDateTime('created_time');
        $validator
            ->date('shift_date', ['ymd'], 'Please enter a valid date (e.g. 2026-04-22).')
            ->requirePresence('shift_date', 'create')
            ->notEmptyDate('shift_date', 'Date is required.');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        $rules->add(function ($entity, $options) {
            if (!empty($entity->start_time) && !empty($entity->end_time)) {
                if ($entity->end_time <= $entity->start_time) {
                    $entity->setError('end_time', 'End time must be after start time.');
                    return false;
                }
            }
            return true;
        }, 'validDuration', ['errorField' => 'end_time']);

        return $rules;
    }
}
