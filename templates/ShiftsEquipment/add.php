<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShiftsEquipment $shiftsEquipmentEntity
 * @var \Cake\Collection\CollectionInterface|string[] $shifts
 * @var \Cake\Collection\CollectionInterface|string[] $equipment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Shifts Equipment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shiftsEquipment form content">
            <?= $this->Form->create($shiftsEquipmentEntity) ?>
            <fieldset>
                <legend><?= __('Add Shifts Equipment') ?></legend>
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
