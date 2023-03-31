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
                <div class="card mt-5">
                        <div class="card-header">
                            <div class="text-center">Laporan Anda</div>
                        </div>
                            <form method="post" action="/masyarakat/petugas/">
                                <div class="card-body">
                                    <div class="mb-3 row">
                                        <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->nik }}
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->nama }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->email }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="telp" class="col-sm-2 col-form-label">No Telp</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->telp }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->alamat }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="rt" class="col-sm-2 col-form-label">RT</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->rt }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="rw" class="col-sm-2 col-form-label">RW</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->rw }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="kode_pos" class="col-sm-2 col-form-label">Kode Pos</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->kode_pos }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="province_id" class="col-sm-2 col-form-label">Provinsi</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->province->name }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="regency_id" class="col-sm-2 col-form-label">Kabupaten</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->regency->name }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="district_id" class="col-sm-2 col-form-label">Kecamatan</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->district->name }}
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="village_id" class="col-sm-2 col-form-label">Desa</label>
                                        <div class="col-sm-10">
                                            <b>:</b> {{ $petugas->village->name }}
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-10 offset-sm-2 mb-2 mt-2">
                                        <!-- <a href="/petugas" class="btn btn-sm btn-success">Kembali</a> -->
                                        <a href="/petugas" class="btn btn-outline-secondary" value="Kembali">Kembali</a>
                                    </div>
                                </div>
                            </form>
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

  <!-- {{-- <div class="buy-now">
    <a href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/" target="_blank" class="btn btn-danger btn-buy-now">Upgrade to Pro</a>
  </div>
   --}} -->

  <!-- Core JS -->
  @include('template.script')
  
</body>

</html>
    
