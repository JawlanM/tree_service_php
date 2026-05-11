<?php
$cakeDescription = 'Arborist Specialist';


$flash = $this->Flash->render();
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <link rel="icon" type="image/png" href="/img/arborist_icon.png?v=<?= time() ?>">

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>


<?php if (!empty($flash)): ?>
    <div id="successModal" class="modal">
        <div class="modal-content">
            <h2>✅ Success</h2>
            <div><?= $flash ?></div>
            <button onclick="closeModal()">Close</button>
        </div>
    </div>
<?php endif; ?>

<!-- NAV -->


<!-- MAIN -->
<main class="main">
    <main class="main">
        <?= $this->fetch('content') ?>
    </main>
</main>

<footer></footer>

<!-- JS -->
<script>
    function closeModal() {
        const modal = document.getElementById('successModal');
        if (modal) modal.style.display = 'none';
    }
</script>

</body>
</html>


