<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Arborist Specialist</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <?= $this->Html->css('login') ?>
</head>
<body class="login-page">
<!-- SPLIT SCREEN CONTAINER -->
<div class="login-split">
    <!-- LEFT: IMAGE PANEL -->
    <div class="login-image-panel">
        <div class="login-image-overlay"></div>
        <img src="/img/login_4k.png" alt="Professional Arborist" class="login-bg-image">
        <div class="login-image-content">
            <div class="login-brand">
                <svg class="brand-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 3v18M12 3c-2 2-5 3-7 3 1 4 3 8 7 12M12 3c2 2 5 3 7 3-1 4-3 8-7 12"/>
                </svg>
                <span class="brand-name">Arborist Specialist</span>
            </div>
            <div class="login-image-text">
                <h1>Professional Tree Care Management</h1>
                <p>Streamline your operations with our comprehensive business platform.</p>
            </div>
        </div>
    </div>
    <!-- RIGHT: LOGIN FORM PANEL -->
    <div class="login-form-panel">
        <!-- BACK LINK -->
        <div class="login-top-nav">
            <a href="/" class="back-link">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                Back to Homepage
            </a>
        </div>
        <!-- LOGIN CARD -->
        <div class="login-card-wrapper">
            <div class="login-card">
                <!-- FLASH MESSAGES -->
                <?= $this->Flash->render() ?>
                <!-- HEADER -->
                <div class="login-header">
                    <h2 class="login-title">Welcome back</h2>
                    <p class="login-subtitle" id="login-sub">Sign in to your customer account</p>
                </div>
                <!-- TOGGLE TABS -->
                <div class="login-toggle">
                    <div class="toggle-track">
                        <div class="toggle-indicator" id="toggle-indicator"></div>
                        <button type="button" class="toggle-option active" id="btn-customer" onclick="switchTab('customer')">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            Customer
                        </button>
                        <button type="button" class="toggle-option" id="btn-employee" onclick="switchTab('employee')">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/>
                            </svg>
                            Employee
                        </button>
                    </div>
                </div>
                <!-- FORM -->
                <?= $this->Form->create(null, ['url' => '/users/login', 'class' => 'login-form']) ?>
                <?= $this->Form->hidden('login_type', ['id' => 'login-type-field', 'value' => 'customer']) ?>
                <div class="form-group">
                    <label for="email" class="form-label">Email address</label>
                    <?= $this->Form->control('email', [
                        'label'       => false,
                        'class'       => 'form-input',
                        'placeholder' => 'you@example.com',
                        'id'          => 'email'
                    ]) ?>
                </div>
                <div class="form-group">
                    <div class="form-label-row">
                        <label for="password" class="form-label">Password</label>
                        <a href="/forgot-password" class="form-link">Forgot password?</a>
                    </div>
                    <?= $this->Form->control('password', [
                        'label'       => false,
                        'class'       => 'form-input',
                        'placeholder' => 'Enter your password',
                        'id'          => 'password'
                    ]) ?>
                </div>
                <div class="form-group">
                    <?= $this->Form->button('Sign In', ['class' => 'btn-submit']) ?>
                </div>
                <?= $this->Form->end() ?>
                <!-- FOOTER -->
                <div class="login-footer">
                    <p>Don&apos;t have an account? <a href="/register" class="footer-link">Get started</a></p>
                </div>
            </div>
        </div>
        <!-- BOTTOM LINKS -->
        <div class="login-bottom">
            <span>&copy; <?= date('Y') ?> Arborist Specialist</span>
            <a href="/privacy">Privacy</a>
            <a href="/terms">Terms</a>
        </div>
    </div>
</div>
<script>
    function switchTab(tab) {
        document.getElementById('login-type-field').value = tab;
        const btnCustomer = document.getElementById('btn-customer');
        const btnEmployee = document.getElementById('btn-employee');
        const indicator = document.getElementById('toggle-indicator');
        const sub = document.getElementById('login-sub');
        btnCustomer.classList.toggle('active', tab === 'customer');
        btnEmployee.classList.toggle('active', tab === 'employee');
        // Move indicator
        indicator.style.transform = tab === 'customer' ? 'translateX(0)' : 'translateX(100%)';
        // Update subtitle
        sub.textContent = tab === 'customer'
            ? 'Sign in to your customer account'
            : 'Sign in to your employee account';
    }
</script>
</body>
</html>
