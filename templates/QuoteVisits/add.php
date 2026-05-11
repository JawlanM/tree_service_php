<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteVisit $quoteVisit
 * @var \Cake\Collection\CollectionInterface|string[] $enquiries
 * @var \Cake\Collection\CollectionInterface|string[] $staffs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Quote Visits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quoteVisits form content">
            <?= $this->Form->create($quoteVisit) ?>
            <fieldset>
                <legend><?= __('Add Quote Visit') ?></legend>
                <?php
                echo $this->Form->control('enquiry_id', [
                    'options' => $contactMessages,
                    'label' => 'Select Enquiry'
                ]);

                echo $this->Form->control('staff_id', [
                    'options' => $staff,
                    'label' => 'Assign Staff Member'
                ]);

                echo $this->Form->control('visit_date', [
                    'type' => 'date'
                ]);

                echo $this->Form->control('visit_time', [
                    'type' => 'time'
                ]);

                echo $this->Form->control('location');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
