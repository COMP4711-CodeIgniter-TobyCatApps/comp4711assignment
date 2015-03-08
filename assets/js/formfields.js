function updateUploadImagePreview(input)
{
    // creating acquiring handles to DOM elements
    var thumbnailContainerElement =
        input.parentNode.querySelector('.thumbnailContainer');

    // clear previous image previews
    while(thumbnailContainerElement.firstChild != null)
    {
        thumbnailContainerElement.firstChild.remove();
    }

    // load new images as image previews
    if (input.files) {
        // create file reader
        var reader = new FileReader();

        // override onload callback
        var i = 0;
        reader.onload = function(e) {
            // create thumbnail
            var thumbnailElement = document.createElement('img');
            thumbnailElement.classList.add('thumbnail')
            thumbnailElement.setAttribute('src', e.target.result);

            // append thumbnail to document
            thumbnailContainerElement.appendChild(thumbnailElement);

            // load the next file if there is one
            reader.readAsDataURL(input.files[i++]);
        };

        // begin loading images
        reader.readAsDataURL(input.files[i++]);
    }
}
