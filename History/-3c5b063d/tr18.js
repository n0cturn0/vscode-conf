$(document).ready(function(){
    $('.menu-responsivo').click(function(){
        if ($(".menu").hasClass("d-none")) {
            $(".menu").hide().removeClass("d-none").slideDown(1000);
        } else {
            $(".menu").slideUp(1000, function(){
                $(".menu").addClass("d-none");
            });
        }
    });
});

$(document).ready(function() {
    var SPMaskBehavior = function (val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
        onKeyPress: function(val, e, field, options) {
            field.mask(SPMaskBehavior.apply({}, arguments), options);
        }
    };
    $('.celular-mask').mask(SPMaskBehavior, spOptions);
    
    $('#formcontato').submit(function(){
        var dados = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "enviar.php",
            data: dados,
            dataType: 'json',
            beforeSend: function(){
                $("#resultado").removeClass('alert-white alert-danger alert-success alert-warning').addClass('alert alert-white');
                $("#resultado").html('Aguarde, enviando a mensagem');
                $("#resultado").fadeIn(250);
            },
            success: function(resposta){
                $("#resultado").removeClass("alert-white alert-danger alert-success alert-warning").addClass(resposta.tipo);
                $("#resultado").html(resposta.mensagem);
                console.log(resposta);
            },
            error: function(resposta){
                $("#resultado").removeClass("alert-white alert-danger alert-success alert-warning").addClass('alert-danger');
                $("#resultado").html('Um erro desconhecido aconteceu e sua mensagem não pode ser enviada');
                console.log(resposta);
                $('#resposta-erro').html(resposta.responseText);
            }
        });
        return false;
    });

});

function reloadcaptcha(){
    $('#imgcaptcha').attr('src','captcha.php?l=185&a=50&tf=23&ql=5&new='+(new Date()).getTime());
}

//Função para abrir pop up
function popup(url){
    varWindow = window.open (
        url,
        'Compartilhar',
        'width=500, height=650, top=100, left=200, scrollbars=no'
    );
}

//Constrói a URL depois que o DOM estiver pronto        
document.addEventListener("DOMContentLoaded", function() {
    var url = encodeURIComponent(window.location.href);
    var titulo = encodeURIComponent(document.title).replace(/'|"|%25/g, "");
    //var via = encodeURIComponent("usuario-twitter"); //nome de usuário do twitter do seu site
    
    //document.getElementById("share-facebook").href = "javascript:popup('https://www.facebook.com/sharer/sharer.php?u=" + url+"')";//altera a URL do botão facebook
    //document.getElementById("share-twitter").href = "javascript:popup('https://twitter.com/intent/tweet?url="+url+"&text="+titulo+"')";//altera a URL do botão
    //document.getElementById("share-twitter").href = "javascript:popup(https://twitter.com/intent/tweet?url="+url+"&text="+titulo+"&via="+via+"')"; //se for usar o atributo via, utilize a seguinte url
    
    //tenta obter o conteúdo da meta tag description
    var summary = document.querySelector("meta[name='description']");
    summary = (!!summary)? summary.getAttribute("content") : null;
    
    //se a meta tag description estiver ausente...
    if(!summary){
        //...tenta obter o conteúdo da meta tag og:description
        summary = document.querySelector("meta[property='og:description']");
        summary = (!!summary)? summary.getAttribute("content") : null;
    }
    //altera o link do botão
    linkedinLink = (!!summary)? "https://www.linkedin.com/shareArticle?mini=true&url="+url+"&title="+titulo + "&summary=" + encodeURIComponent(summary) : "https://www.linkedin.com/shareArticle?mini=true&url="+url+"&title="+titulo;
    document.getElementById("share-linkedin").href = "javascript:popup('"+linkedinLink+"')";
}, false);