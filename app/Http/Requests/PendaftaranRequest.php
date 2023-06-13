<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => ['optional'],
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'gelombang' => ['required'],
            'jenis_kelamin' => ['required'],
            'sudah_lulus_sekolah' => ['required'],
            'tanggal_lahir' => ['required'],
            'provinsi' => ['required'],
            'jurusan_yang_dituju' => ['required'],
            'hobi' => ['required'],
            'cita_cita' => ['required', ],
            'alamat_rumah' => ['required'],
            'nomor_whatsapp' => ['required'],
            'akun_facebook' => ['required'],
            'lulusan' => ['required'],
            'jurusan_di_sekolah' => ['required'],
            'pengalaman_organisasi' => ['required'],
            'prestasi' => ['required'],
            'asal_sekolah' => ['required'],
            'kondisi_orang_tua' => ['required'],
            'nomor_seluler_orang_tua' => ['required'],
            'nama_ayah' => ['required'],
            'nama_ibu' => ['required'],
            'pekerjaan_ayah' => ['required'],
            'pekerjaan_ibu' => ['required'],
            'gaji_orang_tua_per_bulan' => ['required'],
            'jumlah_saudara' => ['required'],
            'punya_laptop' => ['required'],
            'hafalan_alquran' => ['required'],
            'tokoh_idola' => ['required'],
            'ustad_favorit' => ['required'],
            'masih_merokok' => ['required'],
            'punya_pacar' => ['required'],
            'pernahkah_belajar_dalam_jurusan_yang_dituju' => ['required'],
            'pemahaman_agama' => ['required'],
            'amalan_sunah_yang_sering_dilakukan' => ['required'],
            'mengetahui_pondok_it_dari' => ['required'],
            'skill_yang_dimiliki' => ['required'],
            'pelajaran_yang_disukai' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Harap isi :attribute'
        ];
    }
}