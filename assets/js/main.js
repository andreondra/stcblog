$(document).ready(function(){

    searchForm();
    menu();
});

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