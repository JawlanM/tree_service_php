<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Shift $shift
 * @var \Cake\Collection\CollectionInterface|string[] $services
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

    <div class="column column-80">
        <div class="shifts form content">
            <?= $this->Form->create($shift) ?>
            <fieldset>
                <legend><?= __('Create Job') ?></legend>

                <?php
                echo $this->Form->control('Customer', [
                    'options' => $enquiries,
                    'empty'   => 'Select Enquiry',
                    'label'   => 'Select Enquiry',
                ]);

                echo $this->Form->control('shift_date', ['label' => 'Date', 'id' => 'shift-date']);
                echo $this->Form->control('shift_type', [
                    'type'    => 'select',
                    'options' => ['Morning' => 'Morning', 'Afternoon' => 'Afternoon', 'Full Day' => 'Full Day'],
                    'label'   => 'Shift Type'
                ]);
                echo $this->Form->control('start_time', ['id' => 'start-time', 'label' => 'Start Time']);
                echo $this->Form->hidden('end_time', ['id' => 'end-time-hidden']);
                ?>

                <div class="input">
                    <label for="duration">Duration</label>
                    <select id="duration" name="_duration">
                        <option value="">Select Duration</option>
                        <option value="30">30 minutes</option>
                        <option value="60">1 hour</option>
                        <option value="90">1.5 hours</option>
                        <option value="120">2 hours</option>
                        <option value="180">3 hours</option>
                        <option value="240">4 hours</option>
                        <option value="360">6 hours</option>
                        <option value="480">8 hours (Full Day)</option>
                    </select>
                </div>

                <div id="end-time-display" style="font-size:0.85rem; color:#6B7280; margin-top:4px; margin-bottom:12px;"></div>

                <?php
                echo $this->Form->control('service_id', ['options' => $services, 'empty' => 'Select Service']);
                echo $this->Form->control('location');
                echo $this->Form->control('notes');
                echo $this->Form->control('equipment._ids', [
                    'type'     => 'select',
                    'multiple' => 'checkbox',
                    'options'  => $equipment,
                    'label'    => 'Assign Equipment',
                ]);
                ?>

                <div class="input">
                    <label>Assign Employees</label>
                    <div id="employee-list" style="margin-top: 6px;">
                        <?php foreach ($employees as $id => $name): ?>
                            <div>
                                <label>
                                    <input type="checkbox" name="employees[_ids][]" value="<?= $id ?>">
                                    <?= h($name) ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <p id="availability-hint" style="font-size:0.85rem; color:#6B7280; margin-top:6px;">
                        Select a date, start time and duration to check availability.
                    </p>
                </div>

                <?php
                echo $this->Form->control('status', [
                    'type'    => 'select',
                    'options' => ['pending' => 'Pending', 'active' => 'Active', 'complete' => 'Complete'],
                    'default' => 'pending',
                    'label'   => 'Status'
                ]);
                ?>
            </fieldset>

            <?= $this->Form->button(__('Create Job')) ?>
            <?= $this->Flash->render() ?>
            <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'contact-link']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php $availabilityUrl = $this->Url->build(['controller' => 'Shifts', 'action' => 'availableEmployees']); ?>

<script>
    const dateField      = document.getElementById('shift-date');
    const startTimeField = document.getElementById('start-time');
    const durationField  = document.getElementById('duration');
    const endTimeHidden  = document.getElementById('end-time-hidden');
    const endTimeDisplay = document.getElementById('end-time-display');
    const employeeList   = document.getElementById('employee-list');
    const hint           = document.getElementById('availability-hint');
    const availabilityUrl = "<?= $availabilityUrl ?>";

    function formatTime(val) {
        if (!val) return '';
        return val.length === 5 ? val + ':00' : val;
    }

    function calculateEndTime() {
        const startVal = startTimeField.value;
        const duration = parseInt(durationField.value);

        if (!startVal || !duration) {
            endTimeDisplay.textContent = 'End time will be calculated automatically.';
            endTimeHidden.value = '';
            return;
        }

        const [hours, minutes] = startVal.split(':').map(Number);
        const startDate = new Date();
        startDate.setHours(hours, minutes, 0);
        const endDate = new Date(startDate.getTime() + duration * 60000);

        const endHours   = String(endDate.getHours()).padStart(2, '0');
        const endMinutes = String(endDate.getMinutes()).padStart(2, '0');
        const endTime    = `${endHours}:${endMinutes}:00`;

        endTimeHidden.value = endTime;
        endTimeDisplay.textContent = `End time: ${endHours}:${endMinutes}`;
        endTimeDisplay.style.color = '#1A4D1E';

        checkAvailability();
    }

    function checkAvailability() {
        const date      = dateField.value;
        const startTime = formatTime(startTimeField.value);
        const endTime   = endTimeHidden.value;

        if (!date || !startTime || !endTime) return;

        hint.textContent = 'Checking availability...';

        fetch(`${availabilityUrl}?date=${date}&start_time=${startTime}&end_time=${endTime}`)
            .then(r => r.json())
            .then(employees => {
                const checked = [...employeeList.querySelectorAll('input:checked')].map(i => i.value);

                employeeList.innerHTML = '';
                hint.textContent = '';

                employees.forEach(emp => {
                    const isChecked  = checked.includes(String(emp.id));
                    const labelStyle = emp.available ? '' : 'color: #dc2626;';
                    const suffix     = emp.available ? '' : ' — already booked';
                    const disabled   = emp.available ? '' : 'disabled';

                    employeeList.innerHTML += `
                        <div style="margin-bottom: 4px;">
                            <label style="${labelStyle}">
                                <input type="checkbox"
                                    name="employees[_ids][]"
                                    value="${emp.id}"
                                    ${isChecked && emp.available ? 'checked' : ''}
                                    ${disabled}>
                                ${emp.name}${suffix}
                            </label>
                        </div>`;
                });
            })
            .catch(() => {
                hint.textContent = 'Could not check availability.';
            });
    }

    dateField.addEventListener('change',     checkAvailability);
    startTimeField.addEventListener('change', calculateEndTime);
    durationField.addEventListener('change',  calculateEndTime);
</script>
