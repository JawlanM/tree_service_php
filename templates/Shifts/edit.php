<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 * @var string[]|\Cake\Collection\CollectionInterface $services
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $shift->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $shift->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Shifts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shifts form content">
            <?= $this->Form->create($shift) ?>
            <fieldset>
                <legend><?= __('Edit Shift') ?></legend>
                <?php
                    echo $this->Form->control('shift_date');
                    echo $this->Form->control('shift_type');
                    echo $this->Form->control('start_time');
                    echo $this->Form->control('end_time');
                    echo $this->Form->control('service_id', ['options' => $services, 'empty' => true]);
                    echo $this->Form->control('location');
                    echo $this->Form->control('notes');
                    echo $this->Form->control('created_time', ['empty' => true]);
                echo $this->Form->control('employees._ids', [
                    'type' => 'select',
                    'multiple' => 'checkbox',
                    'options' => $employees,
                    'label' => 'Assign Employee'
                ]);
                echo $this->Form->control('status', [
                    'type' => 'select',
                    'options' => [
                        'pending' => 'Pending',
                        'active' => 'Active',
                        'complete' => 'Complete'
                    ], 'default' => 'pending', 'label' => 'Status'
                ]);
                echo $this->Form->control('equipment._ids', [
                    'type' => 'select',
                    'multiple' => 'checkbox',
                    'options' => $equipment,
                    'label' => 'Assign Equipment',
                ]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
