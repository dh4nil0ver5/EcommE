<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="con-karyawan">
    <div class="head-total-bonus">
        <div class="head-nama">
            <label>Total Bonus</label>
            <input class="tot-bonus" name="nama"/>
        </div>
        
    </div>
    <div class="head-karyawan">
        <div class="head-nama">
            <label>Karyawan</label>
            <!--<input class="nm-karyawan" name="nama"/>-->
        </div>
    </div>
    <div class="body-karyawan">
        <table class="isi-kar">
            <thead>
                <tr>
                    <td class="isi-kar-a">No</td>
                    <td class="isi-kar-c">NAMA</td>
                    <td class="isi-kar-d">GPP</td>
                    <td class="isi-kar-e">NILAI BONUS</td>
                    <td class="isi-kar-f">AKSI</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="isi-kar-a">1</td>
                    <td class="isi-kar-c"><input /></td>
                    <td class="isi-kar-d"><input readonly/></td>
                    <td class="isi-kar-e"><input readonly/></td>
                    <td class="isi-kar-f">
                        <span onclick="tambah()">
                            <i class="fa fa-plus"></i>
                        </span>||
                        <span onclick="hapus()">
                            <i class="fa fa-eraser"></i>
                        </span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="foot-karyawan">
        
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        var url = location.href;
        $(".isi-kar-c > input").on("change", function(){
            var bonus = $(".tot-bonus").val();
            var data = $(this).val();
            var form_data = new FormData();
            form_data.append("nama", data);
            $.ajax({
                url: url + 'karyawan/cari_data',
                dataType: 'json', // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(json) {
                    var isi = "";
                    var gpp, tunjangan;
                    var sum_cari = json['jumlah'];
                    var sum_data = $(".isi-kar > tbody").length;
                    console.log(sum_data);
                    if(json["status"] === 200){
                        $.each(json['data'], function(i, item){
                            if(item['salary'] > 2500.00 && item['tunjangan'] > 1000000){
                                gpp = item['salary'];
                                tunjangan = item['tunjangan'];
                                bonus = parseInt(bonus) / parseInt(sum_data); 
                            }
                        });
                        $(".isi-kar-d > input").val(gpp);
                        $(".isi-kar-e > input").val(bonus);
                    }else{
                        
                    }
                }   
            });
        });
    });
    function hapus(a){
        $(".dt-karyawan-"+a).remove();
        
    }
    function tambah(){
        
    }
</script>
