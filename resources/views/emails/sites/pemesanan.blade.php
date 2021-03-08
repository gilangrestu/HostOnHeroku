@component('mail::message')
# Notifikasi Peminjaman

Haloo Pak Sekdin, Ada yang ingin meminta persetujuan bensin nih,
Silahkan klik tombol dibawah ini.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/sekdin'])
Klik Disini
@endcomponent

Terimakasih,<br>
DINAS KEBUDAYAAN DAN PARIWISATA
@endcomponent
