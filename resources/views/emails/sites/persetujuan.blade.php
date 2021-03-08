@component('mail::message')
# Notifikasi Pesetujuan

Haloo, Peminjaman mobil dinas telah DISETUJUI pada tanggal {{ $details['tgl_persetujuan'] }} dengan 
keterangan bensin {{ $details['status_bensin'] }} @if($details['status_bensin'] == 'DISETUJUI')dan jumlah kupon {{ $details['kupon'] }} liter.@endif

Terimakasih,<br>
DINAS KEBUDAYAAN DAN PARIWISATA BANYUWANGI
@endcomponent
