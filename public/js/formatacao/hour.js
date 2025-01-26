document.addEventListener('DOMContentLoaded', function () {
    const hoursInput = document.getElementById('hours');
    const minutesInput = document.getElementById('minutes');
    const id = document.getElementById('id');
    const timeHoursInput = document.getElementById('timeHours');

    let valueTime = parseInt(hoursInput.value) + (parseInt(minutesInput.value) / 60);
    timeHoursInput.value  = parseFloat(valueTime.toFixed(2))
    
    if (hoursInput && minutesInput) {
        // Valida o campo de horas
        hoursInput.addEventListener('input', function () {
            let value = parseInt(this.value, 10);

            // Garante que o valor esteja dentro dos limites
            if (value > 999) {
                this.value = 999;
            } else if (value < 0 || isNaN(value)) {
                this.value = '';
            }
            valueTime = parseInt(hoursInput.value) + (parseInt(minutesInput.value) / 60);
            timeHoursInput.value  = parseFloat(valueTime.toFixed(2))
            
        });
        
        // Valida o campo de minutos
        minutesInput.addEventListener('input', function () {
            let value = parseInt(this.value, 10);
            
            // Garante que o valor esteja dentro dos limites
            if (value > 59) {
                this.value = 59;
            } else if (value < 0 || isNaN(value)) {
                this.value = '';
            }
            
            valueTime = parseInt(hoursInput.value) + (parseInt(minutesInput.value) / 60);
            timeHoursInput.value  = parseFloat(valueTime.toFixed(2))
            
        });

    }

});
