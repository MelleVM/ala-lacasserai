{{-- admin/documentation.blade.php --}}

{{-- gebruikt 'admin' layout --}}
@extends('layouts.admin')

{{-- content sectie --}}
@section('content')

<div class="container-admin">
    <div class="table-wrapper">
<h2 class="text-center pb-2">DOCUMENTATION ALA</h2>


<div class="row">
  <div class="col-sm-6">
    <div class="card-docu">
      <div class="card-body">
        <h5 class="card-title">Functioneel ontwerp</h5>
        <p class="card-text">Klik de knop hieronder om het Functioneel ontwerp te downloaden.</p>
        <a href="/storage/documentation/functioneel_ontwerp.docx" class="btn btn-primary" download><i class="fas fa-file-download"></i>&nbsp;&nbsp;Download</a>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card-docu">
      <div class="card-body">
        <h5 class="card-title">Technisch ontwerp</h5>
        <p class="card-text">Klik de knop hieronder om het Technisch ontwerp te downloaden.</p>
        <a href="/storage/documentation/technisch_ontwerp.docx" class="btn btn-primary"><i class="fas fa-file-download"></i>&nbsp;&nbsp;Download</a>
      </div>
    </div>
  </div>
  

</div>

<div class="row mt-4">
    <div class="col-sm-6">
    <div class="card-docu">
      <div class="card-body">
        <h5 class="card-title">Testrapport</h5>
        <p class="card-text">Klik de knop hieronder om het Testplan te downloaden.</p>
        <a href="/storage/documentation/testrapport.docx" class="btn btn-primary"><i class="fas fa-file-download"></i>&nbsp;&nbsp;Download</a>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection