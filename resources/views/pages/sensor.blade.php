<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard--Monitoring Kondisi Kolam Ikan Koi</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->

  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app" data-id="{{$id}}">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include("/partial/Navbar")
      @include("/partial/Sidebar")
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <!-- section body -->
            <div class="row">
              <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                      <h4>Waktu Pengambilan</h4>
                    </div>
                    <div class="card-body">
                      <p class="time font-weight-bold h5">-</p>
                    </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                      <h4>Data PH</h4>
                    </div>
                    <div class="card-body">
                      <p class="h5 font-weight-bold ph">-</p>
                    </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                      <h4>Data Suhu</h4>
                    </div>
                    <div class="card-body">
                    <p class="h5 font-weight-bold suhu">-&deg;  C</p>
                    </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="card">
                    <div class="card-header">
                      <h4>Umur Ikan</h4>
                    </div>
                    <div class="card-body">
                    <p  class="font-weight-bold h5 umur-ikan">-</p>
                    </div>
                </div>
              </div>
             <!-- section body end -->
             </div>

             <div class="alert alert-danger" role="alert">
              
            </div>
             <div class="row">
               <div class="col-lg-6">
                 <div class="card">
                 <canvas id="suhu" width="400" height="400"></canvas>
                 </div>
               </div>
               <div class="col-lg-6">
                 <div class="card">
                 <canvas id="ph" width="400" height="400"></canvas>
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

  <script src="https://cdn.jsdelivr.net/npm/chart.js@3.6.1/dist/chart.min.js"></script>


  <script src="{{asset('assets/js/stisla.js')}}"></script>
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>
  <script src="{{asset('assets/js/sensor.js')}}"></script>

</body>
</html>