function carregarPerguntas() {
    const container = document.getElementById("perguntas-container");

    // Requisição AJAX para buscar as perguntas
    fetch('busca_perguntas.php')
        .then(response => response.json())
        .then(perguntas => {
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
        })
        .catch(error => {
            console.error("Erro ao carregar perguntas:", error);
        });
}

function enviarFormulario(event) {
    event.preventDefault();

    const respostas = [];
    const perguntas = document.querySelectorAll('input[type="radio"]:checked');
    perguntas.forEach(input => {
        const perguntaId = input.name.split('-')[1]; // Para identificar a pergunta
        respostas.push({
            perguntaId: perguntaId,
            resposta: input.value
        });
    });

    const feedback = document.getElementById("feedback").value;

    const dados = {
        respostas: respostas,
        feedback: feedback
    };

    console.log(dados);

    // Aqui você pode enviar os dados para o PHP, por exemplo via AJAX (POST)
    fetch('salvar_avaliacao.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(dados)
    })
    .then(response => response.json())
    .then(data => {
        console.log("Avaliação salva com sucesso:", data);
        window.location.href = "agradecimento.html";
    })
    .catch(error => {
        console.error("Erro ao salvar avaliação:", error);
    });
}

document.addEventListener("DOMContentLoaded", () => {
    carregarPerguntas();
    document.getElementById("avaliacao-form").addEventListener("submit", enviarFormulario);
});
