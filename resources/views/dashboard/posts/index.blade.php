@extends('dashboard.layouts.main')

@section('container')
    
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">By: {{ Auth()->user()->name }}</h1>
</div>

<h2>Table Post</h2>

@if (session()->has('sukses'))
  <div class="col-md-5">
    <div class="alert alert-success alert-dismissible fade show ms-3" role="alert">
      <strong>Berhasil!</strong> {{ session('sukses') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  </div>
@endif
      <div class="table-responsive">
        <a href="/dashboard/posts/create" class="btn btn-success float-end mb-2"><span data-feather="plus"></span> Tambah</a>
        <table class="table table-striped table-sm table-bordered">
          <thead class="bg-success text-light">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->category->name }}</td>
                <td class="text-center">
                  <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat"><span data-feather="eye"></span></a>
                  <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning" data-bs-toggle="tooltip" data-bs-placement="top" title="Update"><span data-feather="edit"></span></a>
                  <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="border-0 d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus" onclick="return confirm('Yakin LO ?')"><span data-feather="x-circle"></span></button>
                  </form>
                </td>
              </tr>   
              @endforeach
            </tbody>
        </table>
      </div>
@endsection

<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
    </script>