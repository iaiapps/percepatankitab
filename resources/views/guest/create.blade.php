    <!-- Modal -->
    <div class="modal fade" id="upload" tabindex="-1" aria-labelledby="uploadLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form action="{{ route('upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="uploadLabel">Upload Bukti Pembayaran</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="fs-5 mb-3">gambar berupa .png atau .jpg*</p>
                        <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                        <input type="text" name="name" value="{{ $user->name }}" hidden>

                        <input class="form-control @error('document') is-invalid @enderror" type="file"
                            name="document" class="pt-2">
                        <p class="d-block py-2 text-start">*ukuran maksimal 1 mb</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
