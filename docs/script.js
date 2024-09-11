var elementoDuvida = document.querySelectorAll('.duvida') /*acessar algum documento*/

elementoDuvida.forEach(function (duvida) { /*colocar uma funçao para cada elemento duvida que pegamos*/
    duvida.addEventListener('click', function () {  /*adicionar para cada funçao de duvide para cada evento de click*/
      //duvida.classList.add('fundo-verde') /*esse evento de click vai fazer oq essa linha manda*/
      duvida.classList.toggle('ativa') /*colocar a classe que nao tiver e se tiver vai vai colocar */
    })
})

//function nome (argumento) {
// conteudo de funçao
//} 
