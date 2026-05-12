<!DOCTYPE html>
<html>
<head>
    <title>CRUD Mahasiswa AJAX</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <form id="formMahasiswa">

        <input type="text" name="nama" placeholder="Nama">
        <br><br>

        <input type="text" name="nim" placeholder="NIM">
        <br><br>

        <input type="text" name="jurusan" placeholder="Jurusan">
        <br><br>

        <button type="submit">Simpan</button>

    </form>

    <br><br>

    <table border="1" cellpadding="10">

        <thead>
            <tr>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
            </tr>
        </thead>

        <tbody id="show_data">

        </tbody>

    </table>

<script>

$(document).ready(function(){

    tampil_data();

    function tampil_data()
    {
        $.ajax({
            url : "http://localhost/uts_crud_mahasiswa/index.php/mahasiswa/get_data",
            type : "GET",
            dataType : "JSON",

            success:function(data){

                var html = '';

                for(var i=0; i<data.length; i++){

                    html += '<tr>'+
                            '<td>'+data[i].nama+'</td>'+
                            '<td>'+data[i].nim+'</td>'+
                            '<td>'+data[i].jurusan+'</td>'+
                            '</tr>';
                }

                $('#show_data').html(html);
            }
        });
    }

    $('#formMahasiswa').submit(function(e){

        e.preventDefault();

        $.ajax({

            url : "http://localhost/uts_crud_mahasiswa/index.php/mahasiswa/save",
            type : "POST",
            data : $(this).serialize(),
            dataType : "JSON",

            success:function(response){

                alert("Data berhasil disimpan");

                $('#formMahasiswa')[0].reset();

                tampil_data();
            }

        });

    });

});

</script>

</body>
</html>