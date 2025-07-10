{{-- modal --}}
<div class="modal fade" id="paymentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary ">
                <h5 class="text-white mb-0">Pilih Wilayah Pengiriman</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Region Selection -->
                <div id="regionSelection">
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <div class="p-3 region-option text-center bg-primary-subtle" onclick="selectRegion('jawa')">
                                <h5>Pembayaran dalam Pulau Jawa</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 region-option text-center bg-primary-subtle"
                                onclick="selectRegion('luarJawa')">
                                <h5>Pembayaran luar Pulau Jawa</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jawa Content (Hidden by default) -->
                <div id="jawaContent" class="d-none">
                    <h5>Pembayaran dalam Pulau Jawa</h5>
                    <ul class="mb-1 list-group">
                        <li class="list-group-item p-2">Harga buku: Rp 350.000</li>
                        <li class="list-group-item p-2">Ongkos kirim: Rp 15.000</li>
                        <li class="list-group-item p-2">kode unik "8" (cantumkan di akhir digit)</li>
                        <li class="list-group-item p-2">Metode pembayaran: <div class="row">
                                <div class="col-12">
                                    <!-- Button 1 -->
                                    <button class="btn btn-primary btn-sm mb-2" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#keterangan1" aria-expanded="false" aria-controls="keterangan1">
                                        Transfer Bank
                                    </button>

                                    <!-- Button 2 -->
                                    <button class="btn btn-primary btn-sm mb-2" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#keterangan2" aria-expanded="false" aria-controls="keterangan2">
                                        Scan QRIS
                                    </button>

                                    <!-- Keterangan 1 -->
                                    <div class="collapse" id="keterangan1" data-bs-parent=".row">
                                        <div class="card-body">
                                            <p>Transfer ke rekening Bank BRI <span
                                                    class="bg-warning p-1 rounded">623101025711536</span>
                                                a/n
                                                <span>MOCH ILYAS</span>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Keterangan 2 -->
                                    <div class="collapse" id="keterangan2" data-bs-parent=".row">
                                        <div class="card-body text-center">
                                            <img src="{{ asset('img/qris.png') }}" alt="scanqris" style="width: 300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <p class="mb-3 p-2 border border-primary">
                        Transfer sejumlah : <br> Rp. 350.000 + ongkir Rp. 15.000 + kode unik 8 <br> Total <span
                            class="p-1 bg-warning fs-5 rounded">Rp.
                            365.008</span>
                    </p>
                </div>

                <!-- Luar Jawa Content (Hidden by default) -->
                <div id="luarJawaContent" class="d-none">
                    <h5>Pembayaran luar Pulau Jawa</h5>
                    <ul class="mb-1 list-group">
                        <li class="list-group-item p-2">Harga buku: Rp 350.000</li>
                        <li class="list-group-item p-2">Ongkos kirim: Rp 40.000</li>
                        <li class="list-group-item p-2">kode unik "8" (cantumkan di akhir digit)</li>
                        <li class="list-group-item p-2"> Metode Pembayaran
                            <div class="row">
                                <div class="col-12">
                                    <!-- Button 1 -->
                                    <button class="btn btn-primary btn-sm mb-2" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#keterangan1" aria-expanded="false" aria-controls="keterangan1">
                                        Transfer Bank
                                    </button>

                                    <!-- Button 2 -->
                                    <button class="btn btn-primary btn-sm mb-2" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#keterangan2" aria-expanded="false" aria-controls="keterangan2">
                                        Scan QRIS
                                    </button>

                                    <!-- Keterangan 1 -->
                                    <div class="collapse" id="keterangan1" data-bs-parent=".row">
                                        <div class="card-body">
                                            <p>Transfer ke rekening Bank BRI <span
                                                    class="bg-warning p-1 rounded">623101025711536</span>
                                                a/n
                                                <span>MOCH ILYAS</span>
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Keterangan 2 -->
                                    <div class="collapse" id="keterangan2" data-bs-parent=".row">
                                        <div class="card-body text-center">
                                            <img src="{{ asset('img/qris.png') }}" alt="scanqris" style="width: 300px">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <p class="mb-3 p-2 border border-primary">
                        Transfer sejumlah : <br> Rp. 350.000 + ongkir Rp. 40.000 + kode unik 8 <br> Total <span
                            class="p-1 bg-warning fs-5 rounded">Rp.
                            390.008</span>
                    </p>
                    <p class="mb-1 text-danger"> <i>Catatan: Estimasi pengiriman: 3-5 hari</i>
                    </p>
                    {{-- <hr>
                    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#upload">
                        Upload Pembayaran
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</div>
