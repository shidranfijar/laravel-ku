<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="5" align="center" style="text-align:center">
        @foreach($syllabus as $p)
        
            <tr>
              <td>
                <a href="http://localhost/idbc/edit.php?id={{ $p->id_pendaftaran }}">
                  Edit
                </a>
              </td>
              <td>{{ $p->id_pendaftaran }}</td>
              <td>{{ $p->th_ajaran }}</td>
              <td>{{ $p->nm_peserta }}</td>
              <td>{{ $p->tmp_lahir }}</td>
              <td>{{ $p->tgl_lahir }}</td>
              <td>{{ $p->jk }}</td>
              <td>{{ $p->nm_bapak }}</td>
              <td>{{ $p->alamat }}</td>
              <td>{{ $p->knp_masuk }}</td>

            </tr>

        @endforeach
    </table>
</body>
</html>