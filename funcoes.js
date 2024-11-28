const perguntas = [
    "Como você avalia o atendimento no hospital?",
];

function carregarPerguntas() {
    const container = document.getElementById("perguntas-container");

    perguntas.forEach((texto, index) => {
        const perguntaDiv = document.createElement("div");
        perguntaDiv.classList.add("pergunta");

        const label = document.createElement("label");
        label.textContent = texto;
        perguntaDiv.appendChild(label);

        const escalaDiv = document.createElement("div");
        escalaDiv.classList.add("escala-container");

        for (let i = 0; i <= 10; i++) {
            const input = document.createElement("input");
            input.type = "radio";
            input.name = `pergunta-${index}`;
            input.id = `pergunta-${index}-${i}`;
            input.value = i;

            const escalaLabel = document.createElement("label");
            escalaLabel.htmlFor = `pergunta-${index}-${i}`;
            escalaLabel.classList.add(`escala-${i}`);
            escalaLabel.textContent = i;

            escalaDiv.appendChild(input);
            escalaDiv.appendChild(escalaLabel);
        }

        perguntaDiv.appendChild(escalaDiv);
        container.appendChild(perguntaDiv);
    });
}

function enviarFormulario(event) {
    event.preventDefault();

    const respostas = [];
    perguntas.forEach((_, index) => {
        const resposta = document.querySelector(`input[name="pergunta-${index}"]:checked`);
        respostas.push(resposta ? resposta.value : null);
    });

    const feedback = document.getElementById("feedback").value;

    console.log({
        respostas,
        feedback
    });

    // Exibe mensagem de agradecimento e redireciona para a página de agradecimento
    alert("O Hospital Regional Alto Vale (HRAV) agradece sua resposta. Ela é muito importante para nós!");
    window.location.href = "agradecimento.html";
}

// Evento para carregar perguntas ao carregar a página
document.addEventListener("DOMContentLoaded", () => {
    carregarPerguntas();
    document.getElementById("avaliacao-form").addEventListener("submit", enviarFormulario);
});
