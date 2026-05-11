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
                    <?= $this->Html->link(__('Edit Contact Message'), ['action' => 'edit', $contactMessage->id], ['class' => 'side-nav-item']) ?>
                    <?= $this->Form->postLink(__('Delete Contact Message'), ['action' => 'delete', $contactMessage->id], ['confirm' => 'Are you sure you want to delete the enquiry from ' . $contactMessage->email . '?', 'class' => 'side-nav-item delete-item']) ?>
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'back-btn']) ?>
                </div>
            </aside>

            <div class="column column-80">
                <div class="contactMessages view content">

                    <h3><?= h($contactMessage->title) ?></h3>

                    <table>
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($contactMessage->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($contactMessage->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone') ?></th>
                            <td><?= h($contactMessage->phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Address') ?></th>
                            <td><?= h($contactMessage->address) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Title') ?></th>
                            <td><?= h($contactMessage->title) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created Time') ?></th>
                            <td><?= h($contactMessage->created_time) ?></td>
                        </tr>
                    </table>

                    <!-- MESSAGE -->
                    <div class="text">
                        <strong><?= __('Message') ?></strong>
                        <blockquote>
                            <?= $this->Text->autoParagraph(h($contactMessage->message)); ?>
                        </blockquote>
                    </div>

                    <!-- ARBORIST QUESTIONNAIRE -->
                    <div class="text">
                        <strong><?= __('Arborist Questionnaire') ?></strong>

                        <table style="margin-top:10px;">
                            <tr>
                                <th>Tree Type</th>
                                <td><?= h($contactMessage->tree_type) ?></td>
                            </tr>
                            <tr>
                                <th>Tree Height</th>
                                <td><?= h($contactMessage->tree_height) ?></td>
                            </tr>
                            <tr>
                                <th>Job Type</th>
                                <td><?= h($contactMessage->job_type) ?></td>
                            </tr>
                            <tr>
                                <th>Location Area</th>
                                <td><?= h($contactMessage->location_area) ?></td>
                            </tr>
                            <tr>
                                <th>Access Level</th>
                                <td><?= h($contactMessage->access_level) ?></td>
                            </tr>
                            <tr>
                                <th>Urgency</th>
                                <td><?= h($contactMessage->urgency) ?></td>
                            </tr>
                            <tr>
                                <th>Hazards</th>
                                <td>
                                    <?php
                                    $hazards = json_decode($contactMessage->hazards ?? '[]', true);
                                    echo !empty($hazards) ? implode(', ', $hazards) : 'None';
                                    ?>
                                </td>
                            </tr>
                        </table>

                    </div>

                    <!-- PHOTOS -->
                    <div class="text">
                        <strong><?= __('Uploaded Photos') ?></strong>

                        <?php
                        $photos = json_decode($contactMessage->photos ?? '[]', true);
                        if (!empty($photos)):
                            foreach ($photos as $p):
                                ?>
                                <img src="/<?= $p ?>" style="max-width:180px; margin:10px; border-radius:8px; border:1px solid #ddd;">
                            <?php
                            endforeach;
                        else:
                            echo "<p>No photos uploaded.</p>";
                        endif;
                        ?>
                    </div>

                    <!-- VIDEO -->
                    <div class="text">
                        <strong><?= __('Uploaded Video') ?></strong>

                        <?php if (!empty($contactMessage->video)): ?>
                            <video width="360" controls style="margin-top:10px; border-radius:8px;">
                                <source src="/<?= $contactMessage->video ?>" type="video/mp4">
                            </video>
                        <?php else: ?>
                            <p>No video uploaded.</p>
                        <?php endif; ?>
                    </div>
                    <?= $this->Html->link(__('Create Quote Visit'), '/QuoteVisits/add',
                        ['style' => 'background:#1A4D1E; color:white;']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* your entire CSS unchanged */
    <?= file_get_contents(__DIR__ . '/view_styles.css') ?>


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
        position: relative;
        top: 0; left: 0;
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
    .nav-link:hover { background: rgba(255,255,255,0.1); color: #fff; border-left-color: #fff; }
    .nav-link.active { background: rgba(255,255,255,0.15); color: #fff; border-left-color: #fff; font-weight: bold; }
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
        overflow-y: auto;
    }

    /* ── Row layout ── */
    .row { display: flex; gap: 24px; align-items: flex-start; }

    /* ── Side nav (actions panel) ── */
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
    .back-btn {
        display: block;
        padding: 9px 12px;
        margin-top: 4px;
        background: var(--card-bg);
        border: 1px solid var(--border-subtle);
        border-radius: 8px;
        color: var(--text-muted);
        text-decoration: none;
        font-size: 1.1rem;
        text-align: left;
    }
    .back-btn:hover { background: #f5f5f5; }

    /* ── Main card ── */
    .contactMessages.view {
        background: var(--card-bg);
        border: 1px solid var(--border-subtle);
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
    }
    .contactMessages.view h3 {
        margin: 0;
        padding: 20px 24px;
        background: var(--brand-green);
        font-family: 'Jockey One', sans-serif;
        font-size: 3rem;
        color: #fff;
        letter-spacing: 0.02em;
    }

    /* ── Details table ── */
    .contactMessages.view table {
        width: 100%;
        border-collapse: collapse;
        font-size: 1.5rem;
    }
    .contactMessages.view table tr { border-bottom: 1px solid var(--border-subtle); }
    .contactMessages.view table tr:last-child { border-bottom: none; }
    .contactMessages.view table th {
        padding: 13px 24px;
        text-align: left;
        font-weight: bold;
        color: var(--text-muted);
        width: 140px;
        background: #fafafa;
    }
    .contactMessages.view table td { padding: 13px 24px; color: var(--text-main); }

    /* ── Message blockquote ── */
    .contactMessages.view .text { padding: 20px 24px; border-top: 1px solid var(--border-subtle); }
    .contactMessages.view .text strong {
        display: block;
        font-size: 0.82rem;
        color: var(--text-muted);
        margin-bottom: 10px;
        text-transform: uppercase;
        letter-spacing: 1.3em;
    }
    .contactMessages.view blockquote {
        margin: 0;
        padding: 16px 20px;
        background: #f0f7f0;
        border-left: 4px solid var(--brand-green);
        border-radius: 4px;
        font-size: 1.3rem;
        color: var(--text-main);
        line-height: 1.7;
    }
    .contactMessages.view blockquote p { margin: 0 0 8px; }
    .contactMessages.view blockquote p:last-child { margin: 0; }
</style>
