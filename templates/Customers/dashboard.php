<?php
/**
 * @var \App\View\AppView $this
 */
$activeTab = $this->request->getQuery('tab') ?? 'jobs';
?>

<div class="customer-dashboard">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-header">
            <span class="sidebar-logo">🌿</span>
            <p class="sidebar-title">Arborist Specialist</p>
        </div>
        <nav class="sidebar-nav">
            <a href="?tab=jobs"    class="nav-link <?= $activeTab === 'jobs'    ? 'active' : '' ?>">My Jobs</a>
            <a href="?tab=request" class="nav-link <?= $activeTab === 'request' ? 'active' : '' ?>">Request a Job</a>
            <a href="?tab=account" class="nav-link <?= $activeTab === 'account' ? 'active' : '' ?>">My Account</a>
            <a href="?tab=messages" class="nav-link <?= $activeTab === 'messages' ? 'active' : '' ?>">Messages</a>
            <a href="/users/logout" class="nav-link logout">Logout</a>
        </nav>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <?= $this->Flash->render() ?>

        <!-- MY JOBS TAB -->
        <?php if ($activeTab === 'jobs'): ?>
            <div class="welcome-card">
                <h1 class="welcome-title">My Jobs</h1>
                <p class="welcome-sub">View your quotes and job history.</p>
            </div>

            <div class="filter-bar">
                <span class="filter-label">Filter:</span>
                <button class="filter-btn active" data-status="all">All</button>
                <button class="filter-btn" data-status="pending">Pending</button>
                <button class="filter-btn" data-status="accepted">Accepted</button>
                <button class="filter-btn" data-status="rejected">Rejected</button>
                <button class="filter-btn" data-status="complete">Complete</button>
            </div>

            <div class="jobs-list">
                <!-- Placeholder cards — will be replaced with real data -->
                <div class="job-card" data-status="pending">
                    <div class="job-header">
                        <div>
                            <span class="quote-number">Quote #QT-0001</span>
                            <p class="job-service">Tree Removal — Brighton</p>
                        </div>
                        <span class="status-badge status-pending">Pending</span>
                    </div>
                    <div class="job-details">
                        <span> Submitted: 22 Apr 2026</span>
                        <span> Quoted: <strong>$450.00</strong></span>
                    </div>
                    <div class="job-actions">
                        <button class="btn-accept">Accept Quote</button>
                        <button class="btn-view">View Details</button>
                    </div>
                </div>

                <div class="job-card" data-status="complete">
                    <div class="job-header">
                        <div>
                            <span class="quote-number">Quote #QT-0002</span>
                            <p class="job-service">Pruning & Trimming — Hawthorn</p>
                        </div>
                        <span class="status-badge status-complete">Complete</span>
                    </div>
                    <div class="job-details">
                        <span> Completed: 10 Apr 2026</span>
                        <span> Paid: <strong>$320.00</strong></span>
                    </div>
                    <div class="job-actions">
                        <button class="btn-view">View Details</button>
                    </div>
                </div>

                <div class="job-card" data-status="rejected">
                    <div class="job-header">
                        <div>
                            <span class="quote-number">Quote #QT-0003</span>
                            <p class="job-service">Health Care — St Kilda</p>
                        </div>
                        <span class="status-badge status-rejected">Rejected</span>
                    </div>
                    <div class="job-details">
                        <span> Submitted: 5 Apr 2026</span>
                        <span> Quoted: <strong>$180.00</strong></span>
                    </div>
                    <div class="job-actions">
                        <button class="btn-view">View Details</button>
                    </div>
                </div>
            </div>

            <!-- REQUEST A JOB TAB -->
        <?php elseif ($activeTab === 'request'): ?>
            <div class="welcome-card">
                <h1 class="welcome-title">Request a Job</h1>
                <p class="welcome-sub">Submit a new job request and we'll get back to you with a quote.</p>
            </div>
            <div class="tab-card">
            </div>

            <!-- MY ACCOUNT TAB -->
        <?php elseif ($activeTab === 'account'): ?>
            <div class="welcome-card">
                <h1 class="welcome-title">My Account</h1>
                <p class="welcome-sub">Update your contact details.</p>
            </div>
            <div class="tab-card">
                <div class="account-form">
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" placeholder="Your name" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" placeholder="you@example.com" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="text" placeholder="04xx xxx xxx" class="form-input">
                    </div>
                    <div class="form-group">
                        <label>Notes</label>
                        <textarea class="form-input" rows="3" placeholder="Any notes about your property or preferences..."></textarea>
                    </div>
                    <button class="btn-save">Save Changes</button>
                </div>
            </div>

            <!-- MESSAGES TAB -->
        <?php elseif ($activeTab === 'messages'): ?>
            <div class="welcome-card">
                <h1 class="welcome-title">Messages</h1>
                <p class="welcome-sub">Communicate directly with our team.</p>
            </div>
            <div class="tab-card messages-layout">
                <div class="message-thread">
                    <div class="message received">
                        <span class="message-author">Admin answered:</span>
                        <p>Hi! Your quote for the Brighton job has been prepared. Please check your Jobs tab to accept.</p>
                        <span class="message-time">22 Apr 2026, 10:15am</span>
                    </div>
                    <div class="message sent">
                        <span class="message-author">You:</span>
                        <p>Thank you, I'll take a look now.</p>
                        <span class="message-time">22 Apr 2026, 10:32am</span>
                    </div>
                    <div class="message received">
                        <span class="message-author">James Carter answered:</span>
                        <p>Just a reminder your job is scheduled for Monday 9am. Please ensure access to the rear garden.</p>
                        <span class="message-time">24 Apr 2026, 2:05pm</span>
                    </div>
                </div>
                <div class="message-input-bar">
                    <input type="text" placeholder="Type a message..." class="form-input" style="flex:1;">
                    <button class="btn-save">Send</button>
                </div>
            </div>

        <?php endif; ?>

    </div>
