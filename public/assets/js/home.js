const ListBtnDelete = document.querySelectorAll('.btn-delete');

ListBtnDelete.forEach(element => {
    element.addEventListener('click', function(event) {
        event.preventDefault(); 

        const confirmDelete = confirm("Deseja realmente excluir o registro?");

        if(confirmDelete){
            window.location.href = this.getAttribute('href');
        }
    });
});

function formatarMoeda(valor) {
    return new Intl.NumberFormat('pt-BR', {
        style: 'currency',
        currency: 'BRL'
    }).format(valor);
}

function atualizarValorFormatado(input) {
    let valor = input.value.replace(/\D/g, ''); 
    input.value = formatarMoeda(valor / 100);
}

