@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                <div class="mb-3 row">
                    <button type="button" class="btn btn-primary col-sm-2" data-bs-toggle="modal" data-bs-target="#modalCreate">
                         Tambah Data
                    </button>
               </div>
               <div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                         <div class="modal-content" >
                              <form action="golongan/store" method="POST">
                                    @csrf
                                   <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Create Data</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body" >
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Kode</label>
                                             <input type="text" class="form-control" id="gol_kode" name="gol_kode" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Nama</label>
                                             <input type="text" class="form-control" id="gol_nama" name="gol_nama" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Created_at</label>
                                             <input type="datetime-local" class="form-control" id="created_at" name="created_at" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                             <label for="exampleInputEmail1" class="form-label">Updated_at</label>
                                             <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" aria-describedby="emailHelp">
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" name="submit" class="btn btn-primary" >Simpan Perubahan</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
                <table class="table">
  <thead>
    <tr>
                              <th scope="col">Kode</th>
                              <th scope="col">Nama</th>
                              <th scope="col">Created_at</th>
                              <th scope="col">Updated_at</th>
                              <th colspan="2" scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
                        @foreach($golongan as $gol)
                              <tr>
                                   <td>{{ $gol->gol_kode }} </td>
                                   <td>{{ $gol->gol_nama }} </td>
                                   <td>{{ $gol->created_at }} </td>
                                   <td>{{ $gol->updated_at}} </td>
                                   <td scope="row">

                                        <!-- BUTTON EDIT DATA-->

                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalEdit{{ $gol->gol_id }}">
                                             Edit
                                        </button>

                                        <!-- POPUP MODAL EDIT DATA  -->

                                        <div class="modal fade" id="modalEdit{{ $gol->gol_id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                             <div class="modal-dialog">
                                                  <div class="modal-content">
                                                       <form action="golongan/{{ $gol->gol_id }}" method="POST">
                                                        @method('PATCH')
                                                        @csrf
                                                        <div class="modal-header">
                                                                 <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body" >
                                                                <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Kode</label>
                                                                      <input type="text" class="form-control" id="gol_kode" name="gol_kode" value="{{ $gol->gol_kode }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Nama</label>
                                                                      <input type="text" class="form-control" id="gol_nama" name="gol_nama" value="{{ $gol->gol_nama }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Created_at</label>
                                                                      <input type="datetime-local" class="form-control" id="created_at" name="created_at" value="{{  date('Y-m-d\TH:i:s', strtotime($gol->created_at)) }}" aria-describedby="emailHelp">
                                                                 </div>
                                                                 <div class="mb-3">
                                                                      <label for="exampleInputEmail1" class="form-label">Updated_at</label>
                                                                      <input type="datetime-local" class="form-control" id="updated_at" name="updated_at" value="{{ date('Y-m-d\TH:i:s', strtotime($gol->updated_at)) }}" aria-describedby="emailHelp">
                                                                 </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                 <button type="submit" name="submit" class="btn btn-primary" >Simpan Perubahan</button>
                                                            </div>
                                                       </form>
                                                  </div>
                                             </div>
                                        </div>

                                        <!-- BUTTON DELETE DATA  -->

                                        <a href="golongan/{{$gol->gol_id}}" onclick="return confirm('yakin ingin menghapus data?')">
                                             <button type="button" class="btn btn-danger">Delete</button>
                                        </a>
                                   </td>
                              </tr>
                        @endforeach
                    </tbody>
</table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
