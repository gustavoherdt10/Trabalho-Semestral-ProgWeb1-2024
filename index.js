// Função para buscar perguntas via Ajax
document.addEventListener('DOMContentLoaded', function() {
    fetch('buscar_perguntas.php')
        .then(response => response.json())
        .then(perguntas => {
            const perguntasContainer = document.getElementById('perguntas-container');
            perguntas.forEach(pergunta => {
                perguntasContainer.innerHTML += `
                    <div class="pergunta">
                        <label>${pergunta.texto_pergunta}</label>
                        <div class="notas">
                            ${[...Array(11).keys()].map(i => `
                                <input type="radio" name="pergunta${pergunta.id}" value="${i}" id="pergunta${pergunta.id}_${i}">
                                <label for="pergunta${pergunta.id}_${i}" class="nota nota-${i}">${i}</label>
                            `).join('')}
                        </div>
                    </div>
                `;
            });
        })
        .catch(error => console.error('Erro ao buscar perguntas:', error));
});