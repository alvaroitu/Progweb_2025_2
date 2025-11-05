// Função para limpar o formulário
function limparFormulario() {
    document.getElementById('id').value = '';
    document.getElementById('nome').value = '';
    document.getElementById('matricula').value = '';
    document.getElementById('curso').value = '';
    document.getElementById('periodo').value = '';
    const radios = document.getElementsByName('status');
    for (let radio of radios) {
        radio.checked = false;
    }
}

function editarAluno(id) {
    // Fetch student data
    fetch(`includes/processar.php?action=get&id=${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
                return;
            }
            
            // Fill form with student data
            document.getElementById('id').value = data.id;
            document.getElementById('nome').value = data.nome;
            document.getElementById('matricula').value = data.matricula;
            document.getElementById('curso').value = data.curso;
            document.getElementById('periodo').value = data.periodo;
            
            // Set radio button
            const radioStatus = document.querySelector(`input[name="status"][value="${data.status}"]`);
            if (radioStatus) {
                radioStatus.checked = true;
            }
            
            // Scroll to form
            document.querySelector('.form-container').scrollIntoView({
                behavior: 'smooth'
            });
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Erro ao carregar dados do aluno');
        });
}

// Manipular o envio do formulário
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault(); // Previne o envio padrão do formulário
    
    // Verifica se todos os campos estão preenchidos
    const nome = document.getElementById('nome').value.trim();
    const matricula = document.getElementById('matricula').value.trim();
    const curso = document.getElementById('curso').value;
    const periodo = document.getElementById('periodo').value;
    const status = document.querySelector('input[name="status"]:checked');
    
    if (!nome || !matricula || !curso || !periodo || !status) {
        alert('Por favor, preencha todos os campos do formulário!');
        return;
    }
    
    // Se tudo estiver preenchido, envia o formulário
    this.submit();
    
    // Limpa o formulário
    limparFormulario();
    
    // Rola para o topo da página
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});