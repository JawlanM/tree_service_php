<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\QuoteVisit $quoteVisit
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Quote Visit'), ['action' => 'edit', $quoteVisit->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Quote Visit'), ['action' => 'delete', $quoteVisit->id], ['confirm' => __('Are you sure you want to delete # {0}?', $quoteVisit->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Quote Visits'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Quote Visit'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="quoteVisits view content">
            <h3><?= h($quoteVisit->location) ?></h3>
            <table>
                <tr>
                    <th><?= __('Enquiry') ?></th>
                    <td><?= $quoteVisit->hasValue('enquiry') ? $this->Html->link($quoteVisit->enquiry->title, ['controller' => 'ContactMessages', 'action' => 'view', $quoteVisit->enquiry->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Staff') ?></th>
                    <td><?= $quoteVisit->hasValue('staff') ? $this->Html->link($quoteVisit->staff->name, ['controller' => 'Employee', 'action' => 'view', $quoteVisit->staff->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($quoteVisit->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($quoteVisit->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visit Date') ?></th>
                    <td><?= h($quoteVisit->visit_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Visit Time') ?></th>
                    <td><?= h($quoteVisit->visit_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Time') ?></th>
                    <td><?= h($quoteVisit->created_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Modified') ?></th>
                    <td><?= h($quoteVisit->last_modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
