<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShiftsEquipment $shiftsEquipmentEntity
 * @var string[]|\Cake\Collection\CollectionInterface $shifts
 * @var string[]|\Cake\Collection\CollectionInterface $equipment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shiftsEquipmentEntity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shiftsEquipmentEntity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shifts Equipment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shiftsEquipment form content">
            <?= $this->Form->create($shiftsEquipmentEntity) ?>
            <fieldset>
                <legend><?= __('Edit Shifts Equipment') ?></legend>
                <?php
                    echo $this->Form->control('shift_id', ['options' => $shifts]);
                    echo $this->Form->control('equipment_id', ['options' => $equipment]);
                    echo $this->Form->control('created_time', ['empty' => true]);
                    echo $this->Form->control('last_modified', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
