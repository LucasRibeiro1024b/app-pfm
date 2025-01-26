document.addEventListener('DOMContentLoaded', function () {
    const hoursInput = document.getElementById('hours');
    const minutesInput = document.getElementById('minutes');
    const predicted_hour = document.getElementById('predicted_hour');

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

            let valuePredictedHour = parseInt(hoursInput.value) + (parseInt(minutesInput.value) / 60);
            predicted_hour.value  = parseFloat(valuePredictedHour.toFixed(2))
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

            let valuePredictedHour = parseInt(hoursInput.value) + (parseInt(minutesInput.value) / 60);
            predicted_hour.value  = parseFloat(valuePredictedHour.toFixed(2))
        });

    }

});


function hoursMinutes(time) {
    // Separa a parte inteira (horas) e a parte decimal (minutos)
    const hours = Math.floor(time);  // Parte inteira
    const minutes = Math.round((time - hours) * 60);  // Parte decimal multiplicada por 60 (minutos)

    // Formata para garantir que minutos e horas tenham dois dígitos (ex: 09:05)
    const formattedHours = hours < 10 ? '0' + hours : hours;
    const formattedMinutes = minutes < 10 ? '0' + minutes : minutes;

    document.getElementById('hours').value = formattedHours;
    document.getElementById('minutes').value = formattedMinutes;

    console.log('teste');
}