<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Equipment $equipmentEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Equipment'), ['action' => 'edit', $equipmentEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Equipment'), ['action' => 'delete', $equipmentEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $equipmentEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Equipment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Equipment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="equipment view content">
            <h3><?= h($equipmentEntity->type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Type') ?></th>
                    <td><?= h($equipmentEntity->type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($equipmentEntity->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($equipmentEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Time') ?></th>
                    <td><?= h($equipmentEntity->created_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Modified') ?></th>
                    <td><?= h($equipmentEntity->last_modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>