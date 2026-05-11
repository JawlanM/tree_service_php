<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ShiftsEquipment> $shiftsEquipment
 */
?>
<div class="shiftsEquipment index content">
    <?= $this->Html->link(__('New Shifts Equipment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Shifts Equipment') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('shift_id') ?></th>
                    <th><?= $this->Paginator->sort('equipment_id') ?></th>
                    <th><?= $this->Paginator->sort('created_time') ?></th>
                    <th><?= $this->Paginator->sort('last_modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($shiftsEquipment as $shiftsEquipmentEntity): ?>
                <tr>
                    <td><?= $this->Number->format($shiftsEquipmentEntity->id) ?></td>
                    <td><?= $shiftsEquipmentEntity->hasValue('shift') ? $this->Html->link($shiftsEquipmentEntity->shift->id, ['controller' => 'Shifts', 'action' => 'view', $shiftsEquipmentEntity->shift->id]) : '' ?></td>
                    <td><?= $shiftsEquipmentEntity->hasValue('equipment') ? $this->Html->link($shiftsEquipmentEntity->equipment->type, ['controller' => 'Equipment', 'action' => 'view', $shiftsEquipmentEntity->equipment->id]) : '' ?></td>
                    <td><?= h($shiftsEquipmentEntity->created_time) ?></td>
                    <td><?= h($shiftsEquipmentEntity->last_modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $shiftsEquipmentEntity->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $shiftsEquipmentEntity->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $shiftsEquipmentEntity->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $shiftsEquipmentEntity->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>