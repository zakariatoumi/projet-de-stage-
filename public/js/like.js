
var postId = 0;

$('.like').on('click', function (event){
    event.preventDefault();
    postId = event.target.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token}
    })
    .done(function() {
        event.target.innerText = isLike ? event.target.innerText == 'j\'aime' ? 'Vous aimez ce publication' : 'j\'aime' : event.target.innerText == 'je n\'aime pas' ? 'Vous n\'aimez pas ce publication' : 'je n\'aime pas';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'je n\'aime pas';
            } else {
                event.target.previousElementSibling.innerText = 'j\'aime';
            }
    });
});