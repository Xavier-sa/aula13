function exibirNotificacao(message, type) {
    const notificacao = document.createElement('div');
    notificacao.className = `notificacao ${type}`;
    notificacao.textContent = message;
    document.body.appendChild(notificacao);

    // Remover notificação após 3 segundos
    setTimeout(() => {
        notificacao.remove();
    }, 3000);
}

// Capturar parâmetro de mensagem
function iniciarNotificacao() {
    const params = new URLSearchParams(window.location.search);
    if (params.has('mensagem')) {
        const mensagem = params.get('mensagem');

        // Verificar o valor da mensagem e definir a notificação correspondente
        if (mensagem === "sucesso") {
            exibirNotificacao("Operação realizada com sucesso!", "sucesso");
        } else if (mensagem === "erro") {
            exibirNotificacao("Ocorreu um erro ao realizar a operação.", "erro");
        }

        params.delete('mensagem');
        const newUrl = `${window.location.pathname}?${params.toString()}`;
        window.history.replaceState(null, '', newUrl);
    }
}

export { iniciarNotificacao };