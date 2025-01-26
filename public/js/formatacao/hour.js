document.addEventListener('DOMContentLoaded', function () {
    const modals = document.querySelectorAll('.dados');

    modals.forEach((modal) => {
        const hoursInput = modal.querySelector('.hours');
        const minutesInput = modal.querySelector('.minutes');
        const timeHoursInput = modal.querySelector('.timeHours');

        const updateTime = () => {
            const hours = parseInt(hoursInput.value, 10) || 0;
            const minutes = parseInt(minutesInput.value, 10) || 0;
            const valueTime = hours + minutes / 60;
            timeHoursInput.value = parseFloat(valueTime.toFixed(2));
        };

        const validateAndUpdate = (input, max) => {
            let value = parseInt(input.value, 10);
            if (isNaN(value) || value < 0) {
                input.value = '';
            } else if (value > max) {
                input.value = max;
            }
            updateTime();
        };

        hoursInput.addEventListener('input', function () {
            validateAndUpdate(this, 999);
        });

        minutesInput.addEventListener('input', function () {
            validateAndUpdate(this, 59);
        });
    });
});
