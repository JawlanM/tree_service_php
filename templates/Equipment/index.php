<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Equipment> $equipment
 */
?>

<div class="dashboard-wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <?= $this->element('sidebar') ?>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <?= $this->Flash->render() ?>

        <div class="page-header">
            <div>
                <h1 class="page-title">Equipment</h1>
                <p class="page-subtitle">Manage inventory and tools</p>
            </div>

            <?= $this->Html->link(__('New Equipment'), ['action' => 'add'], ['class' => 'view-btn']) ?>
        </div>

        <!-- SUMMARY -->
        <div style="margin-bottom:20px; background:#fff; padding:15px; border-radius:12px; border:1px solid #E5E7EB;">
            <h3 style="margin-top:0;">Equipment Summary</h3>

            <?php if (!empty($summary)): ?>
                <ul>
                    <?php foreach ($summary as $item): ?>
                        <li><?= h($item->type) ?>: <?= h($item->count) ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="color:#6b7280; font-style:italic;">No equipment in inventory.</p>
            <?php endif; ?>
            <?php if ($brokenCount > 0): ?>
                <div style="
        margin-bottom: 20px;
        padding: 12px 16px;
        background: #fee2e2;
        border: 1px solid #fca5a5;
        color: #991b1b;
        border-radius: 12px;
        font-weight: 600;
    ">
                    ⚠️ Warning: <?= h($brokenCount) ?> equipment item(s) are marked as <strong>broken</strong>.
                </div>
            <?php endif; ?>

        </div>

        <!-- TABLE -->
        <div class="enquiries-table-wrap">


            <table class="enquiries-table">

                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('type') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('created_time') ?></th>
                    <th><?= $this->Paginator->sort('last_modified') ?></th>
                    <th>Actions</th>
                </tr>
                </thead>

                <tbody>

                <?php foreach ($equipment as $equipmentEntity): ?>
                    <tr>
                        <td><?= $this->Number->format($equipmentEntity->id) ?></td>
                        <td><?= h($equipmentEntity->type) ?></td>
                        <td><?= h($equipmentEntity->status) ?></td>
                        <td><?= h($equipmentEntity->created_time) ?></td>
                        <td><?= h($equipmentEntity->last_modified) ?></td>
                        <td class="td-action">
                            <?= $this->Html->link('View', ['action' => 'view', $equipmentEntity->id], ['class' => 'view-btn']) ?>
                            <?= $this->Html->link('Edit', ['action' => 'edit', $equipmentEntity->id], ['class' => 'view-btn']) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($equipment->toArray())): ?>
                    <tr>
                        <td colspan="6" class="no-results">No equipment found.</td>
                    </tr>
                <?php endif; ?>

                </tbody>

            </table>

        </div>

        <!-- PAGINATOR -->
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< First') ?>
                <?= $this->Paginator->prev('< Prev') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('Next >') ?>
                <?= $this->Paginator->last('Last >>') ?>
            </ul>

            <p class="page-counter">
                <?= $this->Paginator->counter('Page {{page}} of {{pages}} — {{count}} items') ?>
            </p>
        </div>

    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Jockey+One&display=swap');

    :root {
        --brand-green:      #1A4D1E;
        --brand-green-dark: #123515;
        --bg-light:         #F5F5F5;
        --card-bg:          #FFFFFF;
        --border-subtle:    #E5E7EB;
        --text-main:        #1F2933;
        --text-muted:       #6B7280;
    }

    body { margin: 0; padding: 0; }
    #header, nav.top-nav, .navbar, header { display: none !important;
        overflow: auto;}

    /* ── Layout ── */
    .dashboard-wrapper {
        display: flex;
        min-height: 100vh;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        width: 100%;
    }

    /* ── Sidebar ── */
    .sidebar {
        width: 240px;
        background: var(--brand-green);
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
    }
    .sidebar-header {
        padding: 28px 20px 24px;
        background: var(--brand-green-dark);
        text-align: center;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .sidebar-logo  { font-size: 2rem; display: block; margin-bottom: 6px; }
    .sidebar-title {
        margin: 0;
        font-family: 'Jockey One', sans-serif;
        font-size: 1.2rem;
        color: #fff;
        letter-spacing: 0.04em;
    }
    .sidebar-nav { display: flex; flex-direction: column; padding: 12px 0; flex: 1; }
    .nav-link {
        padding: 14px 22px;
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        font-size: 1.5rem;
        transition: background 0.15s, color 0.15s;
        border-left: 3px solid transparent;
    }
    .nav-link:hover {
        background: rgba(255,255,255,0.1);
        color: #fff;
        border-left-color: #fff;
    }
    .nav-link.active {
        background: rgba(255,255,255,0.15);
        color: #fff;
        border-left-color: #fff;
        font-weight: bold;
    }
    .logout {
        margin-top: auto;
        color: #f87171 !important;
    }
    .logout:hover {
        background: rgba(248,113,113,0.15) !important;
        border-left-color: #f87171 !important;
    }
    /* ── Main Content ── */
    .main-content {
        flex: 1;
        padding: 40px 44px;
        background: var(--bg-light);
        font-size: 1.5rem;
        overflow-y: auto;
    }

    /* ── Page Header ── */
    .page-header   { margin-bottom: 24px; }
    .page-title    {
        margin: 0 0 4px;
        font-family: 'Jockey One', sans-serif;
        font-size: 3rem;
        color: var(--brand-green);
        letter-spacing: 0.02em;
    }
    .page-subtitle { margin: 0; font-size: 1.6rem; color: var(--text-muted); }

    /* ── Table ── */
    .enquiries-table-wrap {
        background: var(--card-bg);
        border: 1px solid var(--border-subtle);
        border-radius: 16px;
        overflow: hidden;
        font-size: 1.5rem;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
    }
    .enquiries-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 1.2rem;
    }
    .enquiries-table thead tr { background: var(--brand-green); }
    .enquiries-table thead th {
        padding: 14px 18px;
        text-align: left;
        font-weight: bold;
        color: #fff;
        font-size: 1.5rem;
        letter-spacing: 0.02em;
    }
    .enquiries-table thead th a { color: #fff; text-decoration: none; }
    .enquiries-table thead th a:hover { text-decoration: underline; }
    .enquiries-table tbody tr { border-bottom: 1px solid var(--border-subtle); }
    .enquiries-table tbody tr:last-child { border-bottom: none; }
    .enquiries-table tbody tr:hover { background: #f0f7f0; }
    .enquiries-table td { padding: 14px 18px; vertical-align: middle; color: var(--text-main); }

    .td-name  { font-weight: 600; white-space: nowrap; }
    .td-email a { color: var(--text-main); text-decoration: none; }
    .td-email a:hover { text-decoration: underline; }
    .td-date  { white-space: nowrap; color: var(--text-muted); font-size: 0.88rem; }
    .td-action { white-space: nowrap; }

    .view-btn {
        display: inline-block;
        padding: 6px 14px;
        background: var(--brand-green);
        color: #fff;
        border-radius: 999px;
        font-size: 1rem;
        text-decoration: none;
        transition: background 0.15s;
    }
    .view-btn:hover { background: var(--brand-green-dark); }

    .no-results { text-align: center; padding: 40px; color: var(--text-muted); font-style: italic; }

    /* ── Paginator ── */
    .paginator { margin-top: 20px; }
    .pagination {
        list-style: none;
        display: flex;
        gap: 6px;
        padding: 0;
        margin: 0 0 8px;
        flex-wrap: wrap;
    }
    .pagination li a,
    .pagination li span {
        display: inline-block;
        padding: 6px 12px;
        border: 1px solid var(--border-subtle);
        border-radius: 6px;
        font-size: 1rem;
        color: var(--text-main);
        text-decoration: none;
        background: var(--card-bg);
    }
    .pagination li a:hover { background: #e8f5e9; border-color: var(--brand-green); }
    .pagination li.active span {
        background: var(--brand-green);
        color: #fff;
        border-color: var(--brand-green);
    }
    .page-counter { font-size: 1rem; color: var(--text-muted); margin: 0; }
</style>
