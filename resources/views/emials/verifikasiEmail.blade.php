@component('mail::message')
# Hello {{ $data->email }}

Request code berhasil pada tanggal {{ $data->created_at }} <br>
Code verifikasi : {{ $data->code }}

Jika code verifikasi bermasalah
harap hubungi admin sesuai cabang anda bekerja

Thanks,<br>
{{ config('app.name') }}
@endcomponent
