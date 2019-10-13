/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = {
    changeStatus: function (url, trigger, id, force_reload)
    {
        var status = 0;
        if ($('#' + trigger.id).is(":checked")) {
            status = 1;
        }
        $('.global-loader').show();
        $.ajax({
            type: "GET",
            url: baseUrl + url,
            data: {
                "id": id
            },
            success: function (res) {
                $(".global-loader").hide();
                if (force_reload)
                {
                    location.reload();
                }
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                $(".global-loader").hide();
                console.log(jqXHR.responseText);
            }
        });
    },
    getClientTemplate: function (id)
    {
        if ($.trim(id) != "") {
            $('.global-loader').show();
            $.ajax({
                type: "GET",
                url: baseUrl + 'client-subscriber/get-template',
                data: {
                    "id": id
                },
                success: function (res) {
                    $(".global-loader").hide();
                    $("#clientsubscribers-client_template_id").html(res);
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    $(".global-loader").hide();
                    console.log(jqXHR.responseText);
                }
            });
        }
    },
    getCampaignTypesTemplates: (id) => {
        if ($.trim(id) != "") {
            $('.global-loader').show();
            $.ajax({
                type: "GET",
                url: baseUrl + 'client-campaign/get-types-templates',
                data: {
                    "id": id
                },
            }).done((res) => {
                $(".global-loader").hide();
                var templates = `<option value="">Please Select</option>`;
                var types = `<option value="">Please Select</option>`;
                var obj = $.parseJSON(res);
                $.each(obj.templates,(i,v)=>{
                    templates+=`<option value="${v.id}">${v.name}</option>`;
                })
                $("#clientcampaigns-client_template_id").html(templates);
                
                $.each(obj.types,(i,v)=>{
                    types+=`<option value="${v.id}">${v.name}</option>`;
                })
                $("#clientcampaigns-client_campaign_type_id").html(types);
                
            }).fail((jqXHR, textStatus, errorThrown) => {
                $(".global-loader").hide();
                console.log(jqXHR.responseText);
            });
        }
    }
};

