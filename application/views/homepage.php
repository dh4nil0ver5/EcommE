<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <div class="content-home">
        <div class="title">
            <label>CRUD</label>
        </div>
        <div class="head">
            <button class="btn-add" type="submit">ADD</button>
        </div>
        <div class="isi-tabel">
            <table class="table-data">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Data 1</td>
                        <td>Data 2</td>
                        <td>Data 3</td>
                        <td>Data 4</td>
                        <td>Aksi</td>
                    </tr>
                    <?php
                    $no = 1;
                    foreach ($data as $v) {
                        ?>
                    <tr>
                        <td><label><?php echo $no; ?></label></td>
                        <td><label><?php echo $v->data1; ?></label></td>
                        <td><label><?php echo $v->data2; ?></label></td>
                        <td><label><?php echo $v->data3; ?></label></td>
                        <td><label><?php echo $v->data4; ?></label></td>
                        <td>
                            <span onclick="edit(<?php echo $v->id; ?>)" id="btn-ed<?php echo $v->id; ?>" kode="<?php echo $v->id; ?>">
                                <i class="fa fa-edit"></i>
                            </span>
                            <span onclick="hapus(<?php echo $v->id; ?>)" id="btn-el<?php echo $v->id; ?>" kode="<?php echo $v->id; ?>">
                                <i class="fa fa-eraser" kode="<?php echo $v->id; ?>"></i>
                            </span>
                        </td>
                    </tr>
                        <?php
                        $no++;
                    }
                    ?>
                </thead>
            </table>
        </div>
        <div class="form-data none">
            <div class="data-2">
                <label class="name-l-2">Data 2</label>
                <input class="isi-id" type="text" name="data" hidden/>
                <input class="isi-1-2" type="text" name="data"/>
            </div>
            <div class="data-3">
                <label class="name-l-3">Data 3</label>
                <input class="isi-1-3" type="text" name="data"/>
            </div>
            <div class="data-4">
                <label class="name-l-4">Data 4</label>
                <input class="isi-1-4" type="text" name="data"/>
            </div>
            <div class="data-5">
                <label class="name-l-5">Data 5</label>
                <input class="isi-1-5" type="text" name="data"/>
            </div>
            <button class="btn-save">SAVE</button>
            <button class="btn-update none">SAVE</button>
        </div>
    </div>
<script type="text/javascript">
    
    $(document).ready(function (){
    var base_url = location.href;
        $(".btn-add").on("click", function (){
            $(".isi-tabel").fadeOut(100);
            $(".form-data").removeClass("none");
        });
        $(".btn-save").on("click", function(){
            var url = base_url;
            var form_data = new FormData();
            form_data.append("data1", $(".isi-1-2").val());
            form_data.append("data2", $(".isi-1-3").val());
            form_data.append("data3", $(".isi-1-4").val());
            form_data.append("data4", $(".isi-1-5").val());
            $.ajax({
                url: base_url + 'fungsi/simpan',
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(json) {
                    if(json["status"] === 200){
                        $("body").load(base_url+'homepage/index');
                        $("body").addClass("center-body");
                    }else{
                        $(".form-data").addClass("none");
                    }
                }   
            });
        });
        $(".btn-update").on("click", function(){
            var url = base_url;
            var form_data = new FormData();
            form_data.append("id", $(".isi-id").val());
            form_data.append("data1", $(".isi-1-2").val());
            form_data.append("data2", $(".isi-1-3").val());
            form_data.append("data3", $(".isi-1-4").val());
            form_data.append("data4", $(".isi-1-5").val());
            $.ajax({
                url: base_url + 'fungsi/ubah',
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(json) {
                    if(json["status"] === 200){
                        $("body").load(base_url+'homepage/index');
                        $("body").addClass("center-body");
                    }else{
                        $(".form-data").addClass("none");
                    }
                }   
            });
        });
    });
    
//        
    function edit(a){
        var base_url = location.href;
        var kded = $("#btn-ed"+a).attr("kode");
        var form_data = new FormData();
        form_data.append("id", kded);
        $.ajax({
                url: base_url + 'fungsi/edit',
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(json) {
                    if(json['status'] === 200){
                        $.each(json['data'], function(i, item){
                            $(".isi-id").val(item['id']);
                            $(".isi-1-2").val(item['data1']);
                            $(".isi-1-3").val(item['data2']);
                            $(".isi-1-4").val(item['data3']);
                            $(".isi-1-5").val(item['data4']);
                            $(".isi-tabel").fadeOut(100);
                            $(".btn-save").addClass("none");
                            $(".btn-update").removeClass("none");
                            $(".form-data").removeClass("none");
                        });
                    }else{
                        
                    }
                }
            });
    }
//        
    function hapus(a){
        var base_url = location.href;
        var kded = $("#btn-el"+a).attr("kode");
        var form_data = new FormData();
        form_data.append("id", kded);
        $.ajax({
            url: base_url + 'fungsi/hapus',
            dataType: 'json', // what to expect back from the PHP script, if anything
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(json) {
                if(json['status'] === 200){
                    $("body").load(base_url+'homepage/index');
                    $("body").addClass("center-body");
                }else{

                }
            }
        });
    }
</script>