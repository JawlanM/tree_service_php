<h3>Enter your 6‑digit reset code</h3>

<?= $this->Form->create(null, ['url' => ['action' => 'verifyCode', $user->id]]) ?>

<?= $this->Form->control('code', [
    'label' => 'Reset Code',
    'maxlength' => 6,
    'value' => $prefilledCode ?? '',
    'pattern' => '[0-9]{6}',
    'required' => true
]) ?>

<?= $this->Form->button('Verify Code') ?>
<?= $this->Form->end() ?>
