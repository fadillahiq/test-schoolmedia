@extends('layouts.admin')

@section('title', 'Data Master - Kelas')

@section('header')
    <h1>Data Kelas</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h4>List Kelas</h4>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive table-invoice">
            <table class="table table-striped">
              <tr>
                <th>#</th>
                <th>Nama Kelas</th>
              </tr>
              @forelse ($data as $kelas)
              <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $kelas->nama_kelas }}</td>
              </tr>
              @empty
              <tr>
                  <td colspan="12"><p class="text-center text-danger mt-3"><strong>Data Tidak Ditemukan !</strong></p></td>
              </tr>
              @endforelse
            </table>
            {{ $data->links() }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
