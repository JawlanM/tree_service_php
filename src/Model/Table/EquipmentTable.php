<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Equipment Model
 *
 * @method \App\Model\Entity\Equipment newEmptyEntity()
 * @method \App\Model\Entity\Equipment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Equipment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Equipment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Equipment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Equipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Equipment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Equipment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Equipment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Equipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Equipment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class EquipmentTable extends Table
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

        $this->setTable('equipment');
        $this->setDisplayField('type');
        $this->setPrimaryKey('id');
        $this->belongsToMany('Shifts', [
            'joinTable' => 'shifts_equipment',
            'foreignKey' => 'equipment_id',
            'targetForeignKey' => 'shift_id',
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
            ->scalar('type')
            ->maxLength('type', 100)
            ->requirePresence('type', 'create')
            ->notEmptyString('type')
            ->add('type', 'notBlankSpaces', [
                'rule' => function ($value) {
                    return trim($value) !== '';
                },
                'message' => 'Equipment type cannot be empty or just spaces'
            ]);


        $validator
            ->inList('status', ['available', 'broken','using'])
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->dateTime('created_time')
            ->allowEmptyDateTime('created_time');

        $validator
            ->dateTime('last_modified')
            ->allowEmptyDateTime('last_modified');

        return $validator;
    }

    public function beforeDelete($event, $entity, $options)
    {
        $shiftEquipTable = $this->getAssociation('Shifts')->junction();

        $count = $shiftEquipTable->find()
            ->where(['equipment_id' => $entity->id])
            ->count();

        if ($count > 0) {
            $event->stopPropagation();
            $entity->setError('type', 'Cannot delete equipment assigned to shifts');
            return false;
        }
    }
}
