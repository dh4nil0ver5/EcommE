/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    var base_url = location.href;
    $(".in-data").on("focus", function(){
        $(this).css({width: "80%"});
        $(".in-tag").fadeIn(100);
    }).on("mouseout", function(){
    });
    $(".in-tag").on("click", function(){
        var d = $(".in-data").val();
        var url = base_url;
        var form_data = new FormData();
        form_data.append("email", d);
        form_data.append("password", "");
        $.ajax({
            url: base_url + 'home/cek_user',
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(json) {
                if(json['status'] === 200){
                    $("div[class=none]").removeClass("none");
                }
            }   
        });
    });
    
    $(".pas").on("focus", function(){
        $(this).css({width: "80%"});
        $(".in-tag-pas").fadeIn(100);
    }).on("mouseout", function(){
    });
    
    $(".in-tag-pas").on("click", function(){
        var d = $(".in-data").val();
        var e = $(".pas").val();
        var url = base_url;
        var form_data = new FormData();
        form_data.append("email", d);
        form_data.append("password", e);
        $.ajax({
            url: base_url + 'home/cek_user',
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(json) {
                if(json['status'] === 200){
                    $.each(json['data'], function(i, item){
                        $("body").load(base_url+'karyawan/index');
                        $("body").addClass("center-body");
                    });
                }else{
                    alert("account unregister !!");
                }
            }   
        });
    });
});

