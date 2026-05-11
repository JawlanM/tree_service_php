<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContactMessage $contactMessage
 */
?>

<div class="page">

    <section class="content-section">
        <div class="container">

            <div class="contact-card">

                <h2 class="contact-heading" style="color:#1A4D1E;">
                    <?= __('Request a Quote') ?>
                </h2>

                <?= $this->Flash->render() ?>

                <?= $this->Form->create($contactMessage, [
                    'class' => 'form',
                    'type' => 'file'   // for uploads
                ]) ?>

                <fieldset>

                    <!-- BASIC INFO -->
                    <?php
                    echo $this->Form->control('name', ['class' => 'form-input']);
                    echo $this->Form->control('email', ['class' => 'form-input']);
                    echo $this->Form->control('phone', ['class' => 'form-input']);
                    echo $this->Form->control('address', ['class' => 'form-input']);
                    ?>

                    <!-- JOB TITLE + MESSAGE -->
                    <?php
                    echo $this->Form->control('title', ['label' => 'Subject', 'class' => 'form-input']);
                    echo $this->Form->control('message', [
                        'label' => 'Additional Notes',
                        'class' => 'form-input',
                        'rows' => 4
                    ]);
                    ?>

                    <hr style="margin:25px 0;">

                    <!-- ARBORIST QUESTIONNAIRE -->
                    <h3 style="color:#1A4D1E;">Tree / Job Details</h3>

                    <?php
                    echo $this->Form->control('tree_type', [
                        'label' => 'Tree Type (if known)',
                        'class' => 'form-input',
                        'placeholder' => 'e.g., Gum, Pine, Palm, Not sure'
                    ]);

                    echo $this->Form->control('tree_height', [
                        'label' => 'Approximate Tree Height (meters)',
                        'class' => 'form-input'
                    ]);

                    echo $this->Form->control('job_type', [
                        'label' => 'Service Needed',
                        'type' => 'select',
                        'options' => [
                            'Tree Removal' => 'Tree Removal',
                            'Pruning / Trimming' => 'Pruning / Trimming',
                            'Stump Grinding' => 'Stump Grinding',
                            'Health Assessment' => 'Health Assessment',
                            'Storm Damage Cleanup' => 'Storm Damage Cleanup',
                            'Other' => 'Other'
                        ],
                        'empty' => 'Select...',
                        'class' => 'form-input'
                    ]);

                    echo $this->Form->control('location_area', [
                        'label' => 'Where is the tree located?',
                        'type' => 'select',
                        'options' => [
                            'Front Yard' => 'Front Yard',
                            'Back Yard' => 'Back Yard',
                            'Side of Property' => 'Side of Property'
                        ],
                        'empty' => 'Select...',
                        'class' => 'form-input'
                    ]);

                    echo $this->Form->control('access_level', [
                        'label' => 'Access for Equipment',
                        'type' => 'select',
                        'options' => [
                            'Good Access (vehicle can enter)' => 'Good Access (vehicle can enter)',
                            'Partial Access (narrow gate)' => 'Partial Access (narrow gate)',
                            'No Access (manual carry only)' => 'No Access (manual carry only)'
                        ],
                        'empty' => 'Select...',
                        'class' => 'form-input'
                    ]);

                    echo $this->Form->control('hazards', [
                        'label' => 'Nearby Hazards',
                        'type' => 'select',
                        'multiple' => true,
                        'options' => [
                            'Power Lines' => 'Power Lines',
                            'Fence' => 'Fence',
                            'Shed' => 'Shed',
                            'House' => 'House',
                            'Garden Beds' => 'Garden Beds',
                            'None' => 'None'
                        ],
                        'class' => 'form-input'
                    ]);

                    echo $this->Form->control('urgency', [
                        'label' => 'Urgency',
                        'type' => 'select',
                        'options' => [
                            'Normal' => 'Normal',
                            'Urgent (tree is dangerous)' => 'Urgent (tree is dangerous)'
                        ],
                        'empty' => 'Select...',
                        'class' => 'form-input'
                    ]);
                    ?>

                    <hr style="margin:25px 0;">

                    <!-- UPLOADS -->
                    <h3 style="color:#1A4D1E;">Upload Photos / Video</h3>

                    <?= $this->Form->control('photos[]', [
                        'label' => 'Tree Photos (you can select multiple)',
                        'type' => 'file',
                        'multiple' => true,
                        'accept' => 'image/*',
                        'class' => 'form-input'
                    ]) ?>

                    <?= $this->Form->control('video', [
                        'label' => 'Optional Video (max 1)',
                        'type' => 'file',
                        'accept' => 'video/*',
                        'class' => 'form-input'
                    ]) ?>

                </fieldset>

                <!-- CAPTCHA -->
                <div style="margin-top:20px;">
                    <img src="/captcha/image?rand=<?= time() ?>" alt="CAPTCHA" />
                </div>

                <?= $this->Form->control('captcha_input', [
                    'label' => 'Enter the code above',
                    'class' => 'form-input'
                ]) ?>

                <!-- ACTIONS -->
                <div style="margin-top:20px; display:flex; gap:15px; align-items:center;">
                    <?= $this->Form->button(__('Submit'), ['style' => 'background:#1A4D1E; color:white;']) ?>
                    <?= $this->Html->link(__('Back'), '/', ['class' => 'contact-link']) ?>
                </div>

                <?= $this->Form->end() ?>

            </div>

        </div>
    </section>

</div>
