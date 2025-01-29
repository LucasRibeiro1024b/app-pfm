document.addEventListener('DOMContentLoaded', function () {
    const valueInput = document.getElementById('value');

    if (valueInput) {
        // Formata o campo enquanto o usuário digita
        valueInput.addEventListener('input', function (e) {
            let value = e.target.value;

            // Remove qualquer caractere que não seja número ou vírgula
            value = value.replace(/[^\d,]/g, '');

            // Substitui a vírgula por um ponto para preparar para salvar no BD
            const parts = value.split(',');

            // **** Limita a duas casas decimais
            if (parts.length > 1) {
                parts[1] = parts[1].substring(0, 2);
            }

            parts[0] = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, '.'); // Adiciona pontos para separar milhar
            e.target.value = parts.join(',');
        });

        // Converte o valor para o formato americano ao enviar o formulário
        const form = valueInput.closest('form');
        if (form) {
            form.addEventListener('submit', function () {
                let value = valueInput.value;

                // Remove pontos e substitui vírgula por ponto
                value = value.replace(/\./g, '').replace(',', '.');

                // Atualiza o valor do input para o formato americano
                valueInput.value = value;
            });
        }
    }
});
