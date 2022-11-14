<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>List Gudang</title>
</head>
<body>
    <div class="container">
        <h1>List Gudang</h1>
        <div class="p-2">
            <a href="/gudang/create" class="btn btn-primary mb-2">Add Gudang</a>            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Gudang</th>
                        <th>Alamat Gudang</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $item)
                    <tr>
                        <td>{{ $item->nama_gudang }}</td>
                        <td>{{ $item->alamat_gudang }}</td>
                        <td>
                            <a href="/gudang/detail/{{$item->id}}" class="btn btn-info" >Detail</a> | <a href="/gudang/edit/{{$item->id}}" class="btn btn-primary" >Edit</a> | <a href="/gudang/delete/{{$item->id}}" onclick="return confirm('{{ __('Apakah yakin menghapus?') }}')" class="btn btn-danger" >Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>-->

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Gudang</title>
    @include('tema.head')
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- sidebar mulai -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase">
                <i class="fas fa-shoe-prints me-2"></i>Espatu
            </div>

            <div class="list-group list-group-flush my-2">
                <a href="/produk" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-list me-2"></i>Produk
                </a>
                <a href="/brand" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                    <i class="fas fa-star me-2"></i>Brand
                </a>
                <a href="/gudang" class="list-group-item list-group-item-action bg-transparent second-text active">
                    <i class="fas fa-truck me-2"></i>Gudang
                </a>
            </div>
            
        </div>
        <!-- sidebar selesai -->

        <!-- page -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"> Gudang</h2>
                </div>
            </nav>

            <!-- content -->
            <div class="container-fluid px-4">
                <h3 class="fs-4 mb-3">List Gudang</h3>
                <p>Berikut adalah list gudang.</p>
                <a href="/gudang/create" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Add Gudang</a>

                <button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add Gudang (Modal)</button>

                <!-- Add Modal -->
                <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="addModalLabel">Masukkan Detail Gudang</h5>
                            </div>
                            <form action="/gudang" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Nama Gudang</label>
                                        <input type="text" name="nama_gudang" class="form-control" placeholder="Masukkan nama" required/>
                                    </div>

                                    <div class="form-group">
                                        <label>Alamat Gudang</label>
                                        <input type="text" name="alamat_gudang" class="form-control" placeholder="Masukkan nama" required/>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" onclick="return alert('{{ __('Berhasil!') }}')" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Selesai Add Modal -->

                <div class="col">
                    <div class="table-responsive">
                        <table class="table bg-white rounded table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Gudang</th>
                                    <th>Alamat Gudang</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $item)
                                    <tr>
                                        <td>{{ $item->nama_gudang }}</td>
                                        <td>{{ $item->alamat_gudang }}</td>
                                        <td>
                                            <a href="/gudang/detail/{{$item->id}}" class="btn btn-dark btn-sm" >Detail</a> 
                                            
                                            | <a href="" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#detailModal-{{ $item->id }}">Detail (Modal)</a>

                                            <!-- Detail Modal -->
                                            @foreach ($list as $detail)
                                                <div class="modal fade" id="detailModal-{{ $detail->id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="detailModalLabel">Detail Gudang {{ $detail->nama_gudang }}</h5>
                                                            </div>
                                                            <form action="" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                    <p>Berikut adalah detail gudang {{$detail->nama_gudang}}.</p>
                                                                    <div class="col">
                                                                        <div class="table-responsive">
                                                                            <table class="table bg-white rounded table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Nama Gudang</th>
                                                                                        <th>Alamat Gudang</th>
                                                                                        <th>Total Stok</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>{{ $detail->nama_gudang }}</td>
                                                                                        <td>{{ $detail->alamat_gudang }}</td>
                                                                                        <td>{{ $detail->produk->pluck('stok')->sum() }}</td>

                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                            <table class="table bg-white rounded table-hover">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>No.</th>
                                                                                        <th>Nama Produk</th>
                                                                                        <th>Stok</th>
                                                                                        <th>Harga</th>
                                                                                        <th>Brand</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php $number = 1; ?>
                                                                                    @foreach($detail->produk as $ditel)
                                                                                        <tr>
                                                                                            <th scope="row">{{ $number }}.</th>
                                                                                            <td>{{ $ditel->nama_produk }}</td>
                                                                                            <td>{{ $ditel->stok }}</td>
                                                                                            <td>{{ $ditel->harga }}</td>
                                                                                            <td>
                                                                                                {{ $ditel->brand->nama_brand }}
                                                                                            </td>                                                                                       </td>
                                                                                        </tr>
                                                                                        <?php $number++; ?>
                                                                                    @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <!-- Selesai Detail Modal -->
                                            
                                            | <a href="/gudang/edit/{{$item->id}}" class="btn btn-primary btn-sm" >Edit</a>

                                            | <a href="" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal-{{ $item->id }}">Edit (Modal)</a>

                                            <!-- Edit Modal -->
                                            @foreach ($list as $daftar)
                                                <div class="modal fade" id="editModal-{{ $daftar->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="editModalLabel">Edit Detail {{ $daftar->nama_gudang }}</h5>
                                                            </div>
                                                            <form action="/gudang/update/{{$daftar->id}}" method="POST">
                                                                @csrf
                                                                <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Nama Gudang</label>
                                                                    <input type="text" name="nama_gudang" value="{{$daftar->nama_gudang}}" class="form-control" placeholder="Masukkan nama" required/>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label>Alamat Gudang</label>
                                                                    <input type="text" name="alamat_gudang" value="{{$daftar->alamat_gudang}}" class="form-control" placeholder="Masukkan nama" required/>
                                                                </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" onclick="return alert('{{ __('Berhasil!') }}')" class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- Selesai Edit Modal -->
                                            @endforeach
                                            
                                            | <a href="/gudang/delete/{{$daftar->id}}" onclick="return confirm('{{ __('Apakah yakin menghapus?') }}')" class="btn btn-danger btn-sm" >Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- isi selesai -->
        </div>
        <!-- page selesai -->
    </div>
    @include('tema.script')
</body>
</html>