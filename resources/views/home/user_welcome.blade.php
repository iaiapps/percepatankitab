<div class="modal fade" tabindex="-1" id="onload">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('status', $user->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Selamat Datang</h3>
                </div>
                <div class="modal-body">
                    <p class="fs-5">Terima kasih telah melakukan bukti pembayaran, akun anda sudah aktif. Untuk
                        mengakses
                        kelas silahkan
                        masukkan kode berikut:
                        <br>
                    </p>
                    <span
                        class="bg-warning p-2 fs-5 text-center d-block fw-bold">{{ $user->payment->token_code }}</span>
                    <p class="mt-2 text-danger">silahkan catat dan simpan kode tersebut, setelah menutup dialog ini kode
                        tidak ditampilkan lagi!</p>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary w-50" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
