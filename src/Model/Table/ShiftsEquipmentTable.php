<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ShiftsEquipment Model
 *
 * @property \App\Model\Table\ShiftsTable&\Cake\ORM\Association\BelongsTo $Shifts
 * @property \App\Model\Table\EquipmentTable&\Cake\ORM\Association\BelongsTo $Equipment
 *
 * @method \App\Model\Entity\ShiftsEquipment newEmptyEntity()
 * @method \App\Model\Entity\ShiftsEquipment newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\ShiftsEquipment> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ShiftsEquipment get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\ShiftsEquipment findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\ShiftsEquipment patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\ShiftsEquipment> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\ShiftsEquipment|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\ShiftsEquipment saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftsEquipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftsEquipment>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftsEquipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftsEquipment> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftsEquipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftsEquipment>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\ShiftsEquipment>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\ShiftsEquipment> deleteManyOrFail(iterable $entities, array $options = [])
 */
class ShiftsEquipmentTable extends Table
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

        $this->setTable('shifts_equipment');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Shifts', [
            'foreignKey' => 'shift_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Equipment', [
            'foreignKey' => 'equipment_id',
            'joinType' => 'INNER',
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
            ->integer('equipment_id')
            ->notEmptyString('equipment_id');

        $validator
            ->dateTime('created_time')
            ->allowEmptyDateTime('created_time');

        $validator
            ->dateTime('last_modified')
            ->allowEmptyDateTime('last_modified');

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
        $rules->add($rules->existsIn(['shift_id'], 'Shifts'), ['errorField' => 'shift_id']);
        $rules->add($rules->existsIn(['equipment_id'], 'Equipment'), ['errorField' => 'equipment_id']);

        return $rules;
    }
}
