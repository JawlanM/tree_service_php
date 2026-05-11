<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="page">

    <section class="content-section">
        <div class="container">

            <div style="display:flex; gap:30px; flex-wrap:wrap;">

                <!-- SIDE NAV -->
                <aside style="flex:1 1 220px;">
                    <div class="why-card">
                        <h4 class="contact-heading"><?= __('Actions') ?></h4>

                        <?= $this->Html->link(
                            __('List Users'),
                            ['action' => 'index'],
                            ['class' => 'contact-link']
                        ) ?>
                    </div>
                </aside>

                <!-- FORM -->
                <div style="flex:3 1 500px;">
                    <div class="contact-card">

                        <h2 class="contact-heading"><?= __('Add User') ?></h2>

                        <?= $this->Form->create($user, ['class' => 'form']) ?>

                        <fieldset>
                            <?php
                            echo $this->Form->control('name', ['class' => 'form-input']);
                            echo $this->Form->control('email', ['class' => 'form-input']);
                            echo $this->Form->control('password', ['class' => 'form-input']);
                            echo $this->Form->control('reset_token', ['class' => 'form-input']);
                            echo $this->Form->control('reset_token_expires', [
                                'empty' => true,
                                'class' => 'form-input'
                            ]);
                            echo $this->Form->control('created_time', ['class' => 'form-input']);
                            echo $this->Form->control('last_modified', ['class' => 'form-input']);
                            echo $this->Form->control('role', ['class' => 'form-input']);
                            ?>
                        </fieldset>

                        <div style="margin-top:20px;">
                            <?= $this->Form->button(__('Submit'), ['class' => 'btn-primary']) ?>
                        </div>

                        <?= $this->Form->end() ?>

                    </div>
                </div>

            </div>

        </div>
    </section>

</div>
