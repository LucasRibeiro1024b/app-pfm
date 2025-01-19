
function aplicarMascara() {
    const tipo = document.getElementById("type").value; // Obtém o tipo selecionado
    const input = document.getElementById("cpfCnpj");
    let valor = input.value;
    atualizarMascara();

    // Remove todos os caracteres que não são dígitos
    valor = valor.replace(/\D/g, '');

    if (tipo === "0") {
    // Aplica máscara para CPF
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');
    valor = valor.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
} else if (tipo === "1") {
    // Aplica máscara para CNPJ
    valor = valor.replace(/(\d{2})(\d)/, '$1.$2');       // Primeiro ponto
    valor = valor.replace(/(\d{3})(\d)/, '$1.$2');       // Segundo ponto
    valor = valor.replace(/(\d{3})(\d{4})/, '$1/$2');    // Barra
    valor = valor.replace(/(\d{4})(\d{1,2})$/, '$1-$2'); // Hífen
  }

    input.value = valor;
}

function atualizarMascara() {
    const input = document.getElementById("cpfCnpj");
    const tipo = document.getElementById("type").value;

    // Ajusta o placeholder e o maxlength com base no tipo
    if (tipo === "0") {
      input.placeholder = "Digite o CPF";
      input.maxLength = 14; // 11 dígitos + 3 separadores
    } else {
      input.placeholder = "Digite o CNPJ";
      input.maxLength = 18; // 14 dígitos + 4 separadores
    }

    input.value = ''; // Limpa o campo ao trocar de tipo
  }