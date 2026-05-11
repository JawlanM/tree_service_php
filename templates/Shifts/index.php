<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Shift> $shifts
 */

$shiftsByDate = [];
foreach ($shifts as $shift) {
    $dateKey = $shift->shift_date instanceof \Cake\I18n\Date
        ? $shift->shift_date->format('Y-m-d')
        : (string)$shift->shift_date;
    $shiftsByDate[$dateKey][] = $shift;
}

// Week navigation — default to current week
$weekOffset = (int)($this->request->getQuery('week') ?? 0);
$monday = new \DateTime('monday this week');
$monday->modify("{$weekOffset} weeks");
$weekDays = [];
for ($i = 0; $i < 7; $i++) {
    $day = clone $monday;
    $day->modify("+{$i} days");
    $weekDays[] = $day;
}
$prevWeek = $weekOffset - 1;
$nextWeek = $weekOffset + 1;
?>
<div class="dashboard-wrapper">

    <div class="sidebar">
        <?= $this->element('sidebar') ?>
    </div>

    <div class="main-content">

        <?= $this->Flash->render() ?>
        <div class="welcome-card" style="display:flex; justify-content:space-between; align-items:center;">
            <div>
                <h1 class="welcome-title">Job Schedule</h1>
                <p class="welcome-sub">Weekly overview of all allocated shifts</p>
            </div>
            <?= $this->Html->link('+ New Shift', ['action' => 'add'], ['class' => 'btn-new']) ?>
        </div>

        <!-- Week navigation -->
        <div class="week-nav">
            <a href="?week=<?= $prevWeek ?>" class="week-btn">&#8592; Previous</a>
            <span class="week-label">
                <?= $weekDays[0]->format('d M Y') ?> — <?= $weekDays[6]->format('d M Y') ?>
            </span>
            <a href="?week=<?= $nextWeek ?>" class="week-btn">Next &#8594;</a>
        </div>

        <!-- Filter bar -->
        <div class="filter-bar">
            <span class="filter-label">Filter by service:</span>
            <button class="filter-btn active" data-service="all">All</button>
            <button class="filter-btn" data-service="Tree Removal">Tree Removal</button>
            <button class="filter-btn" data-service="Pruning &amp; Trimming">Pruning &amp; Trimming</button>
            <button class="filter-btn" data-service="Health Care">Health Care</button>
            <button class="filter-btn" data-service="Quote Visit">Quote Visit</button>
        </div>

        <!-- Calendar grid -->
        <div class="calendar-grid">
            <?php foreach ($weekDays as $day):
                $dateKey = $day->format('Y-m-d');
                $isToday = $day->format('Y-m-d') === (new \DateTime())->format('Y-m-d');
                $dayShifts = $shiftsByDate[$dateKey] ?? [];
                ?>
                <div class="day-col <?= $isToday ? 'today' : '' ?>">
                    <div class="day-header">
                        <span class="day-name"><?= $day->format('D') ?></span>
                        <span class="day-date <?= $isToday ? 'today-badge' : '' ?>"><?= $day->format('d') ?></span>
                    </div>

                    <div class="day-body">
                        <?php if (empty($dayShifts)): ?>
                            <p class="no-shifts">No shifts</p>
                        <?php else: ?>
                            <?php foreach ($dayShifts as $shift): ?>
                                <div class="shift-card shift-<?= strtolower(str_replace(' ', '-', $shift->shift_type)) ?>"
                                     data-service="<?= $shift->hasValue('service') ? h($shift->service->name) : '' ?>">
                                    <span class="shift-type-badge"><?= h($shift->shift_type) ?></span>
                                    <p class="shift-location">📍 <?= h($shift->location) ?></p>
                                    <p class="shift-time">🕐 <?= h($shift->start_time) ?> – <?= h($shift->end_time) ?></p>
                                    <?php if ($shift->hasValue('service')): ?>
                                        <p class="shift-service">🌿 <?= h($shift->service->name) ?></p>
                                    <?php endif; ?>
                                    <div class="shift-actions">
                                        <?= $this->Html->link('View', ['action' => 'view', $shift->id], ['class' => 'shift-link']) ?>
                                        <?= $this->Html->link('Edit', ['action' => 'edit', $shift->id], ['class' => 'shift-link']) ?>
                                        <?= $this->Form->postLink('Delete', ['action' => 'delete', $shift->id], [
                                            'class' => 'shift-link danger',
                                            'method' => 'delete',
                                            'confirm' => 'Delete this shift?'
                                        ]) ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <script>
            const filterBtns = document.querySelectorAll('.filter-btn');

            filterBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    filterBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');

                    const selected = btn.dataset.service;

                    document.querySelectorAll('.shift-card').forEach(card => {
                        if (selected === 'all' || card.dataset.service === selected) {
                            card.style.display = '';
                        } else {
                            card.style.display = 'none';
                        }
                    });
                });
            });
        </script>

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

    /* Sidebar — same as admin */
    .sidebar { width: 240px; background: var(--brand-green); display: flex; flex-direction: column; flex-shrink: 0; }
    .sidebar-header { padding: 28px 20px 24px; background: var(--brand-green-dark); text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar-logo { font-size: 2rem; display: block; margin-bottom: 6px; }
    .sidebar-title { margin: 0; font-family: 'Jockey One', sans-serif; font-size: 1.2rem; color: #fff; letter-spacing: 0.04em; }
    .sidebar-nav { display: flex; flex-direction: column; padding: 12px 0; flex: 1; }
    .nav-link { padding: 14px 22px; color: rgba(255,255,255,0.8); text-decoration: none; font-size: 1.5rem; transition: background 0.15s, color 0.15s; border-left: 3px solid transparent; }
    .nav-link:hover { background: rgba(255,255,255,0.1); color: #fff; border-left-color: #fff; }
    .nav-link.active { background: rgba(255,255,255,0.15); color: #fff; border-left-color: #fff; font-weight: bold; }
    .logout { margin-top: auto; color: #f87171 !important; }
    .logout:hover { background: rgba(248,113,113,0.15) !important; border-left-color: #f87171 !important; }

    .main-content { flex: 1; padding: 32px 36px; background: var(--bg-light); overflow-y: auto; }

    .welcome-card { background: var(--card-bg); border-radius: 16px; padding: 28px 32px; margin-bottom: 24px; box-shadow: 0 10px 30px rgba(15,23,42,0.08); border: 1px solid var(--border-subtle); border-left: 5px solid var(--brand-green); }
    .welcome-title { font-family: 'Jockey One', sans-serif; font-size: 2rem; color: var(--brand-green); margin: 0 0 6px; }
    .welcome-sub { margin: 0; font-size: 1.5rem; color: var(--text-muted); }

    .btn-new { background: var(--brand-green); color: #fff; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-size: 1.5rem; font-weight: 600; transition: background 0.15s; }
    .btn-new:hover { background: var(--brand-green-dark); }

    /* Week nav */
    .week-nav { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; background: var(--card-bg); border-radius: 12px; padding: 14px 20px; border: 1px solid var(--border-subtle); }
    .week-btn { text-decoration: none; color: var(--brand-green); font-weight: 600; font-size: 1.5rem; padding: 6px 14px; border: 1px solid var(--brand-green); border-radius: 8px; transition: all 0.15s; }
    .week-btn:hover { background: var(--brand-green); color: #fff; }
    .week-label { font-family: 'Jockey One', sans-serif; font-size: 1.5rem; color: var(--text-main); }

    /* Calendar grid */
    .calendar-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 10px; }

    .day-col { background: var(--card-bg); border-radius: 12px; border: 1px solid var(--border-subtle); overflow: hidden; min-height: 200px; display: flex; flex-direction: column; }
    .day-col.today { border-color: var(--brand-green); border-width: 2px; }

    .day-header { padding: 10px; text-align: center; background: #f9fafb; border-bottom: 1px solid var(--border-subtle); }
    .day-name { display: block; font-size: 1.5rem; text-transform: uppercase; letter-spacing: 0.06em; color: var(--text-muted); }
    .day-date { display: inline-block; font-family: 'Jockey One', sans-serif; font-size: 1.5rem; color: var(--text-main); margin-top: 2px; }
    .day-date.today-badge { background: var(--brand-green); color: #fff; border-radius: 50%; width: 32px; height: 32px; line-height: 32px; text-align: center; }

    .day-body { padding: 8px; display: flex; flex-direction: column; gap: 6px; flex: 1; }
    .no-shifts { font-size: 0.75rem; color: var(--text-muted); text-align: center; margin-top: 16px; }

    /* Shift cards */
    .shift-card { border-radius: 8px; padding: 8px 10px; font-size: 1.2rem; border-left: 3px solid; }
    .shift-morning   { background: #fffbeb; border-color: #f59e0b; }
    .shift-afternoon { background: #eff6ff; border-color: #3b82f6; }
    .shift-full-day  { background: #f0fdf4; border-color: var(--brand-green); }

    .shift-type-badge { display: inline-block; font-size: 1.2rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px; color: var(--text-muted); }
    .shift-location, .shift-time, .shift-service { margin: 2px 0; color: var(--text-main); font-size: 0.78rem; }

    .shift-actions { display: flex; gap: 6px; margin-top: 6px; flex-wrap: wrap; }
    .shift-link { font-size: 1.2rem; color: var(--brand-green); text-decoration: none; padding: 2px 6px; border: 1px solid var(--brand-green); border-radius: 4px; }
    .shift-link:hover { background: var(--brand-green); color: #fff; }
    .shift-link.danger { color: #dc2626; border-color: #dc2626; }
    .shift-link.danger:hover { background: #dc2626; color: #fff; }

    .filter-bar {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 16px;
        flex-wrap: wrap;
    }
    .filter-label {
        font-size: 1rem;
        color: var(--text-muted);
        font-weight: 500;
        margin-right: 4px;
    }
    .filter-btn {
        padding: 6px 14px;
        border: 1px solid var(--border-subtle);
        border-radius: 20px;
        background: var(--card-bg);
        color: var(--text-main);
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.15s;
    }
    .filter-btn:hover {
        border-color: var(--brand-green);
        color: var(--brand-green);
    }
    .filter-btn.active {
        background: var(--brand-green);
        color: #fff;
        border-color: var(--brand-green);
    }
</style>
