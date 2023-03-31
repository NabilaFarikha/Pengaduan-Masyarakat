<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed " dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">
    <head>
        @include('template.head')
    </head>

<body>

  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">
    <!-- Menu -->
    @include('template.sidebar')
    <!-- / Menu -->
    <!-- Layout container -->
    <div class="layout-page">
      
    <!-- Navbar -->
        @include('template.navbar')
    <!-- / Navbar -->
      <!-- Content wrapper -->
        <div class="content-wrapper">
            
            <!-- Content -->
            <div class="container">
                <div class="row justify-content-center my-5">
                    <div class="col-lg-12 col-md-12 col-xl-10">
                        <div class="card shadow">
                            <div class="card-header text-center">
                                Tambah Petugas
                            </div>
                            <div class="card-body">

                                <form method="post" action="/petugas/store">

                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="number" class="form-control" id="nik" name="nik" placeholder="Enter your NIK" autofocus>
                                    </div>

                                    <div class="form-group">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email">
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label class="form-label" for="password">Password</label>
                                                <div class="input-group input-group-merge">
                                                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="telp" class="form-label">No Telp</label>
                                        <input type="number" class="form-control" id="telp" name="telp" placeholder="08**">
                                    </div>

                                    <div class="form-group">
                                        <label for="jenkel" class="mb-2">Jenis Kelamin </label> <br>
                                        <input type="radio" name="jenkel" value="laki-laki" checked>  Laki-Laki
                                        <input type="radio" name="jenkel" value="perempuan">  Perempuan
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat"></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="number" class="form-control" id="rt" name="rt">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md">
                                            <div class="form-group">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="number" class="form-control" id="rw" name="rw">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="kode_pos" class="form-label">Kode Pos</label>
                                        <input type="number" class="form-control" id="kode_pos" name="kode_pos">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Provinsi</label>
                                        <select name="province_id" id="provinsi" class="form-select">
                                        <option selected>-Pilih Provinsi-</option>
                                            @foreach($provinces as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kabupaten" class="form-label">Kabupaten</label>
                                        <select name="regency_id" id="kabupaten"  class="form-select">
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="kecamatan" class="form-label">Kecamatan</label>
                                        <select name="district_id" id="kecamatan"  class="form-select">
                                            </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="desa" class="form-label">Desa</label>
                                        <select name="village_id" id="desa"  class="form-select">
                                            </select>
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" value="Simpan">
                                        <a href="/petugas" class="btn btn-outline-secondary" value="Kembali">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Content -->
            <!-- Footer -->
                @include('template.footer')
            <!-- / Footer -->
            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    
</div>
  <!-- / Layout wrapper -->

  {{-- <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
  </div>
   --}}

  <!-- Core JS -->
  @include('template.script')
  
</body>

</html>
   
