<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Shift'), ['action' => 'edit', $shift->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Shift'), ['action' => 'delete', $shift->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shift->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Shifts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Shift'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="shifts view content">
            <h3><?= h($shift->id) ?></h3>
            <h3>Assigned Equipment</h3>
            <?php if (empty($shift->equipment)): ?>
                <p>No equipment assigned.</p>
            <?php else: ?>
                <ul>
                    <?php foreach ($shift->equipment as $item): ?>
                        <li><?= h($item->type) ?> (<?= h($item->status) ?>)</li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <table>
                <tr>
                    <th><?= __('Shift Type') ?></th>
                    <td><?= h($shift->shift_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Service') ?></th>
                    <td><?= $shift->hasValue('service') ? h($shift->service->name) : '—' ?></td>
                </tr>
                <tr>
                    <th><?= __('Location') ?></th>
                    <td><?= h($shift->location) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($shift->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Shift Date') ?></th>
                    <td><?= h($shift->shift_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start Time') ?></th>
                    <td><?= h($shift->start_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('End Time') ?></th>
                    <td><?= h($shift->end_time) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created Time') ?></th>
                    <td><?= $shift->created_time->modify('-2 hours')->format('d M Y, g:i A') ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($shift->notes)); ?>
                </blockquote>
            </div>
            <table>
                <tr>
                    <th>Status</th>
                    <td><?= h($shift->status) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Shift Allocations') ?></h4>
                <?php if (!empty($shift->shift_allocations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Employee Id') ?></th>
                            <th><?= __('Status') ?></th>

                        </tr>
                        <?php foreach ($shift->shift_allocations as $shiftAllocation) : ?>
                            <?= date_default_timezone_get() ?>
                        <tr>
                            <td><?= h($shiftAllocation->id) ?></td>
                            <td><?= h($shiftAllocation->employee->name) ?></td>
                            <td><?= h($shiftAllocation->status) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
