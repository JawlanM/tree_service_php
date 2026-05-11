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
            <?= $this->Html->link(__('List Equipment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="equipment form content">
            <?= $this->Form->create($equipmentEntity) ?>
            <fieldset>
                <legend><?= __('Add Equipment') ?></legend>
                <?php
                    echo $this->Form->control('type');
                    echo $this->Form->control('status', [
                        'type' => 'select',
                        'options' => [
                            'available' => 'Available',
                            'broken' => 'Broken'
                        ]
                    ]);
                    echo $this->Form->control('created_time', ['empty' => true]);
                    echo $this->Form->control('last_modified', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
