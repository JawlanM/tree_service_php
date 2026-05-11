<?php
$identity = $this->Authentication->getIdentity();
$role = $identity ? $identity->get('role') : null;
?>

<div class="sidebar" id="sidebar">

    <div class="sidebar-header">
        <span class="sidebar-logo">🌿</span>
        <p class="sidebar-title">
            <?= $role === 'admin' ? 'Arborist Admin' : 'Arborist Staff' ?>
        </p>
    </div>

    <nav class="sidebar-nav">

        <!-- ADMIN NAV -->
        <?php if ($role === 'admin'): ?>

            <a href="/admin/dashboard" class="nav-link">Dashboard</a>
            <a href="/contact-messages" class="nav-link">Enquiries</a>
            <a href="/shifts" class="nav-link">Job Scheduling</a>
            <a href="/equipment" class="nav-link">Equipment</a>
            <a href="/quote-visits" class="nav-link">Quote Visits</a>
            <a href="/users" class="nav-link">User Accounts</a>

        <?php endif; ?>

        <!-- STAFF NAV -->
        <?php if ($role === 'employee'): ?>

            <a href="/employee/dashboard" class="nav-link">Shifts</a>
            <a href="/quote-visits" class="nav-link">Quote Visits</a>

        <?php endif; ?>

        <a href="/users/logout" class="nav-link logout">Logout</a>

    </nav>

</div>
