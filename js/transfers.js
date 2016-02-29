$(window).load(function(){
    var d = new Date();

    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '/' +
    ((''+month).length<2 ? '0' : '') + month + '/' +
    ((''+day).length<2 ? '0' : '') + day;
        
    $("#dateService").val(output);
    
    $('#transfers .info a ').click(function(){
        $('#processTransfer').fadeIn();
        var info = $(this).parent();
        var serviceName = $(info).children(0).html();
        $('#titleText').text(serviceName);
        $('#titleInput').val(serviceName);
        goToByScroll('processTransfer');
        return false;
    });
});

  // This is a functions that scrolls to #{blah}link
function goToByScroll(id){
      // Remove "link" from the ID
    id = id.replace("link", "");
      // Scroll
    $('html,body').animate({
        scrollTop: $("#"+id).offset().top},
        'slow');
}