$(document).ready(function(){

    searchForm();
    menu();
    removeImageAttr();
    addTOCIcon();
    window.onscroll = function() {backTopButton()};
});

function backTopButton(){

    if(document.body.scrollTop > 20 || document.documentElement.scrollTop > 20){
        $('#backTop').addClass("show");
    } else {
        $('#backTop').removeClass("show");
    }
}

function goTop(){
    if (document.body.scrollTop !== 0 || document.documentElement.scrollTop !== 0) {
        window.scrollBy(0, -Math.max(1, Math.floor((document.body.scrollTop || document.documentElement.scrollTop) / 10)));
        requestAnimationFrame(goTop);
    }
}

function menu(){

    $('#button_menu').on('click', function (){

        $('#button_menu').toggleClass('active');
        $('#section_menu').toggleClass('active');
    });
}

function searchForm(){

    $('#input_searchSubmit').on('click', function(){
        $('#input_search').submit();
    });

    $('#input_search').on({

        mouseenter: () => {
            $('#input_searchInput').addClass('active');
            $('#logo_stclogo').addClass('hidden');
        },

        focuson: () => {
            $('#input_searchInput').addClass('active');
            $('#logo_stclogo').addClass('hidden');
        },

        mouseleave: () => {

            if(!$('#input_searchInput').val() && !$('#input_searchInput').is(':focus')){
                $('#input_searchInput').removeClass('active');
                $('#logo_stclogo').removeClass('hidden');
            } 
        },

        focusout: () => {

            if(!$('#input_searchInput').val()){
                $('#input_searchInput').removeClass('active');
                $('#logo_stclogo').removeClass('hidden');
            } 
        }
    });
}

/**
 * @description Remove fixed img dimensions attributes.
 */
function removeImageAttr(){
    $('img').removeAttr('width height');
}

/**
 * @description Add MS icon to the Easy TOC plugin's TOC.
 */
function addTOCIcon(){
    $('.ez-toc-icon-toggle').addClass('ms-Icon ms-Icon--ContextMenu');
}