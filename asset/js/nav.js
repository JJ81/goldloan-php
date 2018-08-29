/* 메뉴선택시 섹션 이동 설정 */
var menu_nav = $('.nav-auto');
menu_nav.delegate('li', 'click', function () {
    var idx = $(this).index();
    console.log($(this).index());

    if(idx === 0){
        moveToPosY('body');
    } else if (idx === 1){
        moveToPosY('.second-about-area');
    } else if(idx === 2){
        moveToPosY('.second-loan-process');
    } else if(idx === 3){
        moveToPosY('.loan-second-services');
    } else if(idx === 4){
        moveToPosY('.custom-faq');
    }
});


function moveToPosY(element){
    var pos = Math.ceil($(element).offset().top - 50);
    console.log('pos : ' + pos);
    $( document ).scrollTop( pos );
}