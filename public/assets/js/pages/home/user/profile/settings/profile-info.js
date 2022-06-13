var  avatarButton = document.getElementById("avatar-button");
if (avatarButton !== null){
     var  avatar = document.getElementById("avatar");
    if (avatar !== null) {
        avatarButton.addEventListener("click", function () {
            avatar.click();
        });
        avatar.addEventListener("change", function (e) {
            var reader = new FileReader();
            reader.onload = function()
            {
                var imageObject = new Image();
                imageObject.src = reader.result;
                imageObject.onload = function() {
                    if(this.width<110 || this.height<110){
                        ShowDanger('New Avatar image minimum 110x110px.');
                        avatar.value = "";
                        return ;
                    }else{
                        var output = document.getElementById("avatar-preview");
                        output.setAttribute("data-src", reader.result);
                        app.plugins.createHexagon({
                            container: '.hexagon-image-68-74',
                            width: 68,
                            height: 74,
                            roundedCorners: true,
                            roundedCornerRadius: 3,
                            clip: true
                        });
                    }

                };
            }
            reader.readAsDataURL(e.target.files[0]);
            //document.getElementById("avatar-preview").src = e.target.result;
        });
    }
}

var  coverButton = document.getElementById("cover-button");
if (coverButton !== null){
     var  cover = document.getElementById("cover");
    if (cover !== null) {
        coverButton.addEventListener("click", function () {
            cover.click();
        });
        cover.addEventListener("change", function (e) {
            var reader = new FileReader();
            reader.onload = function()
            {
                var imageObject = new Image();
                imageObject.src = reader.result;
                imageObject.onload = function() {
                    if (this.width < 1184 || this.height < 300) {
                        ShowDanger('New Cover image minimum 1184x300px.');
                        avatar.value = "";
                        return;
                    } else {
                        var output = document.getElementById("cover-preview");
                        output.src = reader.result;
                        output.style.display = 'none';
                        output.parentElement.style.background = `url("${reader.result}") no-repeat center`;
                        output.parentElement.style.backgroundSize = 'cover';
                    }
                }
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    }
}

window.addEventListener('DOMContentLoaded', function()
{
    var birthday = document.getElementById('birthday');

    birthday.DatePickerX.init({
        mondayFirst: true,
        format: "dd/mm/yyyy",
        minDate    : new Date(1927, 1, 1),
        maxDate    : new Date(),
        todayButton: false,
    });

    var form = document.querySelector('.form');
    if (form != null){
        form.addEventListener('submit', function (){
            document.querySelector('.page-loader').classList.remove('hidden');
        })
    }

});
