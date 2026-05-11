<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactMessage $contactMessage
 */
?>

<div class="dashboard-wrapper">

    <div class="sidebar">
        <div class="sidebar-header">
            <span class="sidebar-logo">🌿</span>
            <p class="sidebar-title">Arborist Admin</p>
        </div>
        <nav class="sidebar-nav">
            <a href="/admin/dashboard"  class="nav-link"> Dashboard</a>
            <a href="/contact-messages" class="nav-link active"> Enquiries</a>

            <a href="/users/logout"     class="nav-link logout"> Logout</a>
        </nav>
    </div>

    <div class="main-content">
        <div class="row">
            <aside class="column">
                <div class="side-nav">
                    <h4 class="heading"><?= __('Actions') ?></h4>
                    <?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $contactMessage->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $contactMessage->id), 'class' => 'side-nav-item delete-item']
                    ) ?>
                    <?= $this->Html->link(__('List Contact Messages'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                </div>
            </aside>
            <div class="column column-80">
                <div class="contactMessages form content">
                    <?= $this->Form->create($contactMessage) ?>
                    <fieldset>
                        <legend><?= __('Edit Contact Message') ?></legend>
                        <?php
                        echo $this->Form->control('name');
                        echo $this->Form->control('email');
                        echo $this->Form->control('title');
                        echo $this->Form->control('message');
                        echo $this->Form->control('created_time', ['empty' => true]);
                        ?>
                    </fieldset>
                    <div class="form-actions">
                        <?= $this->Form->button(__('Submit'), ['class' => 'submit-btn']) ?>
                        <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'back-btn']) ?>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
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
    #header, nav.top-nav, .navbar, header { display: none !important; }

    .dashboard-wrapper {
        display: flex;
        min-height: 100vh;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        position: fixed;
        top: 0; left: 0;
        width: 100%;
        height: 100vh;
    }

    /* ── Sidebar ── */
    .sidebar {
        width: 240px;
        background: var(--brand-green);
        display: flex;
        flex-direction: column;
        flex-shrink: 0;
        position: sticky;
        top: 0;
        height: 100vh;
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
    .sidebar-nav { display: flex; flex-direction: column; padding: 12px 0; flex: 1; }
    .nav-link {
        padding: 14px 22px;
        color: rgba(255,255,255,0.8);
        text-decoration: none;
        font-size: 1.5rem;
        transition: background 0.15s, color 0.15s;
        border-left: 3px solid transparent;
    }
    .nav-link:hover { background: rgba(255,255,255,0.1); color: #fff; border-left-color: #fff; }
    .nav-link.active { background: rgba(255,255,255,0.15); color: #fff; border-left-color: #fff; font-weight: bold; }
    .logout {
        margin-top: auto;
        color: #f87171 !important;
    }

    /* ── Main Content ── */
    .main-content {
        flex: 1;
        padding: 40px 44px;
        background: var(--bg-light);
        overflow-y: auto;
        height: 100vh;
    }

    /* ── Row layout ── */
    .row { display: flex; gap: 24px; align-items: flex-start; }

    /* ── Side nav ── */
    .side-nav {
        background: var(--card-bg);
        border: 1px solid var(--border-subtle);
        border-radius: 16px;
        padding: 16px;
        min-width: 190px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
    }
    .side-nav .heading {
        font-family: 'Jockey One', sans-serif;
        font-size: 2rem;
        color: var(--brand-green);
        margin: 0 0 12px;
        letter-spacing: 0.05em;
    }
    .side-nav-item {
        display: block;
        padding: 9px 12px;
        margin-bottom: 8px;
        background: #f0f7f0;
        border: 1px solid var(--border-subtle);
        border-radius: 8px;
        color: var(--brand-green);
        text-decoration: none;
        font-size: 1.1rem;
        cursor: pointer;
        width: 100%;
        text-align: left;
        box-sizing: border-box;
        font-weight: 500;
    }
    .side-nav-item:hover { background: #d6ecd6; }
    .delete-item { color: #c62828 !important; background: #fef2f2 !important; }
    .delete-item:hover { background: #fde8e8 !important; }

    /* ── Form card ── */
    .contactMessages.form {
        background: var(--card-bg);
        border: 1px solid var(--border-subtle);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
    }
    .contactMessages.form fieldset {
        border: none;
        margin: 0;
        padding: 0;
    }
    .contactMessages.form legend {
        display: block;
        width: 100%;
        padding: 20px 24px;
        background: var(--brand-green);
        font-family: 'Jockey One', sans-serif;
        font-size: 3rem;
        color: #fff;
        letter-spacing: 0.02em;
        border-bottom: none;
        box-sizing: border-box;
    }

    /* ── Form controls ── */
    .contactMessages.form .input { padding: 14px 24px 0; }
    .contactMessages.form label {
        display: block;
        font-size: 1.5rem;
        font-weight: bold;
        color: var(--text-muted);
        margin-bottom: 5px;
    }
    .contactMessages.form input[type="text"],
    .contactMessages.form input[type="email"],
    .contactMessages.form input[type="datetime-local"],
    .contactMessages.form textarea,
    .contactMessages.form select {
        width: 100%;
        padding: 9px 12px;
        border: 1px solid var(--border-subtle);
        border-radius: 8px;
        font-size: 1.5rem;
        color: var(--text-main);
        background: #fafafa;
        box-sizing: border-box;
    }
    .contactMessages.form textarea { min-height: 120px; resize: vertical; }
    .contactMessages.form input:focus,
    .contactMessages.form textarea:focus {
        outline: none;
        border-color: var(--brand-green);
        background: #fff;
    }

    /* ── Form actions ── */
    .form-actions {
        display: flex;
        gap: 10px;
        align-items: center;
        padding: 20px 24px 24px;
    }
    .submit-btn {
        padding: 9px 24px;
        background: var(--brand-green);
        color: #fff;
        border: none;
        border-radius: 999px;
        font-size: 1.3rem;
        cursor: pointer;
        transition: background 0.15s;
    }
    .submit-btn:hover { background: var(--brand-green-dark); }
    .back-btn {
        padding: 9px 24px;
        background: var(--card-bg);
        color: var(--text-muted);
        border: 1px solid var(--border-subtle);
        border-radius: 999px;
        font-size: 1.3rem;
        text-decoration: none;
        transition: background 0.15s;
    }
    .back-btn:hover { background: #f0f0f0; }
</style>