</div>

<script>
    // Job status filter
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            const status = btn.dataset.status;
            document.querySelectorAll('.job-card').forEach(card => {
                card.style.display = (status === 'all' || card.dataset.status === status) ? '' : 'none';
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

    .customer-dashboard {
        display: flex;
        min-height: 100vh;
        font-family: system-ui, sans-serif;
        position: fixed;
        top: 0; left: 0;
        width: 100%;
    }

    /* Sidebar */
    .sidebar { width: 240px; background: var(--brand-green); display: flex; flex-direction: column; flex-shrink: 0; }
    .sidebar-header { padding: 28px 20px 24px; background: var(--brand-green-dark); text-align: center; border-bottom: 1px solid rgba(255,255,255,0.1); }
    .sidebar-logo { font-size: 2rem; display: block; margin-bottom: 6px; }
    .sidebar-title { margin: 0; font-family: 'Jockey One', sans-serif; font-size: 1.1rem; color: #fff; }
    .sidebar-nav { display: flex; flex-direction: column; padding: 12px 0; flex: 1; }
    .nav-link { padding: 14px 22px; color: rgba(255,255,255,0.8); text-decoration: none; font-size: 1rem; border-left: 3px solid transparent; transition: background 0.15s; }
    .nav-link:hover { background: rgba(255,255,255,0.1); color: #fff; border-left-color: #fff; }
    .nav-link.active { background: rgba(255,255,255,0.15); color: #fff; border-left-color: #fff; font-weight: bold; }
    .logout { margin-top: auto; color: #f87171 !important; }
    .logout:hover { background: rgba(248,113,113,0.15) !important; border-left-color: #f87171 !important; }

    /* Main */
    .main-content { flex: 1; padding: 40px 44px; background: var(--bg-light); overflow-y: auto; }

    .welcome-card { background: var(--card-bg); border-radius: 16px; padding: 28px 32px; margin-bottom: 24px; box-shadow: 0 10px 30px rgba(15,23,42,0.08); border: 1px solid var(--border-subtle); border-left: 5px solid var(--brand-green); }
    .welcome-title { font-family: 'Jockey One', sans-serif; font-size: 2rem; color: var(--brand-green); margin: 0 0 6px; }
    .welcome-sub { margin: 0; font-size: 0.95rem; color: var(--text-muted); }

    .tab-card { background: var(--card-bg); border-radius: 16px; padding: 28px 32px; border: 1px solid var(--border-subtle); box-shadow: 0 10px 30px rgba(15,23,42,0.08); }

    /* Filter bar */
    .filter-bar { display: flex; align-items: center; gap: 8px; margin-bottom: 16px; flex-wrap: wrap; }
    .filter-label { font-size: 0.9rem; color: var(--text-muted); font-weight: 500; }
    .filter-btn { padding: 6px 14px; border: 1px solid var(--border-subtle); border-radius: 20px; background: var(--card-bg); color: var(--text-main); font-size: 0.875rem; cursor: pointer; transition: all 0.15s; }
    .filter-btn:hover { border-color: var(--brand-green); color: var(--brand-green); }
    .filter-btn.active { background: var(--brand-green); color: #fff; border-color: var(--brand-green); }

    /* Job cards */
    .jobs-list { display: flex; flex-direction: column; gap: 14px; }
    .job-card { background: var(--card-bg); border-radius: 14px; padding: 20px 24px; border: 1px solid var(--border-subtle); box-shadow: 0 4px 16px rgba(15,23,42,0.06); }
    .job-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 12px; }
    .quote-number { font-size: 0.78rem; text-transform: uppercase; letter-spacing: 0.08em; color: var(--text-muted); font-weight: 600; display: block; margin-bottom: 4px; }
    .job-service { margin: 0; font-size: 1rem; font-weight: 600; color: var(--text-main); }
    .job-details { display: flex; gap: 24px; font-size: 0.88rem; color: var(--text-muted); margin-bottom: 14px; flex-wrap: wrap; }
    .job-actions { display: flex; gap: 10px; }

    /* Status badges */
    .status-badge { font-size: 0.75rem; font-weight: 600; padding: 4px 12px; border-radius: 20px; text-transform: uppercase; letter-spacing: 0.06em; }
    .status-pending  { background: #FEF3C7; color: #92400E; }
    .status-accepted { background: #D1FAE5; color: #065F46; }
    .status-rejected { background: #FEE2E2; color: #991B1B; }
    .status-complete { background: #DBEAFE; color: #1E40AF; }

    /* Buttons */
    .btn-accept { background: var(--brand-green); color: #fff; border: none; padding: 8px 18px; border-radius: 8px; font-size: 0.875rem; cursor: pointer; font-weight: 600; transition: background 0.15s; }
    .btn-accept:hover { background: var(--brand-green-dark); }
    .btn-view { background: transparent; color: var(--brand-green); border: 1px solid var(--brand-green); padding: 8px 18px; border-radius: 8px; font-size: 0.875rem; cursor: pointer; font-weight: 600; transition: all 0.15s; }
    .btn-view:hover { background: var(--brand-green); color: #fff; }
    .btn-save { background: var(--brand-green); color: #fff; border: none; padding: 10px 24px; border-radius: 8px; font-size: 0.9rem; cursor: pointer; font-weight: 600; margin-top: 8px; transition: background 0.15s; }
    .btn-save:hover { background: var(--brand-green-dark); }

    /* Account form */
    .account-form { max-width: 480px; }
    .form-group { margin-bottom: 18px; }
    .form-group label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.07em; margin-bottom: 6px; }
    .form-input { width: 100%; padding: 10px 14px; border: 1px solid var(--border-subtle); border-radius: 8px; font-size: 0.95rem; color: var(--text-main); box-sizing: border-box; }
    .form-input:focus { outline: none; border-color: var(--brand-green); }
    textarea.form-input { resize: vertical; }

    /* Messages */
    .messages-layout { display: flex; flex-direction: column; gap: 16px; }
    .message-thread { display: flex; flex-direction: column; gap: 12px; max-height: 400px; overflow-y: auto; padding-bottom: 8px; }
    .message { max-width: 70%; padding: 12px 16px; border-radius: 12px; }
    .message.received { background: #f0fdf4; border: 1px solid #d1fae5; align-self: flex-start; }
    .message.sent { background: #EFF6FF; border: 1px solid #DBEAFE; align-self: flex-end; }
    .message-author { font-size: 0.75rem; font-weight: 600; color: var(--text-muted); display: block; margin-bottom: 4px; }
    .message p { margin: 0 0 4px; font-size: 0.9rem; color: var(--text-main); }
    .message-time { font-size: 0.72rem; color: var(--text-muted); }
    .message-input-bar { display: flex; gap: 10px; align-items: center; }
</style>
