<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteVisit $quoteVisit
 * @var string[]|\Cake\Collection\CollectionInterface $enquiries
 * @var string[]|\Cake\Collection\CollectionInterface $staffs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $quoteVisit->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $quoteVisit->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Quote Visits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quoteVisits form content">
            <?= $this->Form->create($quoteVisit) ?>
            <fieldset>
                <legend><?= __('Edit Quote Visit') ?></legend>
                <?php
                    echo $this->Form->control('enquiry_id', ['options' => $enquiries]);
                    echo $this->Form->control('staff_id', ['options' => $staffs]);
                    echo $this->Form->control('visit_date');
                    echo $this->Form->control('visit_time');
                    echo $this->Form->control('location');
                    echo $this->Form->control('created_time', ['empty' => true]);
                    echo $this->Form->control('last_modified', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
