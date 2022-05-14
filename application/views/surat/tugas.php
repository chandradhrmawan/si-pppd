<!DOCTYPE html>
<head>
    <title>Surat Tugas SI-PPPD</title>
    <meta charset="utf-8">
    <style>
        #kop{
            text-align:center;
        }

        #halaman{
            width: auto; 
            height: auto; 
            position: absolute; 
            /* border: 1px solid;  */
            /* padding-top: 30px; 
            padding-left: 30px; 
            padding-right: 30px; 
            padding-bottom: 80px; */
        }

        #img-logo{
            width: 100px;
        }

        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column1 {
            float: left;
            /* width: 30%; */
            padding: 48px;
            height: 200px;
        }

        .column2 {
            float: left;
            width: 70%;
            padding: 10px;
            height: 200px;
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }

        pre
        {
        font-family: "Times New Roman", Times, serif;
        }
        

    </style>

</head>

<body>
<div id=halaman>
    <div class="row" id="kop">
        <div class="column1">
            <img src="<?=base_url()?>uploads/logo_kop.png" id="img-logo">
        </div>
        <div class="column2">
            <h3>PEMERINTAH KABUPATEN BOGOR</h3>
            <h2>KECAMATAN CISEENG</h2>
            <h5>Jalan Laksamana Yos Sudarso No.23 - 24, RT.16/RW.6, Kb. Bawang, Jakarta Utara, Kota Jkt Utara, Daerah Khusus Ibukota Jakarta 14320</h5>
        </div>
    </div>
        <hr/>
        <p style="text-align:center;"><b><u>SURAT PERINTAH</u></b>
        <br/>
        Nomor : <?=$dasar->nomor_surat_tugas?></p>
        <table border="0" cellpading="0" cellspacing="0" width="80%">
            <tr>
                <td style="width: 10%;" colspan="4">Dasar</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%;"></td>
                <td style="width: 65%;" colspan="2">
                <p><?=$dasar->dasar_kegiatan?></p>
                </td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td colspan="3" style="width: 70%;">Berdasarkan Hal Tersebut diatas, maka dengan ini : </td>
            </tr>
            <tr>
                <td style="text-align:center;  vertical-align: center !important;" colspan="4">
                    <h4 style="margin-bottom: auto;margin-top: auto;">CAMAT CISEENG KABUPATEN BOGOR <br/> MEMERINTAHKAN</h4>
                </td>
            </tr>
            <tr>
                <td style="width: 10%;" colspan="4">Kepada</td>
            </tr>
            <?php 
            $counter = 1;
            foreach ($dasar->users as $key => $value) { ?>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%;"><?=$counter?>. </td>
                <td style="width: 50%;"><?=$value->nama?></td>
                <td style="width: 30%;"><?=$value->nm_jabatan?></td>
            </tr>
            <?php $counter++; } ?>
            <tr>
                <td style="width: 10%;" colspan="4">Untuk</td>
            </tr>
            <tr>
                <td style="width: 10%;"></td>
                <td style="width: 2%;"></td>
                <td style="width: 65%;" colspan="2">
                    <p><?=$dasar->tujuan_kegiatan?></p>
                </td>
            </tr>
            </table>
        <p>Demikian surat perintah ini diberikan agar dilaksanakan dengan penuh rasa tanggung jawab.</p>
        <div style="width: 20%; text-align: left; float: right;">Purwodadi, 20 Januari 2020</div><br>
        <div style="width: 20%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 20%; text-align: left; float: right;">Arbrian Abdul Jamal</div>
    </div>
</body>
</html>
<script type="text/javascript">
    window.onafterprint = window.close;
    window.print();
</script>
