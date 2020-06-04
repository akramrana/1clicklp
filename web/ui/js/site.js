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
    },
    showAudienceModal: function () {
        $("#audience-email").val("");
        $("#aud-modal").modal("show");
    },
    saveAudiences: function () {
        var emails = $("#audience-email").val();
        if ($.trim(emails) != "") {
            $.ajax({
                type: "POST",
                url: baseUrl + "site/save-audience",
                data: {
                    email: emails,
                    _csrf: _csrf
                }
            }).done((res) => {
                $('#aud-response').html(res.msg);
                if (res.status == 200) {
                    $("#audience-email").val("");
                    location.reload();
                }
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(jqXHR.responseText);
            })
        }
    },
    createCampaign: function (category_id) {
        var name = $("#campaign-name").val();
        var description = $("#campaign-description").val();
        if ($.trim(name) != "") {
            $.ajax({
                type: "POST",
                url: baseUrl + "site/save-campaign",
                data: {
                    name: name,
                    description: description,
                    category_id: category_id,
                    _csrf: _csrf
                }
            }).done((res) => {
                if (res.status == 200) {
                    location.href = baseUrl+'campaign-step-two/'+res.id
                }
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(jqXHR.responseText);
            })
        }
    },
    updateCampaign:function(id){
        var from_name = $("#campaign-from-name").val();
        var from_email = $("#campaign-from-email").val();
        var subject = $("#campaign-subject").val();
        if ($.trim(from_email) != "") {
            $.ajax({
                type: "POST",
                url: baseUrl + "site/update-campaign",
                data: {
                    name: from_name,
                    email: from_email,
                    subject: subject,
                    id: id,
                    _csrf: _csrf
                }
            }).done((res) => {
                if (res.status == 200) {
                    location.href = baseUrl+'choose-template/'+res.id
                }
            }).fail((jqXHR, textStatus, errorThrown) => {
                console.log(jqXHR.responseText);
            })
        }
    }
}

