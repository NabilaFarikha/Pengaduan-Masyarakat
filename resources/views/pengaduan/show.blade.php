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
        @if(session('Data ditanggapi'))
            <div class="alert alert-success" role="alert">
            {{session('Data ditanggapi')}}
            </div>
        @endif
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                    <h5 class="fw-bold py-3 mb-4">
                        <span class="text-muted fw-light">Detail </span>Pengaduan Masyarakat 
                    </h5>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mt-2">
                            <!-- <div class="card-header">
                                <div class="d-flex justify-content-between">
                                    <h4>{{$pengaduan->status}}</h4>
                                </div>
                            </div> -->
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        @foreach($pengaduan->pengaduan as $item)
                                            <tr>
                                                <th>Nama Pengadu</th>
                                                <td>:</td>
                                                <td>{{ $item->user->nama ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th>NIK</th>
                                                <td>:</td>
                                                <td>{{ $item->user->nik ?? ''}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tanggal Pengaduan</th>
                                                <td>:</td>
                                                <td>{{ $item->tgl_pengaduan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Foto</th>
                                                <td>:</td>
                                                <td><img src="{{ asset('image/'. $pengaduan->foto ) }}" height="10%" width="20%" alt="Foto Pengaduan"></td>
                                            </tr>
                                            <tr>
                                                <th>Isi Laporan</th>
                                                <td>:</td>
                                                <td>{{ $item->isi_laporan }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>:</td>
                                                <td>
                                                    @if ($item->status == '0')
                                                        <a href="#" class="badge bg-label-primary">Pending</a>
                                                    @elseif ($pengaduan->status == 'proses')
                                                        <a href="#" class="badge bg-label-warning">Proses</a>
                                                    @else
                                                        <a href="#" class="badge bg-label-success">Selesai</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div class="d-flex justify-content-between">
                                    <form action="{{ route('pengaduan.statusOnchange', $pengaduan->id_pengaduan)}}" method="post">
                                        @csrf
                                        <select name="status" class="form-select" onchange="javascript:this.form.submit()">
                                            <option value="0" @if($pengaduan->status == 0) selected @endif>Pending</option>
                                            <option value="proses" @if($pengaduan->status == "proses") selected @endif>Proses</option>
                                            <option value="selesai" @if($pengaduan->status == "selesai") selected @endif>Selesai</option>
                                        </select>
                                    </form>
                                    <!-- Vertically Centered Modal -->
                                    <div class="col-lg-4 col-md-6">
                                        <div class="mt-3">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter">
                                                Tanggapi
                                            </button>
                                            <a href="/pengaduan" class="btn btn-outline-secondary" value="Kembali">Kembali</a>

                                            <!-- Modal -->
                                            <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCenterTitle">Masukan Tanggapan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form method="post" action="/pengaduan/show/{id}">
                                                        {{ csrf_field() }}
                                                        <div class="modal-body">
                                                                <input type="hidden" name="tgl_tanggapan" value="{{Carbon\Carbon::today()}}">
                                                                <input type="hidden" name="id_pengaduan" value="{{request()->route('id')}}">
                                                                <div class="row">
                                                                    <div class="col">           
                                                                        <div class="form-group">
                                                                            <label>Tanggapan</label>
                                                                            <textarea name="tanggapan" rows="5" class="form-control" placeholder="Isi tanggapan .."></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </form>
                                            </div>
                                        </div>
                                    </div>             
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="card-body shadow">
                                <!-- <div class="card shadow"> -->
                                    <div class="card-header">
                                        <h5>Tanggapan Petugas :</h5>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            {{-- <p>{{ @$data_tanggapan->tanggapan }}</p>   --}}
                                          @if (empty(@$data_tanggapan->tanggapan))
                                                Beri Tanggapan
                                          @else
                                            {{ @$data_tanggapan->tanggapan }}
                                            <a href="" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal">
                                                Edit
                                            </a>
                                         @endif

                                            <div class="col-lg-4 col-md-6 ">
                                                <div class="mt-3">
                                                    <!-- Button trigger modal -->
                                                  
                                                    <!-- <a href="/pengaduan/destroy/{id}" class="btn btn-danger">Hapus</a> -->
                                                    <!-- <a href="/pengaduan" class="btn btn-outline-secondary" value="Kembali">Kembali</a> -->

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalTitle">Edit Tanggapan</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="post" action="/pengaduan/update/{{ $pengaduan->id_pengaduan }}">
                                                                {{ csrf_field() }}
                                                                {{ method_field('PUT') }}

                                                                <div class="modal-body">
                                                                        <!-- <input type="hidden" name="tgl_tanggapan" value="{{Carbon\Carbon::today()}}"> -->
                                                                        <!-- <input type="hidden" name="id_pengaduan" value="{{request()->route('id')}}"> -->
                                                                        <div class="row">
                                                                            <div class="col">           
                                                                                <div class="form-group">
                                                                                    <label>Tanggapan</label>
                                                                                    <textarea name="tanggapan" rows="5" class="form-control">{{ @$data_tanggapan->tanggapan }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                                            </div>
                                                                        </div>
                                                                </div>
                                                            </form>
                                                    </div>
                                                </div>
                                            </div>     
                                           
                                        </p>
                                    </div>
                                <!-- </div> -->
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
    
