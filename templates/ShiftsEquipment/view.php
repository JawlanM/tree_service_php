<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShiftsEquipment $shiftsEquipmentEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Shifts Equipment'), ['action' => 'edit', $shiftsEquipmentEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Shifts Equipment'), ['action' => 'delete', $shiftsEquipmentEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shiftsEquipmentEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shifts Equipment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Shifts Equipment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shiftsEquipment view content">
            <h3><?= h($shiftsEquipmentEntity->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Shift') ?></th>
                    <td><?= $shiftsEquipmentEntity->hasValue('shift') ? $this->Html->link($shiftsEquipmentEntity->shift->id, ['controller' => 'Shifts', 'action' => 'view', $shiftsEquipmentEntity->shift->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Equipment') ?></th>
                    <td><?= $shiftsEquipmentEntity->hasValue('equipment') ? $this->Html->link($shiftsEquipmentEntity->equipment->type, ['controller' => 'Equipment', 'action' => 'view', $shiftsEquipmentEntity->equipment->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shiftsEquipmentEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Time') ?></th>
                    <td><?= h($shiftsEquipmentEntity->created_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Modified') ?></th>
                    <td><?= h($shiftsEquipmentEntity->last_modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>