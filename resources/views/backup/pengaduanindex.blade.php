<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Pengaduan</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                     <strong>TAMBAH DATA PENGADUAN</strong>  <a href="https://www.malasngoding.com/category/laravel" target="_blank"></a>
                </div>
                <div class="card-body">
                    <br/>
                    <br/>
                    
                    <form method="post" action="/pengaduan/store">
 
                        {{ csrf_field() }}
 
                        <div class="form-group">
                            <label>Tanggal pengaduan</label>
                            <input type=date name="tgl_pengaduan" class="form-control" placeholder=""></textarea>
 
                             @if($errors->has('tgl_pengaduan'))
                                <div class="text-danger">
                                    {{ $errors->first('tgl_pengaduan')}}
                                </div>
                            @endif

                            <div class="form-group">
                            <label>Nik</label>
                            <input type="text" name="nik" class="form-control" placeholder=""></textarea>
 
                             @if($errors->has('nik'))
                                <div class="text-danger">
                                    {{ $errors->first('nik')}}
                                </div>
                            @endif

                            <div class="form-group">
                            <label>isi laporan</label>
                            <input type="text" name="isi_laporan" class="form-control" placeholder=""></textarea>
 
                             @if($errors->has('isi_laporan'))
                                <div class="text-danger">
                                    {{ $errors->first('isi_laporan')}}
                                </div>
                            @endif
                            
                            <div class="form-group">
                            <label>foto</label>
                            <input type="file" name="foto" class="form-control" placeholder=""></textarea>
 
                             @if($errors->has('foto'))
                                <div class="text-danger">
                                    {{ $errors->first('foto')}}
                                </div>
                            @endif

                            <div class="form-group">
                            <p>status</p>
                            <input type="radio" name="status" value="proses"> Proses</p>
                            <input type="radio" name="status" value="selesai"> Selesai</p>
                            
                             @if($errors->has('status'))
                                <div class="text-danger">
                                    {{ $errors->first('status')}}
                                </div>
                            @endif
 
                        </div>
 
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="/pengaduan" class="btn btn-primary">Kembali</a>
                        </div>
 
                    </form>
 
                </div>
            </div>
        </div>
    </body>
</html>