<div class="dashboard-wrapper">

    <div class="sidebar">
        
        <?= $this->element('sidebar') ?>
    </div>

    <div class="main-content">
        <div class="welcome-card">
            <h1 class="welcome-title">Welcome back, <?= $this->Authentication->get('name') ?: 'Admin' ?></h1>
            <p class="welcome-sub">Manage your arborist business from here.</p>
        </div>

        <div class="stat-boxes">
            <div class="stat-card">
                <span class="stat-number"><?= $enquiryCount ?></span>
                <span class="stat-label">Enquiries</span>
            </div>
            <div class="stat-card">
                <span class="stat-number"><?= $serviceCount ?></span>
                <span class="stat-label">Services Offered</span>
            </div>
        </div>

        <div class="quick-links">

            <a href="/contact-messages" class="quick-card">
                <span class="quick-icon">📋</span>
                <span class="quick-label">Enquiries</span>
            </a>

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


    .stat-boxes {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 32px;
    }
    .stat-card {
        background: var(--card-bg);
        border: 1px solid var(--border-subtle);
        border-radius: 16px;
        padding: 28px 24px;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
        border-left: 5px solid var(--brand-green);
        display: flex;
        flex-direction: column;
        gap: 6px;
    }
    .stat-number {
        font-family: 'Jockey One', sans-serif;
        font-size: 3rem;
        color: var(--brand-green);
        line-height: 1;
    }
    .stat-label {
        font-size: 1rem;
        color: var(--text-muted);
    }

    /* ── Layout ── */
    .dashboard-wrapper {
        display: flex;
        min-height: 100vh;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        font-size: 1.5rem;
        position: fixed;
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

    /* ── Welcome Card ── */
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
        font-size: 3rem;
        color: var(--brand-green);
        margin: 0 0 8px;
        letter-spacing: 0.02em;
    }
    .welcome-sub {
        margin: 0;
        font-size: 1.5rem;
        color: var(--text-muted);
    }

    /* ── Quick Links Grid ── */
    .quick-links {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
        gap: 20px;
    }
    .quick-card {
        background: var(--card-bg);
        border-radius: 16px;
        padding: 28px 20px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(15,23,42,0.08);
        border: 1px solid var(--border-subtle);
        text-decoration: none;
        color: var(--text-main);
        transition: transform 0.2s, box-shadow 0.2s;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 12px;
    }
    .quick-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 36px rgba(15,23,42,0.12);
    }
    .quick-icon { font-size: 2.2rem; }
    .quick-label {
        font-family: 'Jockey One', sans-serif;
        font-size: 1.5rem;
        color: var(--brand-green);
        letter-spacing: 0.02em;
    }
</style>
