<div class="modal fade" tabindex="-1" id="onload" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Selamat Datang</h3>
            </div>
            <div class="modal-body">
                <p class="fs-5">Anda Belum bisa mengakses kelas ini tunggu, kurang lebih 5 hari dari pembelian untuk
                    menerima buku
                    <br>
                </p>
                <p>Kelas akan terbuka pada </p>
                <span class="bg-warning p-2 fs-5 text-center d-block fw-bold">Tanggal
                    {{ $add_5->isoFormat('DD MMMM YYYY') }},
                    Pukul {{ $add_5->isoFormat('HH:MM') }} </span>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary w-50" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
