const newPostItemImageButton = document.getElementById('new-post-item-image-button');
const newPostItemImageInput = document.getElementById('new-post-item-cover');
if(newPostItemImageButton != null){
    newPostItemImageButton.addEventListener('click', newPostItemImage);
}
if(newPostItemImageInput != null){
    newPostItemImageInput.addEventListener('change', newPostItemImageChanged);
}

function newPostItemImage(){
    document.getElementById('new-post-item-cover').click();
}

function newPostItemImageChanged(e){
    const images = e.target.files;
    let count = 0;
    if(images.length>0){
        newPostItemImageClear(this, false);
        let imagesContainer = document.getElementById("new-post-item-image-preview");

        /*(function(file) {
            let imageNode = createNodeFromString("<img class='new-post-image'  src=''>");
            let reader = new FileReader();
            reader.onload = function () {
                var imageObject = new Image();
                imageObject.src = reader.result;
                imageObject.onload = function() {
                    if(this.width>=800 && this.height>=300){
                        imageNode.setAttribute("src", reader.result);
                    }else{
                        ShowDanger('New Item image minimum 800x300px.');
                        newPostItemImageClear(this,true);
                        return ;
                    }

                };

            }
            imageContainer.appendChild(imageNode);
            //reader.readAsDataURL();
            reader.readAsDataURL(file);
        })(image);*/
        for (count = 0; count < images.length; count++){
            (function(file) {
                let imageNode = createNodeFromString("<img class='new-post-image' src=''>");
                let reader = new FileReader();
                reader.onload = function () {
                    var imageObject = new Image();
                    imageObject.src = reader.result;
                    imageObject.onload = function() {
                        if(this.width>=1 && this.height>=1){
                            imageNode.setAttribute("src", reader.result);
                        }else{
                            ShowDanger('New Item image minimum 800x300px.');
                            newPostItemImageClear(this,true);
                            return ;
                        }

                    };
                }
                imagesContainer.appendChild(imageNode);
                //reader.readAsDataURL();
                reader.readAsDataURL(file);
            })(images[count]);
        }
        if(count>0){
            const clearPhotos = "<div class='new-post-item-image-clear' id='new-post-item-image-clear'><svg class='new-post-item-image-clear-icon icon-delete'><use xlink:href='#svg-delete'></use></svg></div>";
            imagesContainer.appendChild(createNodeFromString(clearPhotos));
            const newPostItemImageClearButton = document.getElementById('new-post-item-image-clear');
            if(newPostItemImageClearButton != null){
                newPostItemImageClearButton.addEventListener('click', newPostItemImageClear);
            }
        }
    }else{
        newPostItemImageClear(this,true);
    }
}


function newPostItemImageClear(e, withInput = true){
    document.getElementById("new-post-item-image-preview").innerHTML = '';
    if(withInput){
        document.getElementById('new-post-item-cover').value = '';
    }
}
