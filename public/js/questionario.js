document.addEventListener("DOMContentLoaded", () => {
    let perguntaIndex = 0;

    const container = document.getElementById("perguntas-container");
    const addPerguntaBtn = document.getElementById("add-pergunta");

    // Adicionar pergunta
    const addPergunta = () => {
        const perguntaHtml = `
            <div class="pergunta" data-index="${perguntaIndex}">
                <h5>Pergunta ${perguntaIndex + 1}</h5>
                <div class="mb-3">
                    <label class="form-label">Texto da Pergunta</label>
                    <input type="text" name="perguntas[${perguntaIndex}][texto]" class="form-control" placeholder="Digite a pergunta" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tipo da Pergunta</label>
                    <select name="perguntas[${perguntaIndex}][tipo]" class="form-select tipo-pergunta" required>
                        <option value="" disabled selected>Selecione o tipo</option>
                        <option value="texto">Texto</option>
                        <option value="multipla_escolha">Múltipla Escolha</option>
                    </select>
                </div>
                <div class="opcoes-container d-none">
                    <h6>Opções</h6>
                    <div class="opcoes-list"></div>
                    <button type="button" class="btn btn-sm btn-secondary add-opcao">Adicionar Opção</button>
                </div>
            </div>`;
        container.insertAdjacentHTML("beforeend", perguntaHtml);
        perguntaIndex++;
    };

    // Adicionar opção
    const addOpcao = (opcoesList, index) => {
        const opcaoHtml = `
            <div class="opcao">
                <input type="text" name="perguntas[${index}][opcoes][]" class="form-control" placeholder="Digite uma opção" required>
                <select name="perguntas[${index}][valores][]" class="form-select">
                    <option value="" disabled selected>Valor</option>
                    ${[1, 2, 3, 4, 5].map(v => `<option value="${v}">${v}</option>`).join("")}
                </select>
                <button type="button" class="btn btn-danger btn-sm remove-opcao">X</button>
            </div>`;
        opcoesList.insertAdjacentHTML("beforeend", opcaoHtml);
    };

    // Eventos
    addPerguntaBtn.addEventListener("click", addPergunta);

    container.addEventListener("click", (e) => {
        if (e.target.classList.contains("add-opcao")) {
            const opcoesContainer = e.target.closest(".pergunta").querySelector(".opcoes-list");
            const index = e.target.closest(".pergunta").getAttribute("data-index");
            addOpcao(opcoesContainer, index);
        }

        if (e.target.classList.contains("remove-opcao")) {
            e.target.closest(".opcao").remove();
        }
    });

    container.addEventListener("change", (e) => {
        if (e.target.classList.contains("tipo-pergunta")) {
            const opcoesContainer = e.target.closest(".pergunta").querySelector(".opcoes-container");
            if (e.target.value === "multipla_escolha") {
                opcoesContainer.classList.remove("d-none");
            } else {
                opcoesContainer.classList.add("d-none");
            }
        }
    });
});
