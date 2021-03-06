<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard--Monitoring Kondisi Kolam Ikan Koi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include("/partial/Navbar")
      @include("/partial/Sidebar")
      <!-- Main Content -->
    <div class="main-content">
      <section class="section">
            <!-- section body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-5 table-responsive">
                      <div class="button">
                      <a href="/form" class="btn btn-primary mb-3 btn-sm">Tambah Data</a>
                      </div>
                        <table id="table_id" class="display">
                            <thead>
                                <tr>               
                                    <th>Nama Kolam</th>
                                    <th>Lokasi</th>
                                    <th>Umur</th>
                                    <th>Status</th>
                                    <th>Detail</th>
                                    <th>Hapus</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $kolam)
                                <tr>
                                    <td>{{$kolam->nama}}</td>
                                    <td>{{$kolam->lokasi}}</td>
                                    <td>{{$kolam->umur}}</td>
                                    <td>{{$kolam->status}}</td>
                                    <td><a href="/sensor/{{$kolam->id}}" class="btn btn-primary btn-sm">proses</a></td>
                                    <td><a href="/delete-kolam/{{$kolam->id}}" class="btn btn-danger btn-sm">hapus</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
      </section>
    </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 <div class="bullet"></div> Build By <a href="https://nauval.in/">Kelompok 5 Polije Bondowoso</a>
        </div>
        <div class="footer-right">
          2.3.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>


<script src="{{asset('assets/js/stisla.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

<script>
    let table = new DataTable('#table_id', {
    // options
});
</script>


</body>
</html>
