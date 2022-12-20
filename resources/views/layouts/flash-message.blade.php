@if ($message = Session::get('success'))
    <div class="modal fade modal-sm flash-success-modal" id="onload" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-alert modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_rgdnbvya.json"
                        background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                    </lottie-player>
                    <h6>Berhasil</h6>
                    <p>{{ $message }}</p>
                </div>
                <div class="d-grid p-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('success-store'))
    <div class="modal fade modal-sm flash-success-store-modal" id="onload" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-alert modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_8SdEu9.json"
                        background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                    </lottie-player>
                    <h6>Tambah Berhasil</h6>
                    <p>{{ $message }}</p>
                </div>
                <div class="d-grid p-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('success-edit'))
    <div class="modal fade modal-sm flash-success-edit-modal" id="onload" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-alert modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_h3xydjm5.json"
                        background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                    </lottie-player>
                    <h6>Edit Berhasil</h6>
                    <p>{{ $message }}</p>
                </div>
                <div class="d-grid p-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('success-destroy'))
    <div class="modal fade modal-sm flash-success-destroy-modal" id="onload" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-alert modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_v9ytewaj.json"
                        background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                    </lottie-player>
                    <h6>Hapus Berhasil</h6>
                    <p>{{ $message }}</p>
                </div>
                <div class="d-grid p-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if ($message = Session::get('failed'))
    <div class="modal fade modal-sm flash-failed-modal" id="onload" data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-alert modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <lottie-player src="https://assets3.lottiefiles.com/packages/lf20_Tkwjw8.json"
                        background="transparent" speed="1" style="width: 200px; height: 200px;" loop autoplay>
                    </lottie-player>
                    <h6>Gagal</h6>
                    <p>{{ $message }}</p>
                </div>
                <div class="d-grid p-3">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endif
