// Array de perguntas simuladas (em uma aplicação real, essas seriam carregadas do servidor)
const perguntas = [
    "Como você avalia o atendimento do Hospital?"
];

// Função para carregar perguntas dinamicamente
function carregarPerguntas() {
    const container = document.getElementById("perguntas-container");

    perguntas.forEach((texto, index) => {
        // Criar container da pergunta
        const perguntaDiv = document.createElement("div");
        perguntaDiv.classList.add("pergunta");

        // Adicionar o texto da pergunta
        const label = document.createElement("label");
        label.textContent = texto;
        perguntaDiv.appendChild(label);

        // Criar a escala de 0 a 10
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

// Função para enviar o formulário
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

    alert("O Hospital Regional Alto Vale (HRAV) agradece sua resposta. Ela é muito importante para nós!");
    document.getElementById("avaliacao-form").reset();
}

// Inicializar
document.addEventListener("DOMContentLoaded", () => {
    carregarPerguntas();
    document.getElementById("avaliacao-form").addEventListener("submit", enviarFormulario);
});
