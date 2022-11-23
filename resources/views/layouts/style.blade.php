<!-- CSS Custom -->
<link rel="stylesheet" href="{{ asset('Style/custom.css') }}">
<!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('Library/Bootstrap/css/bootstrap.min.css') }}">
<!-- Fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- Datatables -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.2/css/bootstrap.css" />
<link rel="stylesheet" href="{{ asset('Library/DataTables/css/dataTables.bootstrap5.min.css') }}">
<!-- Select2 -->
<link href="{{ asset('Library/Select2/select2.min.css') }}" rel="stylesheet" />

<link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
<!-- Filepond -->
<link rel="stylesheet" href="{{ asset('Library/Filepond/filepond.css') }}">
<link rel="stylesheet" href="{{ asset('Library/Filepond/filepond.min.css') }}">
<style>
    .filepond--panel-root{
        background-color: white;
        border: dashed #CAD6D9;
    }
    .filepond--root {
    max-height: 350px;
    }
    [data-filepond-item-state='processing-complete'] .filepond--item-panel {
    background-color: #1c5b68;
    }
    .filepond--credits {
        display:none;
    }
</style>