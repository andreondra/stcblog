$(document).ready(function(){

    search();
});

function search(){

    $('.nav__buttons__search').on({

        mouseenter: () => {
            $('.nav__buttons__search__input').addClass('active');
        },

        focuson: () => {
            $('.nav__buttons__search__input').addClass('active');
        },

        mouseleave: () => {

            if(!$('.nav__buttons__search__input').val() && !$('.nav__buttons__search__input').is(':focus')){
                $('.nav__buttons__search__input').removeClass('active');
            } 
        },

        focusout: () => {

            if(!$('.nav__buttons__search__input').val()){
                $('.nav__buttons__search__input').removeClass('active');
            } 
        }
    });
}