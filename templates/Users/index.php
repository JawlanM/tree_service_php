<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>

<div class="dashboard-wrapper">

    <div class="sidebar">
        <?= $this->element('sidebar') ?>
    </div>

    <div class="main-content">

        <?= $this->Flash->render() ?>

        <div class="page-header">
            <div>
                <h1 class="page-title">User Accounts</h1>
                <p class="page-subtitle">Manage system users</p>
            </div>
        </div>

        <div style="margin-bottom: 16px;">
            <?= $this->Html->link('New User', ['action' => 'add'], ['class' => 'view-btn']) ?>
        </div>

        <div class="enquiries-table-wrap">
            <table class="enquiries-table">
                <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id', 'ID') ?></th>
                    <th><?= $this->Paginator->sort('name', 'Name') ?></th>
                    <th><?= $this->Paginator->sort('email', 'Email') ?></th>
                    <th><?= $this->Paginator->sort('role', 'Role') ?></th>
                    <th><?= $this->Paginator->sort('created_time', 'Created') ?></th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Number->format($user->id) ?></td>
                        <td class="td-name"><?= h($user->name) ?></td>
                        <td class="td-email">
                            <a href="mailto:<?= h($user->email) ?>">
                                <?= h($user->email) ?>
                            </a>
                        </td>
                        <td><?= h($user->role) ?></td>
                        <td class="td-date">
                            <?= $user->created_time
                                ? $user->created_time->format('d M Y, g:ia')
                                : '—' ?>
                        </td>
                        <td class="td-action">
                            <?= $this->Html->link('View', ['action' => 'view', $user->id], ['class' => 'view-btn']) ?>
                            <?= $this->Html->link('Edit', ['action' => 'edit', $user->id], ['class' => 'view-btn']) ?>
                            <?= $this->Form->postLink(
                                'Delete',
                                ['action' => 'delete', $user->id],
                                [
                                    'class' => 'view-btn',
                                    'confirm' => 'Are you sure you want to delete this user?'
                                ]
                            ) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>

                <?php if (empty($users->toArray())): ?>
                    <tr>
                        <td colspan="6" class="no-results">No users found.</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< First') ?>
                <?= $this->Paginator->prev('< Prev') ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next('Next >') ?>
                <?= $this->Paginator->last('Last >>') ?>
            </ul>
            <p class="page-counter">
                <?= $this->Paginator->counter('Page {{page}} of {{pages}} — {{count}} total users') ?>
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
    }

    body { margin: 0; padding: 0; }
    #header, nav.top-nav, .navbar, header { display: none !important; }

    .dashboard-wrapper {
        display: flex;
        min-height: 100vh;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        position: fixed;
        top: 0; left: 0;
        width: 100%;
    }

    .sidebar {
        width: 240px;
        background: var(--brand-green);
        display: flex;
        flex-direction: column;
    }

    .sidebar-header {
        padding: 28px 20px 24px;
        background: var(--brand-green-dark);
        text-align: center;
    }

    .sidebar-logo { font-size: 2rem; display: block; margin-bottom: 6px; }

    .sidebar-title {
        margin: 0;
        font-family: 'Jockey One', sans-serif;
        font-size: 1.2rem;
        color: #fff;
    }

    .sidebar-nav {
        display: flex;
        flex-direction: column;
        padding: 12px 0;
        flex: 1;
    }

    .nav-link {
        padding: 14px 22px;
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        font-size: 1.5rem;
    }

    .nav-link.active {
        background: rgba(255,255,255,0.15);
        color: #fff;
        font-weight: bold;
    }

    .logout {
        margin-top: auto;
        color: #f87171 !important;
    }

    .main-content {
        flex: 1;
        padding: 40px;
        background: var(--bg-light);
        overflow-y: auto;
    }

    .page-title {
        font-family: 'Jockey One', sans-serif;
        font-size: 3rem;
        color: var(--brand-green);
    }

    .enquiries-table-wrap {
        background: #fff;
        border-radius: 16px;
        overflow: hidden;
    }

    .enquiries-table {
        width: 100%;
        border-collapse: collapse;
    }

    .enquiries-table thead {
        background: var(--brand-green);
        color: #fff;
    }

    .enquiries-table th, .enquiries-table td {
        padding: 12px;
    }

    .view-btn {
        padding: 6px 12px;
        background: var(--brand-green);
        color: white;
        border-radius: 20px;
        text-decoration: none;
        margin-right: 4px;
    }

    .no-results {
        text-align: center;
        padding: 20px;
    }
</style>
