<!-- JQuery Ajax -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<!-- Lottie Player -->
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
<!-- Bootstrap -->
<script src="{{ asset('/Library/Bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
</script>
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- Datatables -->
<script src="{{ asset('/Library/DataTables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/Library/DataTables/js/dataTables.bootstrap5.min.js') }}"></script>
<!-- ExportToExcel -->
<script src="{{ asset('/Library/ExportToExcel/jquery.table2excel.js') }}"></script>
<!-- Filepond -->
<script src="{{ asset('/Library/Filepond/filepond.js') }}"></script>
<script src="{{ asset('/Library/Filepond/filepond.min.js') }}"></script>
<script src="{{ asset('/Library/Filepond/id-id.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            "ordering": true,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "buttons": ["colvis"],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<!-- Modal Unverified -->
<script type="text/javascript">
    window.onload = () => {
        $('#onload').modal('show');
    }
</script>

<!-- Light Switch -->
<script>
    // Light Switch
    $('.status').change(function() {
        if ($(this).is(':checked')) {
            $(this).parent().siblings('.text').html('Aktif');
        } else {
            $(this).parent().siblings('.text').html('Tidak Aktif');
            if ($('.status:checked').length < 1) {
                event.preventDefault();
                $(this).parent().siblings('.text').html('Aktif');
            }

        }
    });
    $('.dashboard').click((event) => {
        if ($('.dashboard:checked').length < 1) {
            event.preventDefault();
            alert('Minimal 1 Banner Aktif!');
        }
    });
    $('.loginregist').click((event) => {
        if ($('.loginregist:checked').length < 1) {
            event.preventDefault();
            alert('Minimal 1 Gambar Aktif!');
        }
    });
    $('input.loginregist').on('change', function() {
        $('input.loginregist').not(this).prop('checked', false);
        $('input.loginregist').not(this).parent().siblings('.text').html('Tidak Aktif');

    });

    // //login-regist
    // var $status_aktif = $('#status_aktif');
    // var $status_tidak_aktif = $('#status_tidak_aktif');
    // var $id_banner_aktif = $('#id_banner_aktif');
    // var $id_banner_tidak_aktif = $('#id_banner_tidak_aktif');
    // $(document).ready(function() {
    //     $status_tidak_aktif.on('change', function() {
    //         var status_tidak_aktif = $(this).val();
    //         var status_aktif = $status_aktif.val();
    //         var id_banner_aktif = $id_banner_aktif.val();
    //         var id_banner_tidak_aktif = $id_banner_tidak_aktif.val();
    //         if (status_tidak_aktif) {
    //             $.ajax({
    //                 url: '/user/manage-banner/edit-status/'+ status_tidak_aktif,
    //                 type: "POST",
    //                 data: {
    //                     id_banner_aktif = id_banner_aktif,
    //                     id_banner_tidak_aktif = id_banner_tidak_aktif,
    //                     status_tidak_aktif: status_tidak_aktif,
    //                     status_aktif: status_aktif,
    //                     "_token": "{{ csrf_token() }}"
    //                 }
    //             });
    //         }
    //     });
    // });

</script>

