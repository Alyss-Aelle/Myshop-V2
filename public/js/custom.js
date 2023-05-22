$(document).ready(function() {

console.log('document chargé');

    $( ".plus" ).on( "click", function() {

        console.log('id='+$(this).data('id'));
        const myId = $(this).data('id');
        console.log('inputValue='+$('#'+myId).val());
        const nextVal= +$('#'+myId).val() + 1;
        console.log(nextVal);
       window.location.href="/cart/add/"+myId+"?quantity="+nextVal;

    } );
/*

    $( "input[type='text']" ).on( "change", function() {
        console.log(this).val();



    } );

    */


})