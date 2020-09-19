require('./bootstrap');


$('.user-link').click(function (e){

    var linkId = $(this).data('link-id');
    let linkUrl = $(this).attr('href');

    axios.post('/visit/' + linkId,
        {link: linkUrl})
    .then(res => console.log('response: ', res))
        .catch(error => console.error('error: ', error));
});