<!-- Upload File -->
<script>
    // const form = document.querySelector(".form-container"),
    //     form2 = document.querySelector("form"),
    //     fileInput = document.querySelector(".file-input"),
    //     progressArea = document.querySelector(".progress-area"),
    //     uploadedArea = document.querySelector(".uploaded-area");

    // // form click event
    // form.addEventListener("click", () => {
    //     fileInput.click();
    // });

    // fileInput.onchange = ({
    //     target
    // }) => {
    //     let file = target.files[
    //         0]; //getting file [0] this means if user has selected multiple files then get first one only
    //     if (file) {
    //         let fileName = file.name; //getting file name
    //         if (fileName.length >= 12) { //if file name length is greater than 12 then split it and add ...
    //             let splitName = fileName.split('.');
    //             fileName = splitName[0].substring(0, 13) + "... ." + splitName[1];
    //         }
    //         uploadFile(fileName); //calling uploadFile with passing file name as an argument
    //     }
    // }

    // // file upload function
    // function uploadFile(name) {
    //     let xhr = new XMLHttpRequest(); //creating new xhr object (AJAX)
    //     xhr.open("POST", "php/upload.php"); //sending post request to the specified URL
    //     xhr.upload.addEventListener("progress", ({
    //         loaded,
    //         total
    //     }) => { //file uploading progress event
    //         let fileLoaded = Math.floor((loaded / total) * 100); //getting percentage of loaded file size
    //         let fileTotal = Math.floor(total / 1000); //gettting total file size in KB from bytes
    //         let fileSize;
    //         // if file size is less than 1024 then add only KB else convert this KB into MB
    //         (fileTotal < 1024) ? fileSize = fileTotal + " KB": fileSize = (loaded / (1024 * 1024)).toFixed(2) +
    //             " MB";
    //         let progressHTML = `<div class= "container_progressArea">
    //                                     <i class="fas fa-file-alt"></i>
    //                                     <div class="content">
    //                                         <div class="content-text">
    //                                             <p class="nama-file">${name}</p>
    //                                             <p class="number-file">${fileLoaded}%</p>
    //                                         </div>
    //                                         <div class="content-progress">
    //                                             <div class="bar-progress" style="width: ${fileLoaded}%"></div>
    //                                         </div>
    //                                     </div>
    //                                 </div>`;
    //         // uploadedArea.innerHTML = ""; //uncomment this line if you don't want to show upload history
    //         // uploadedArea.classList.add("onprogress");
    //         progressArea.innerHTML = progressHTML;
    //         if (loaded == total) {
    //             progressArea.innerHTML = "";
    //             let uploadedHTML = `<div class= "container_uploadedArea">
    //                                         <i class="fas fa-file-alt"></i>
    //                                         <div class="content">
    //                                             <div class="content-text">
    //                                                 <p class="nama-file">${name}</p>
    //                                                 <div class="span">
    //                                                     <p class="number-file">${fileSize}</p>
    //                                                     <p>| Uploaded</p>
    //                                                 </div>
    //                                             </div>
    //                                             <i class="fa-solid fa-check"></i>
    //                                         </div>
    //                                     </div>`;
    //             // uploadedArea.classList.remove("onprogress");
    //             // uploadedArea.innerHTML = uploadedHTML; //uncomment this line if you don't want to show upload history
    //             uploadedArea.insertAdjacentHTML("afterbegin",
    //                 uploadedHTML); //remove this line if you don't want to show upload history
    //         }
    //     });

    //     let data = new FormData(form2); //FormData is an object to easily send form data
    //     xhr.send(data); //sending form data
    // }
</script>

<!-- Keterangan Belum Lengkap -->
<script>
    let belumLengkap = document.querySelector("#gridRadios2");
    let keterangan = document.querySelector(".keterangan");

    $(function() {
        /* console.log("width: "+ document.body.clientWidth); */
        
        if(document.getElementById('Belum').checked) {
            keterangan.classList.remove("keterangan");
            keterangan.classList.remove("hidden");
            keterangan.classList.add("open");
        }

        $('#Belum').click(function() {
            keterangan.classList.remove("keterangan");
            keterangan.classList.remove("hidden");
            keterangan.classList.add("open");
            // $('.keterangan').toggleClass('open');
        });

        $('#gridRadios1').click(function() {
            document.getElementById('keterangan').value = '';
            keterangan.classList.remove("keterangan");
            keterangan.classList.remove("open");
            keterangan.classList.add("hidden");
            // $('.keterangan').toggleClass('hidden');
        });

        $('#gridRadios2').click(function() {
            keterangan.classList.remove("keterangan");
            keterangan.classList.remove("hidden");
            keterangan.classList.add("open");
            // $('.keterangan').toggleClass('open');
        });
    });
</script>

<!-- Select2 -->
<script src="{{ asset('/Library/Select2/select2.min.js') }}"></script>
<script>
    $('.form-select').select2({
        templateResult: function(option) {
            if(option.element && (option.element).hasAttribute('hidden')){
                return null;
            }
            return option.text;
   }
});
</script>

