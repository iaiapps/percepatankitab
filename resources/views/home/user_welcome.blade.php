<div class="modal fade" tabindex="-1" id="onload" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('status', $user->id) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">Selamat Datang</h3>
                </div>
                <div class="modal-body">
                    <p class="fs-5">Terima kasih telah melakukan pembayaran, akun anda sudah aktif. Token anda
                        adalah:
                        <br>
                    </p>
                    <span
                        class="bg-warning p-2 fs-5 text-center d-block fw-bold">{{ $user->payment->token_code }}</span>
                    <p class="mt-2 text-danger"> <i>silahkan catat dan simpan kode tersebut, setelah menutup dialog ini
                            kode
                            tidak ditampilkan lagi!</i></p>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary w-50" data-bs-dismiss="modal">Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
