$('.rating span').click(function(){
    //alert($(this).attr('id'));
    //document.location.href = '/user_detail/setRating/' + $(this).attr('id');
    //document.location.href = '/user_detail/setRating/1';

    //document.getElementById("stars").className = "rated";

    var rating = $(this).attr('id');
    for (var i = 1; i <= 5; i++)
    {
        var id = document.getElementById(i);

        if(i <= rating)
        {
           id.className = '';
           id.className += 'set';
        }
        else
        {
           id.className = '';
        }
    }

    document.getElementById('rating').value = rating;
});