<!-- Sidebar -->
<script>
    let arrow = document.querySelectorAll(".arrow");
    for (var i = 0; i < arrow.length; i++) {
        arrow[i].addEventListener("click", (e) => {
            let arrowParent = e.target.parentElement.parentElement
                .parentElement; //selecting main parent of arrow
            arrowParent.classList.toggle("showMenu");
        });
    }

    let subarrow = document.querySelectorAll(".sub-arrow");
    for (var i = 0; i < subarrow.length; i++) {
        subarrow[i].addEventListener("click", (e) => {
            let subarrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
            subarrowParent.classList.toggle("showMenuSub");
        });
    }

    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".bx-menu");
    let inn = document.querySelector(".icon");
    console.log(sidebarBtn);
    console.log(inn);

    $(function() {
        /* console.log("width: "+ document.body.clientWidth); */

        resizeScreen();
        $(window).resize(function() {
            resizeScreen();
        });
        $('.bx-menu').click(function() {

            if (document.body.clientWidth > 400) {
                $('.sidebar').toggleClass('close');
                $('.navbar').toggleClass('close');
            } else {
                $('.sidebar').toggleClass('small-screen');
            }
        });

        function resizeScreen() {
            if (document.body.clientWidth < 400) {
                $('.sidebar').addClass('close');
            } else {
                $('.sidebar').removeClass('close');
            }
        }
    });
</script>

<!-- Tooltip -->
<script>
    $(document).ready(function() {
        $('[data-bs-toggle="tooltip"').tooltip({trigger: 'click'});
    });
</script>

<script>
    var date = new Date();
    var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
    $("#buttonExport").click(function() {
        $("#example").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: document.title + `-${current_date}`, //do not include extension
            fileext: ".xls", // file extension
        });
    });
</script>

<script>
        const mainInputThumbnail = document.querySelector("#main-input-thumbnail");
        const secondInputThumbnail = document.querySelector("#second-input-thumbnail");
        const imgthumbnail = document.querySelector("#image-thumbnail");

        function mainInputActiveThumbnail() {
            mainInputThumbnail.click();
        }
        mainInputThumbnail.addEventListener("change", function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    imgthumbnail.src = result;
                    }
                reader.readAsDataURL(file);
            }
        });
</script>

{{-- Expand Table --}}
<script>
    // function expand() {
    //     var y = document.getElementById("foo");
    //     y.setAttribute("rowspan", "2");
    // }

    function expand() {
        document.getElementById("foo").setAttribute("rowspan", "2");
        document.getElementById("foo2").setAttribute("rowspan", "2");
    }

    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            let loop = i;
            var loopnum = ("number" + loop);
            var loopact = ("action" + loop);
            var expand = this.parentElement.nextElementSibling;
            var number = document.getElementById("number");
            var action = document.getElementById("action");

            // number.setAttribute("rowspan", "2");
            // action.setAttribute("rowspan", "2");
            // var number = this.lastChild();
            // var action = this.lastChild();
            if (expand.style.display === "table-row") {
                expand.style.display = "none";
                number.setAttribute("rowspan", "1");
                action.setAttribute("rowspan", "1");
                // number.rowSpan = "1";
                // number.setAttribute("rowspan", "1");
                // action.setAttribute("rowspan", "1");
                // number.removeAttribute("rowspan", "2");
                // action.removeAttribute("rowspan", "2");
            } else {
                expand.style.display = "table-row";
                // number.rowSpan = "2";
                // number.setAttribute("rowspan", "2");
                // action.setAttribute("rowspan", "2");
            }
        });
    }

    // var elems = document.body.getElementsByTagName("td");
    // for (var i = 0; i < elems.length; i++) {
    //     elems[i].setAttribute("rowspan", "2");
    // }

    // $(document).ready(function() {
    //     $("foo").attr("rowspan", "2");
    // });

    // var y = document.getElementById("foo");
    // y.setAttribute("rowspan", "2");
</script>

