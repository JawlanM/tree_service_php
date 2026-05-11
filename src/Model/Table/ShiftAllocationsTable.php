<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShiftAllocations Model
 *
 * @property \App\Model\Table\ShiftsTable&\Cake\ORM\Association\BelongsTo $Shifts
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employee
 *
 * @method \App\Model\Entity\ShiftAllocation newEmptyEntity()
 * @method \App\Model\Entity\ShiftAllocation newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ShiftAllocation> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShiftAllocation get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ShiftAllocation findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ShiftAllocation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ShiftAllocation> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShiftAllocation|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ShiftAllocation saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftAllocation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftAllocation>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftAllocation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftAllocation> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftAllocation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftAllocation>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftAllocation>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftAllocation> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ShiftAllocationsTable extends Table
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

        $this->setTable('shift_allocations');
        $this->setDisplayField('status');
        $this->setPrimaryKey('id');

        $this->belongsTo('Shifts', [
            'foreignKey' => 'shift_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Employees', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
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
            ->integer('shift_id')
            ->notEmptyString('shift_id');

        $validator
            ->integer('employee_id')
            ->notEmptyString('employee_id');

        $validator
            ->scalar('status')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_time')
            ->allowEmptyDateTime('created_time');

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
        $rules->add($rules->isUnique(['shift_id', 'employee_id']), ['errorField' => 'shift_id', 'message' => __('This combination of shift_id and employee_id already exists')]);
        $rules->add($rules->existsIn(['shift_id'], 'Shifts'), ['errorField' => 'shift_id']);
        $rules->add($rules->existsIn(['employee_id'], 'Employees'), ['errorField' => 'employee_id']);

        return $rules;
    }
}
