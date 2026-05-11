<div class="dashboard-wrapper">

    <div class="sidebar">
        <?= $this->element('sidebar') ?>
    </div>

    <div class="main-content">
        <div class="welcome-card">
            <h1 class="welcome-title">Welcome, <?= h($employee->name) ?></h1>
            <p class="welcome-sub">Here are your upcoming shifts.</p>
        </div>

        <table class="shift-table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Type</th>
                <th>Start</th>
                <th>End</th>
                <th>Service</th>
                <th>Location</th>
            </tr>
            </thead>
            <tbody>
            <?php if (empty($employee->shift_allocations)): ?>
                <tr>
                    <td colspan="8" style="text-align:center; color: var(--text-muted);">No upcoming shifts.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($employee->shift_allocations as $allocation): ?>
                    <tr>
                        <td><?= h($allocation->shift->shift_date) ?></td>
                        <td><?= h($allocation->shift->shift_type) ?></td>
                        <td><?= h($allocation->shift->start_time) ?></td>
                        <td><?= h($allocation->shift->end_time) ?></td>
                        <td><?= h($allocation->shift->service->name) ?></td>
                        <td class="td-action">
                            <?= $this->Html->link('View Details', ['controller' => 'Shifts', 'action' => 'view', $allocation->shift->id], ['class' => 'view-btn']) ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </tbody>
        </table>
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
        flex-shrink: 0;
    }

    .sidebar-header {
        padding: 28px 20px 24px;
        background: var(--brand-green-dark);
        text-align: center;
        border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .sidebar-logo { font-size: 2rem; display: block; margin-bottom: 6px; }
    .sidebar-title {
        margin: 0;
        font-family: 'Jockey One', sans-serif;
        font-size: 1.2rem;
        color: #fff;
        letter-spacing: 0.04em;
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
        font-size: 1rem;
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

    .main-content {
        flex: 1;
        padding: 40px 44px;
        background: var(--bg-light);
        overflow-y: auto;
    }

    .welcome-card {
        background: var(--card-bg);
        border-radius: 16px;
        padding: 32px 36px;
        margin-bottom: 32px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
        border: 1px solid var(--border-subtle);
        border-left: 5px solid var(--brand-green);
    }
    .welcome-title {
        font-family: 'Jockey One', sans-serif;
        font-size: 2.5rem;
        color: var(--brand-green);
        margin: 0 0 8px;
    }
    .welcome-sub {
        margin: 0;
        font-size: 1rem;
        color: var(--text-muted);
    }

    .shift-table {
        width: 100%;
        border-collapse: collapse;
        background: var(--card-bg);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
        border: 1px solid var(--border-subtle);
    }
    .shift-table thead {
        background: var(--brand-green);
        color: #fff;
    }
    .shift-table th {
        padding: 14px 18px;
        text-align: left;
        font-family: 'Jockey One', sans-serif;
        font-size: 0.95rem;
        letter-spacing: 0.04em;
        font-weight: normal;
    }
    .shift-table td {
        padding: 14px 18px;
        font-size: 0.95rem;
        color: var(--text-main);
        border-bottom: 1px solid var(--border-subtle);
    }
    .shift-table tbody tr:last-child td {
        border-bottom: none;
    }
    .shift-table tbody tr:hover {
        background: #f0fdf4;
    }
</style>