<!-- File Upload New -->
<script>
const inputElement = document.querySelector('input[id="file"]');
// Create a FilePond instance
const pond = FilePond.create(inputElement);
//tujuan filepond
FilePond.setOptions({
    server: {
        process: '{{ route("upload") }}', //upload
        revert: (uniqueFileId, load, error) => {
                    //delete file
                    deleteImage(uniqueFileId);
                    error('Error terjadi saat delete file');
                    load();
                },
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    },
    labelIdle: '<i class="fas fa-cloud-upload-alt"></i><br>Tarik File kesini atau <span class="filepond--label-action">Pilih File</span>',
    labelInvalidField: 'Field berisi file tidak valid',
    labelFileWaitingForSize: 'Menunggu ukuran',
    labelFileSizeNotAvailable: 'Ukuran tidak tersedia',
    labelFileLoading: 'Memuat',
    labelFileLoadError: 'Kesalahan saat memuat',
    labelFileProcessing: 'Mengunggah',
    labelFileProcessingComplete: 'Unggahan selesai',
    labelFileProcessingAborted: 'Unggahan dibatalkan',
    labelFileProcessingError: 'Kesalahan saat mengunggah',
    labelFileProcessingRevertError: 'Kesalahan saat pengembalian',
    labelFileRemoveError: 'Kesalahan saat menghapus',
    labelTapToCancel: 'ketuk untuk membatalkan',
    labelTapToRetry: 'ketuk untuk mencoba lagi',
    labelTapToUndo: 'ketuk untuk mengurungkan',
    labelButtonRemoveItem: 'Hapus',
    labelButtonAbortItemLoad: 'Batal',
    labelButtonRetryItemLoad: 'Coba Kembali',
    labelButtonAbortItemProcessing: 'Batal',
    labelButtonUndoItemProcessing: 'Batal',
    labelButtonRetryItemProcessing: 'Coba Kembali',
    labelButtonProcessItem: 'Unggah',
    labelMaxFileSizeExceeded: 'File terlalu besar',
    labelMaxFileSize: 'Ukuran file maksimum adalah {filesize}',
    labelMaxTotalFileSizeExceeded: 'Jumlah file maksimum terlampaui',
    labelMaxTotalFileSize: 'Jumlah file maksimum adalah {filesize}',
    labelFileTypeNotAllowed: 'Jenis file tidak valid',
    fileValidateTypeLabelExpectedTypes: 'Mengharapkan {allButLastType} atau {lastType}',
    imageValidateSizeLabelFormatError: 'Jenis gambar tidak didukung',
    imageValidateSizeLabelImageSizeTooSmall: 'Gambar terlalu kecil',
    imageValidateSizeLabelImageSizeTooBig: 'Gambar terlalu besar',
    imageValidateSizeLabelExpectedMinSize: 'Ukuran minimum adalah {minWidth} × {minHeight}',
    imageValidateSizeLabelExpectedMaxSize: 'Ukuran maksimum adalah {minWidth} × {minHeight}',
    imageValidateSizeLabelImageResolutionTooLow: 'Resolusi terlalu rendah',
    imageValidateSizeLabelImageResolutionTooHigh: 'Resolusi terlalu tinggi',
    imageValidateSizeLabelExpectedMinResolution: 'Resolusi minimum adalah {minResolution}',
    imageValidateSizeLabelExpectedMaxResolution: 'Resolusi maksimum adalah {maxResolution}'
});
$('#form').on('submit',function(e) {
		if (pond.status === 3) {
            alert("Tunggu hingga arsip selesai diupload!");
			return false;
		}
		$(this).find(':button[type=submit]').hide();
		return true;
	});

function deleteImage(nameFile){
    $.ajax({
            url: '{{ route("remove") }}',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "DELETE",
            data: {
                file_name: nameFile
            },
            success: function(response) {
                console.log(response);
            },
            error: function(response) {
                console.log('error')
            }
        });
}
</script>

