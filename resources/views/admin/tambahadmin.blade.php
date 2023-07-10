@extends('layouts.backend.app',[
	'title' => 'tambahadmin',
	'contentTitle' => 'Tambah Admin',
])
@section('content')

@if(session('ubahh'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('ubahh') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<br>
<x-card>
    <x-slot name="col">6</x-slot>
    <x-slot name="header">Admin Baru</x-slot>
    <form method="POST" action="{{ route('admin.profile.data') }}">
    @csrf
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="" class="form-control @error('name') is-invalid @enderror" name="name" required>
        @error('name')
          <div class="invalid-feedback">
              {{ $message }}
           </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Status Admin</label>
        <select class="form-select"  class="form-control @error('status_id') is-invalid @enderror" aria-label="Default select example" name="status_id" required>
            <option selected>Status Admin</option>
            <option value="2">Super Admin</option>
            <option value="4">Admin Programmer</option>
            <option value="5">Admin Marketer</option>
            <option value="6">Admin Multimedia</option>
          </select>
          @error('status_id')
          <div class="invalid-feedback">
              {{ $message }}
           </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
        @error('email')
          <div class="invalid-feedback">
              {{ $message }}
           </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
        @error('password')
          <div class="invalid-feedback">
              {{ $message }}
           </div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-sm">Tambah</button>
    </div>
    </form>
</x-card>
@stop
