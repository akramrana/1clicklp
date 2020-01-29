/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var site = {
    fileUpload: (obj) => {
        $('#profile-pic-help').html("");
        var file = obj.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onloadend = function () {
            $.ajax({
                type: "POST",
                url: baseUrl + "site/update-profile-pic",
                data: {
                    image: reader.result,
                    _csrf: _csrf
                },
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    xhr.upload.addEventListener("progress", function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = (evt.loaded / evt.total) * 100;
                            $('#progress').show();
                            $('#progress .progress-bar').css(
                                    'width', percentComplete + '%'
                                    );
                        }
                    }, false);
                    return xhr;
                },
            }).done((res) => {
                $("#progress .progress-bar").attr("style", "width: 0%;");
                $("#progress").hide();
                if (res.status == 200) {
                    $('#usr-profic').attr('src', res.path);
                } else {
                    $('#profile-pic-help').html(res.msg);
                }
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(jqXHR.responseText);
            })
        }
    }
}