<!-- Modal Alert -->
<div class="modal fade modal-sm" id="DeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-alert modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-close">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
                <h6>Hapus File?</h6>
                <p>Anda yakin akan menghapus file ini?</p>
                <input hidden type="text" id="delete_file_id">
            </div>
            <div class="modal-button d-flex">
                <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                <button type="button" data-bs-dismiss="modal" class="btn btn-danger btn-sm deleteRecord">Hapus</button>
            </div>
        </div>
    </div>
</div>

<!-- Fetch File -->
<script>
$(document).ready(function() {

    fetchfile();
    function fetchfile() {
        var archive_id = $("#archive_id").val(); 
        var unit_id = $("#unit_id").val();
        $.ajax({
            url: "/archive/archive-edit/"+archive_id+"/"+unit_id,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            dataType: "json",
            data: {
                "archive_id": archive_id,
            },
            type: 'POST',
            success: function (response) {
                    console.log("it Works");
                $('.existing-files').html("");
                $.each(response.file, function (key, item) {
                    $('.existing-files').append
                        (
                        `<div class="alert d-flex p-1 rounded-3">
                            <div class="icon-name d-flex">
                                <i class="fa fa-file me-3 align-self-center"></i>
                                <div class="mb-0">${item.file_name}</div>
                            </div>
                            <button type="button" value="${item.id}" class="delete_file">
                                <i class="fa-solid fa-trash action-danger"></i>
                            </button>
                        </div>`
                        // <button type="button" style="margin-left:100px" data-bs-toggle="modal" data-bs-target="#exampleModal${item.id}">
                        // <div class="modal fade modal-sm" id="exampleModal${item.id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        //     <div class="modal-dialog modal-alert modal-dialog-centered">
                        //         <div class="modal-content">
                        //             <div class="modal-close">
                        //                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        //             </div>
                        //             <div class="modal-body">
                        //                 <lottie-player src="https://assets8.lottiefiles.com/packages/lf20_bc4ugzhr.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
                        //                 <h6>Hapus File?</h6>
                        //                 <p>Anda yakin akan menghapus file ${item.id}?</p>
                        //             </div>
                        //             <div class="modal-button d-flex">
                        //                 <button type="button" class="btn btn-outline-dark btn-sm" data-bs-dismiss="modal">Batal</button>
                        //                 <button type="button" data-id="${item.id}" data-bs-dismiss="modal" class="btn btn-danger btn-sm deleteRecord">Hapus</button>
                        //             </div>
                        //         </div>
                        //     </div>
                        // </div>`
                        );
                });
            }
        });
    }

    $(document).on('click', '.delete_file', function(e){
        e.preventDefault();
        var file_id = $(this).val();
        // alert(file_id);
        $('#delete_file_id').val(file_id);
        $('#DeleteModal').modal('show');
    })
    $(".deleteRecord").click(function(){
        var id = $('#delete_file_id').val();
    
        $.ajax(
        {
            url: "/archive/archive-edit/"+id,
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type: 'DELETE',
            data: {
                "id": id,
                "_method": 'DELETE',
            },
            success: function (){
                console.log("it Works");
                fetchfile();
            }
        });
    
    });
});
</script>

<!-- Filter -->
<script>
$(document).on("keyup", ".chip.chip-checkbox, .chip.toggle, .chip.clickable", function(e){
  if(e.which==13 || e.which == 32)
     this.click();
});
$(document).on("click", ".chip button", function(e){
  e.stopPropagation();
});
$(document).on("click", ".chip.chip-checkbox", function(){
  let $this = $(this);
  let $option = $this.find("input");
  if($option.is(":radio")){
    let $others = $("input[name=" + $option.attr("name") + "]").not($option);
    $others.prop("checked", false);
    $others.change();
  }
  $option.prop("checked", !$this.hasClass("active"));
  $option.change();
});
$(document).on("click", ".chip.toggle", function(){
  $(this).toggleClass("active");
});
$(document).on("change", ".chip.chip-checkbox input", function(){
  let $chip = $(this).parent(".chip");
  $chip.toggleClass("active",this.checked);
  $chip.attr("aria-checked", this.checked ? "true" : "false");
});
</script>

@if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
             $('#modal-change-password').modal('show');
        });
    </script>
@endif