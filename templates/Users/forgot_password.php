<div class="login-card">

    <h2 class="login-title">Forgot Password</h2>

    <!-- EMAIL FORM -->
    <?= $this->Form->create(null, ['url' => '/forgot-password']) ?>
    <?= $this->Form->control('email', [
        'class' => 'input-field',
        'label' => 'Email Address'
    ]) ?>
    <?= $this->Form->button('Send reset link', ['class' => 'login-btn']) ?>
    <?= $this->Form->end() ?>


    <hr style="margin: 30px 0; opacity: .3;">



</div>
