document.addEventListener('DOMContentLoaded', function () {
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function (e) {
            let value = e.target.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            value = value.replace(/^(\d{2})(\d)/g, '($1) $2'); // Adiciona parênteses
            value = value.replace(/(\d{5})(\d)/, '$1-$2'); // Adiciona hífen
            e.target.value = value.substring(0, 15); // Limita o tamanho máximo
        });
    }
});
