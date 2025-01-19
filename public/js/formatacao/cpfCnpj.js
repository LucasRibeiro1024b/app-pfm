
function aplicarMascara() {
    const tipo = document.getElementById("type").value; // Obtém o tipo selecionado
    const input = document.getElementById("cpfCnpj");
    let valor = input.value;

    // Remove todos os caracteres que não são dígitos
    valor = valor.replace(/\D/g, '');

    if (tipo === "0") {
    // Aplica máscara para CPF
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    } else if (tipo === "1") {
    // Aplica máscara para CNPJ
    valor = valor.replace(/(\d{2})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{4})$/, '$1/$2');
    valor = valor.replace(/(\d{4})(\d{2})$/, '$1-$2');
    }

    input.value = valor;
}

function atualizarMascara() {
    aplicarMascara();
    const input = document.getElementById("cpfCnpj");
    input.value = ''; // Limpa o campo ao trocar de tipo
    input.placeholder = document.getElementById("type").value === "0"
    ? "Digite o CPF"
    : "Digite o CNPJ";
}
