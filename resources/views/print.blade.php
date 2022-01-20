
<!doctype html>
<html lang="en">
  <head>
  <style>
  table {
    border-left: 0.01em solid #ccc;
    border-right: 0;
    border-top: 0.01em solid #ccc;
    border-bottom: 0;
    border-collapse: collapse;
    text-align: center;
    padding:2px;
    
    position: center;
}
table td,
table th {
    border-left: 0;
    border-right: 0.01em solid #ccc;
    border-top: 0;
    border-bottom: 0.01em solid #ccc;
    text-align: center;
    padding:2px;
    position: center;
}

  </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <title>Print Data Siswa</title>
  </head>
  <body>
    

<div class="row">
            <div class="col-lg text-center">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
<a href="/student/{{$student->id}}/print" class="btn btn-sm btn-danger"> Print</a>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
                </div>
                <div class="card-body text-center">
               
                <ul class="list-group list-group-flush">
  <li class="list-group-item ">NAMA : {{$student->nama_siswa}}</li>
    <li class="list-group-item ">NISN : {{$student->nisn}}</li>
    <li class="list-group-item ">JURUSAN : {{$student->jurusan}}</li>
    <li class="list-group-item ">ALAMAT : {{$student->alamat}}</li>
    <li class="list-group-item ">KELAS : {{$student->kelas}}</li>
    <li class="list-group-item ">EMAIL : {{$student->email}}</li>
  </ul> 
  
                </div>
              </div>

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Catatan Keterlambatan</h6>
                  
                </div>
                <div class="card-body">
                
  

</div>
      <table class="table table-bordered mt-4">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">CATATAN</th>
      <th scope="col">TANGGAL</th>
    </tr>
  </thead>
  <tbody>
  @foreach($student->catatan as $catat)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$catat->catatan}}</td>
      <td>{{$catat->tanggal}}</td>
      @endforeach      
  </tbody>
  </div>
</table>

                </div>
              </div>
            </div>

            <div class="col-lg">

              <div class="card shadow mb-4">
                
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">BOARDING PASS</h6>
                </div>
                <div class="card-body text-center">
        
          <table class="table table-bordered mt-4">
  <thead>
    <tr>
      <th scope="col">NO</th>
      <th scope="col">MATA PELAJARAN & NAMA GURU</th>
      <th scope="col">CATATAN</th>
      <th scope="col">TANDA TANGAN</th>

    </tr>
  </thead>
  <tbody>
  @foreach($student->mapel as $mpl)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$mpl->nama_mapel}}</td>
      <td>{{$mpl->status}}</td>
      <td><img src="{{public_path('$mpl->ttd') }}" class="img-profile   mx-auto d-block pt-2" width="95px" height="95px"></td>
      
      @endforeach      
  </tbody>
  </div>
</table>
     
</div>
</div>
                 

              </div>
 </div>


</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>

