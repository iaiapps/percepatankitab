    <!-- Modal -->
    <div class="modal fade" id="kode" tabindex="-1" aria-labelledby="uploadLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content">
                <form action="{{ route('kode') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="uploadLabel">Klaim Kode Kelas</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 mb-3">Masukkan kode yang telah didapat sebelumnya</p>
                        <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                        <input class="form-control @error('document') is-invalid @enderror" type="text"
                            name="kode" class="pt-2">

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Klaim Kode</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
