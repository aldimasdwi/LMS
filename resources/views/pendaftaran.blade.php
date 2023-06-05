@extends('layouts.frontend.app', ['title' => 'Pendaftaran'])

@push('css')
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endpush

@section('content')
<section class="p-5">
  <div id="register-form">
    <div class="form container pt-5">
      <h1 class="text-center">Form Pendaftaran</h1>
      <h5 class="text-center text-danger">Bacalah Syarat dan Petunjuk di Halaman Awal sebelum mengisi Pendaftaran</h5>
      <form id="formData1" method="POST" action="" enctype="multipart/form-data">
        @csrf
        <div id="inc-personal">
          <h3>
            <i class="material-icons">
              person
            </i>
            Data Diri
          </h3>
          <div class="row pt-2 mb-3" id="data-personal">
            <div class="col-md-4 text-center">
              <h4 style="color: #2A5184;" class="bg-light py-1">Foto Anda</h4>
              <img style="max-width:78%;" src="https://pendaftaran.pondokit.com/images/user.png"
                class="shadow img-fluid img-thumbnail" id="img-upload">
              <div class="mt-4">
                <label class="btn btn-outline-primary shadow" for="photo">Upload Foto</label>
                <input class="d-none" value="{{ old('photo') }}" accept="image/jpeg,image/jpg,image/png," type="file"
                  name="photo" id="photo">
                @error('photo')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
              <small class="text-success">
                Hanya file jpg/png/jpeg/gif,

                Upload Pas Photo Anda dengan ukuran 4x6.<br>
              </small>
            </div>
            <div class="col-md-8">
              <div class="row bg-light shadow pt-2 border mb-3">
                <div class="col-md-6">
                  <div class="form-group valid-form has-feedback">
                    <label class="syarat" for="name">
                      Nama Lengkap
                      <i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top"
                        title="Isi dengan nama lengkap Anda."></i>
                    </label>
                    <input value="{{ old('name') }}" type="text" class="form-control" id="name" name="name"
                      placeholder="Masukan nama">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group valid-form has-feedback">
                    <label class="syarat" for="gelombang">
                      Gelombang
                      <i class="fa fa-question-circle-o" data-toggle="tooltip" data-placement="top"
                        title="Anda ingin masuk pendaftaran di gelombang berapa ?"></i>
                    </label>
                    <select class="form-control" name="gelombang" id="gelombang">
                      <option value="">-- Pilih --</option>
                      <option value="1">Gelombang 1 </option>
                      <option value="2">Gelombang 2 </option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group valid-form has-feedback">
                    <label class="syarat" for="jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                      <option value="" @selected(old('jenis_kelamin')==="" )>--Pilih--</option>
                      <option value="Pria" @selected(old('jenis_kelamin')==="Pria" )>Pria</option>
                      <option value="Wanita" @selected(old('jenis_kelamin')==="Wanita" )>Wanita
                      </option>
                    </select>
                    @error('jenis_kelamin')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group valid-form has-feedback">
                    <label class="syarat" for="sudah_lulus_sekolah">Sudah Lulus / Masih Sekolah</label>
                    <select class="form-control" name="sudah_lulus_sekolah" id="sudah_lulus_sekolah">
                      <option value="Sudah Lulus Sekolah" @selected(old('sudah_lulus_sekolah')==="Sudah Lulus Sekolah"
                        )>Sudah Lulus Sekolah</option>
                      <option value="Masih Sekolah" @selected(old('sudah_lulus_sekolah')==="Masih Sekolah" )>Masih
                        Sekolah</option>
                    </select>
                    @error('sudah_lulus_sekolah')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="syarat" for="tanggal_lahir">Tanggal Lahir</label>
                    <input style="cursor: pointer;" value="{{ old('tanggal_lahir') }}" id="tanggal_lahir" type="date"
                      class="form-control" name="tanggal_lahir">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="syarat" for="provinsi">Provinsi</label>
                    <select class="form-control" name="provinsi" id="provinsi">
                      <option value="Jakarta">Jakarta</option>
                      <option value="Aceh">Aceh</option>
                      <option value="Bali">Bali</option>
                      <option value="Banten">Banten</option>
                      <option value="Bengkulu">Bengkulu</option>
                      <option value="Gorontalo">Gorontalo
                      </option>
                      <option value="Jambi">Jambi</option>
                      <option value="Jawa Barat">Jawa Barat
                      </option>
                      <option value="Jawa Tengah">Jawa
                        Tengah
                      </option>
                      <option value="Jawa Timur">Jawa Timur
                      </option>
                      <option value="Kalimantan Barat">
                        Kalimantan Barat</option>
                      <option value="Kalimantan Selatan">
                        Kalimantan Selatan</option>
                      <option value="Kalimantan Tengah">
                        Kalimantan Tengah</option>
                      <option value="Kalimantan Timur">
                        Kalimantan Timur</option>
                      <option value="Kalimantan Utara">
                        Kalimantan Utara</option>
                      <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                      <option value="Kepulauan Riau">
                        Kepulauan
                        Riau</option>
                      <option value="Lampung">Lampung</option>
                      <option value="Maluku">Maluku</option>
                      <option value="Maluku Utara">Maluku
                        Utara
                      </option>
                      <option value="Nusa Tenggara Barat">
                        Nusa Tenggara Barat</option>
                      <option value="Nusa Tenggara Timur">
                        Nusa Tenggara Timur</option>
                      <option value="Papua">Papua</option>
                      <option value="Papua Barat">Papua
                        Barat
                      </option>
                      <option value="Riau">Riau</option>
                      <option value="Sulawesi Barat">
                        Sulawesi
                        Barat</option>
                      <option value="Sulawesi Selatan">
                        Sulawesi
                        Selatan</option>
                      <option value="Sulawesi Tengah">
                        Sulawesi
                        Tengah</option>
                      <option value="Sulawesi Tenggara">
                        Sulawesi Tenggara</option>
                      <option value="Sulawesi Utara">
                        Sulawesi
                        Utara</option>
                      <option value="Sumatera Barat">
                        Sumatera
                        Barat</option>
                      <option value="Sumatera Selatan">
                        Sumatera
                        Selatan</option>
                      <option value="Sumatera Utara">
                        Sumatera
                        Utara</option>
                      <option value="Yogyakarta">Yogyakarta
                      </option>
                    </select>
                    @error('provinsi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6" id="department2">
                  <div class="form-group valid-form has-feedback">
                    <label class="syarat" for="jurusan_yang_dituju">Jurusan Yang Dituju</label>
                    <select class="form-control" name="jurusan_yang_dituju" id="jurusan_yang_dituju">
                      <option value="">Pilih Jurusan</option>
                      <option id="dprogrammer" value="Programmer">
                        Pondok Programmer (Khusus Ikhwan)</option>
                      <option id="dmultimedia" value="Multimedia">
                        Pondok Multimedia (Khusus Ikhwan)
                      </option>
                      <option id="dimers" value="Imers">Pondok
                        Marketer(Imers) Ikhwan / Akhwat</option>
                      <option value="Enterpreneur">Pondok Enterpreneur (Khusus Ikhwan)</option>
                      <option value="Manajer">Pondok Manajer (Khusus Ikhwan)</option>
                    </select>
                    @error('jurusan_yang_dituju')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="syarat" for="hobi">Hobi</label>
                    <input value="{{ old('hobi') }}" type="text" id="hobi" class="form-control" name="hobi">
                    @error('hobi')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="syarat text-center" for="cita_cita">Cita - Cita</label>
                    <textarea type="text" class="form-control" name="cita_cita"
                      id="cita_cita">{{ old('cita_cita') }}</textarea>
                    @error('cita_cita')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-feedback">
                    <label class="syarat" for="alamat_rumah">Alamat Rumah</label>
                    <textarea type="text" id="alamat_rumah" class="form-control" name="alamat_rumah"
                      placeholder=" Ex : Jl, Wijoyo Mulyo No.64 Rt/Rw 02/06 Banguntapan...">{{ old('alamat_rumah') }}</textarea>
                    @error('alamat_rumah')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="inc-contact">
          <h3>
            <i class="material-icons">
              perm_contact_calendar
            </i> Kontak
          </h3>
          <div class="row pt-2 mb-2">
            <div class="col-xl-12">
              <div class="row bg-light shadow pt-2 border mb-3">
                <div class="col-xl-6">
                  <div class="form-group has-feedback">
                    <label class="syarat" for="nomor_whatsapp">Nomor WhatsApp</label>
                    <input value="{{ old('nomor_whatsapp') }}" type="number" class="form-control" id="nomor_whatsapp"
                      name="nomor_whatsapp" placeholder="08xxxxxxxxxx" />
                    @error('nomor_whatsapp')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="form-group has-feedback">
                    <label class="syarat" for="email">Email</label>
                    <input value="{{ old('email') }}" type="email" id="email" class="form-control" name="email"
                      placeholder="example@mail.com" style="padding-right: 42px;" />
                    @error('email')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="form-group has-feedback">
                    <label class="syarat" for="akun_facebook">Link Akun Facebook</label>
                    <input value="{{ old('akun_facebook') }}" class="form-control" type="url" id="akun_facebook"
                      name="akun_facebook" placeholder="https://www.facebook.com/contoh">
                    <span style="color:green;"><small>Isi dengan link profile facebook kamu</small></span>
                    @error('akun_facebook')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="inc-education">
          <h3> <i class="material-icons">
              school
            </i> Pendidikan
          </h3>
          <div class="row bg-light shadow pt-2 border mb-3">
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="lulusan">Lulusan</label>
                <input value="{{ old('lulusan') }}" type="text" id="lulusan" class="form-control" name="lulusan"
                  placeholder="SMP/SMA/SMK/MA/PONDOK">
                @error('lulusan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="jurusan_di_sekolah">Jurusan di Sekolah</label>
                <input value="{{ old('jurusan_di_sekolah') }}" type="text" class="form-control" id="jurusan_di_sekolah"
                  name="jurusan_di_sekolah">
                @error('jurusan_di_sekolah')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="pengalaman_organisasi">Pengalaman Organisasi (Optional)</label>
                <textarea type="text" class="form-control" id="pengalaman_organisasi"
                  name="pengalaman_organisasi">{{ old('pengalaman_organisasi') }}</textarea>
                @error('pengalaman_organisasi')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="prestasi">Prestasi (Optional)</label>
                <textarea type="text" class="form-control" id="prestasi"
                  name="prestasi">{{ old('prestasi') }}</textarea>
                @error('prestasi')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-12">
              <div class="form-group has-feedback">
                <label class="syarat" for="asal_sekolah">Asal Sekolah</label>
                <input value="{{ old('asal_sekolah') }}" type="text" class="form-control" id="asal_sekolah"
                  name="asal_sekolah">
                @error('asal_sekolah')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
        </div>
        <div id="inc-family">
          <h3><i class="material-icons">
              group
            </i> Keluarga
          </h3>
          <div class="row bg-light shadow pt-2 border mb-4">
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="kondisi_orang_tua">Kondisi Orang Tua</label>
                <select class="form-control" name="kondisi_orang_tua" id="kondisi_orang_tua">
                  <option value="lengkap">Lengkap</option>
                  <option value="yatim">Yatim</option>
                  <option value="piatu">Piatu</option>
                  <option value="yatim_piatu">Yatim Piatu</option>
                  <option value="cerai_hidup">Cerai Hidup</option>
                </select>
                @error('kondisi_orang_tua')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="nomor_seluler_orang_tua">Nomor Seluler Orang Tua</label>
                <input value="{{ old('nomor_seluler_orang_tua') }}" type="number" class="form-control"
                  id="nomor_seluler_orang_tua" name="nomor_seluler_orang_tua">
                @error('nomor_seluler_orang_tua')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="nama_ayah">Nama Ayah</label>
                <input value="{{ old('nama_ayah') }}" type="text" id="nama_ayah" class="form-control" name="nama_ayah">
                @error('nama_ayah')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="nama_ibu">Nama Ibu</label>
                <input value="{{ old('nama_ibu') }}" type="text" class="form-control" id="nama_ibu" name="nama_ibu">
                @error('nama_ibu')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="pekerjaan_ayah">Pekerjaan Ayah</label>
                <input value="{{ old('pekerjaan_ayah') }}" type="text" id="pekerjaan_ayah" class="form-control"
                  name="pekerjaan_ayah">
                @error('pekerjaan_ayah')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="pekerjaan_ibu">Pekerjaan Ibu</label>
                <input value="{{ old('pekerjaan_ibu') }}" type="text" class="form-control" id="pekerjaan_ibu"
                  name="pekerjaan_ibu">
                @error('pekerjaan_ibu')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="gaji_orang_tua_per_bulan">Gaji Orang Tua / Bulan</label>
                <select class="form-control" name="gaji_orang_tua_per_bulan" id="gaji_orang_tua_per_bulan">
                  <option value="< 1jt">
                    &lt; Rp. 1.000.000</option>
                  <option value="1jt - 2,5jt">Rp. 1.000.000 – Rp. 2.500.000</option>
                  <option value="2,5jt - 5jt">Rp. 2.500.000 – Rp. 5.000.000</option>
                  <option value="> 5jt"> &gt; Rp. 5.000.000</option>
                </select>
                @error('gaji_orang_tua_per_bulan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="jumlah_saudara">Jumlah Saudara</label>
                <select class="form-control" name="jumlah_saudara" id="jumlah_saudara">
                  <option value="tidak ada">tidak ada</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                  <option value="7">7</option>
                  <option value="8">8</option>
                  <option value="9">9</option>
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                  <option value="13">13</option>
                  <option value="14">14</option>
                  <option value="15">15</option>
                </select>
                @error('jumlah_saudara')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>


          </div>
        </div>
        <div id="inc-questionnaire">
          <h3>
            <i class="material-icons">
              list_alt
            </i> Kuesioner
          </h3>
          <div class="row bg-light shadow pt-3 border mb-3">
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="punya_laptop">Punya laptop / Tidak ?</label>
                <select class="form-control" name="punya_laptop" id="punya_laptop">
                  <option value="Punya">Punya</option>
                  <option value="Belum">Belum</option>
                  <option value="Sedang di Usahakan">Saya sedang usahakan</option>
                </select>
                @error('punya_laptop')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="hafalan_alquran">Hafalan Al-Qur`an</label>
                <select class="form-control" name="hafalan_alquran" id="hafalan_alquran">
                  <option value="Kurang dari 1 Juz">Kurang dari 1 Juz</option>
                  <option value="1 juz">1 juz</option>
                  <option value="2 juz">2 juz</option>
                  <option value="3 juz">3 juz</option>
                  <option value="4 juz">4 juz</option>
                  <option value="5 juz">5 juz</option>
                  <option value="6 juz">6 juz</option>
                  <option value="7 juz">7 juz</option>
                  <option value="8 juz">8 juz</option>
                  <option value="9 juz">9 juz</option>
                  <option value="10 juz">10 juz</option>
                  <option value="11 juz">11 juz</option>
                  <option value="12 juz">12 juz</option>
                  <option value="13 juz">13 juz</option>
                  <option value="14 juz">14 juz</option>
                  <option value="15 juz">15 juz</option>
                  <option value="16 juz">16 juz</option>
                  <option value="17 juz">17 juz</option>
                  <option value="18 juz">18 juz</option>
                  <option value="19 juz">19 juz</option>
                  <option value="20 juz">20 juz</option>
                  <option value="21 juz">21 juz</option>
                  <option value="22 juz">22 juz</option>
                  <option value="23&quot;" juz"="">23 juz</option>
                  <option value="24 juz">24 juz</option>
                  <option value="25 juz">25 juz</option>
                  <option value="26 juz">26 juz</option>
                  <option value="27 juz">27 juz</option>
                  <option value="28 juz">28 juz</option>
                  <option value="29 juz">29 juz</option>
                  <option value="30 juz">30 juz</option>
                </select>
                @error('hafalan_alquran')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="tokoh_idola">Tokoh Idola</label>
                <input value="{{ old('tokoh_idola') }}" type="text" id="tokoh_idola" class="form-control"
                  name="tokoh_idola">
                @error('tokoh_idola')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="ustad_favorit">3 Ustad Favorite </label>
                <input value="{{ old('ustad_favorit') }}" type="text" name="ustad_favorit" id="ustad_favorit"
                  class="form-control">
                @error('ustad_favorit')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>

            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="masih_merokok">Masih Merokok ? </label>
                <select name="masih_merokok" id="masih_merokok" class="form-control">
                  <option value="Bukan Perokok">Bukan Perokok</option>
                  <option value="Iya">Iya</option>
                  <option value="Berusaha Berhenti">Berusaha Berhenti</option>
                  <option value="Kadang - Kadang">Kadang - Kadang</option>
                  <option value="Sudah Berhenti Total">Sudah Berhenti Total</option>
                </select>
                @error('masih_merokok')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="punya_pacar">Memiliki Pacar / Tidak</label>
                <select class="form-control" name="punya_pacar" id="punya_pacar">
                  <option value="tidak">Tidak</option>
                  <option value="iya">Iya</option>
                </select>
                @error('punya_pacar')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>




            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="pernahkah_belajar_dalam_jurusan_yang_dituju">Pernah Belajar Dalam Jurusan
                  Yang Dituju?</label>
                <select class="form-control" name="pernahkah_belajar_dalam_jurusan_yang_dituju"
                  id="pernahkah_belajar_dalam_jurusan_yang_dituju">
                  <option value="Pernah">Pernah</option>
                  <option value="Tidak Pernah">Tidak Pernah</option>
                </select>
                @error('pernahkan_belajar_dalam_jurusan_yang_dituju')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="pemahaman_agama">Pemahaman Agama</label>
                <input value="{{ old('pemahaman_agama') }}" type="text" id="pemahaman_agama" name="pemahaman_agama"
                  class="form-control" placeholder="Contoh: Muhammadiyah, NU dll…">
                @error('pemahaman_agama')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>
            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="amalan_sunah_yang_sering_dilakukan">Amalan Sunnah Yang Sering
                  Dilakukan</label>
                <input value="{{ old('amalan_sunah_yang_sering_dilakukan') }}" type="text" class="form-control"
                  id="amalan_sunah_yang_sering_dilakukan" name="amalan_sunah_yang_sering_dilakukan">
                @error('amalan_sunah_yang_sering_dilakukan')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>








            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="mengetahui_pondok_it_dari"> Dari Mana Anda Mengetahui Pondok IT ?
                  <br></label>
                <select class="form-control" name="mengetahui_pondok_it_dari" id="mengetahui_pondok_it_dari">
                  <option value="Orang Tua">Orang Tua</option>
                  <option value="Guru / Ustadz">Guru / Ustadz</option>
                  <option value="Saudara">Saudara</option>
                  <option value="Teman">Teman</option>
                  <option value="Facebook">Facebook</option>
                  <option value="Youtube">Youtube</option>
                  <option value="Instagram">Instagram</option>
                  <option value="Yang Lain">Yang Lain</option>
                </select>
                @error('mengetahui_pondok_dari')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>





            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="skill_yang_dimiliki">Jelaskan Tentang Skill IT Yang Sudah Dimiliki !</label>
                <textarea style="height: 100px;" name="skill_yang_dimiliki" id="skill_yang_dimiliki"
                  class="form-control" row="" bg-lights="8" cols="70">{{ old('skill_yang_dimiliki') }}</textarea>
                @error('skill_yang_dimiliki')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>




            <div class="col-xl-6">
              <div class="form-group has-feedback">
                <label class="syarat" for="pelajaran_yang_disukai">Pelajaran yang Anda Sukai</label>
                <textarea style="height: 100px;" name="pelajaran_yang_disukai" id="pelajaran_yang_disukai"
                  class="form-control" row="" bg-lights="8" cols="70">{{ old('pelajaran_yang_disukai') }}</textarea>
                @error('pelajaran_yang_disukai')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
            </div>





          </div>
        </div>

        <div id="inc-snk">
          <div class="form-group mt-4">
            <small style="color: rgb(255, 0, 0);">*Saya menyatakan
              bahwa data yang saya tulis dan isi diatas adalah data yang sebenarnya tanpa ada sedikitpun pernyataan
              yang dibuat-buat. Apabila didapati pemalsuan/memalsukan dalam bentuk apapun saya siap menerima sanksi dari
              pihak yang
              bersangkutan dan Allah telah menjadi saksi atas perbuatan yang saya lakukan.</small>
          </div>
        </div>
        <div class="text-center row mb-1">
          <div class="mb-3" id="inc-send-1">
            <div class="form-group kirim">
              <button style="font-weight: bold;" name="submit" value="submit" id="submit-1" type="submit"
                class="shadow btn btn-outline-primary btn-lg px-5">Kirim Data</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection