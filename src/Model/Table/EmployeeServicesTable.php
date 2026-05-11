<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EmployeeServices Model
 *
 * @property \App\Model\Table\EmployeesTable&\Cake\ORM\Association\BelongsTo $Employee
 * @property \App\Model\Table\ServicesTable&\Cake\ORM\Association\BelongsTo $Services
 *
 * @method \App\Model\Entity\EmployeeService newEmptyEntity()
 * @method \App\Model\Entity\EmployeeService newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\EmployeeService> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeService get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\EmployeeService findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\EmployeeService patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\EmployeeService> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\EmployeeService|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\EmployeeService saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\EmployeeService>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmployeeService>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmployeeService>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmployeeService> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmployeeService>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmployeeService>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\EmployeeService>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\EmployeeService> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EmployeeServicesTable extends Table
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

        $this->setTable('employee_services');
        $this->setDisplayField(['employee_id', 'service_id']);
        $this->setPrimaryKey(['employee_id', 'service_id']);

        $this->belongsTo('Employee', [
            'foreignKey' => 'employee_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Services', [
            'foreignKey' => 'service_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['employee_id'], 'Employee'), ['errorField' => 'employee_id']);
        $rules->add($rules->existsIn(['service_id'], 'Services'), ['errorField' => 'service_id']);

        return $rules;
    }
}
