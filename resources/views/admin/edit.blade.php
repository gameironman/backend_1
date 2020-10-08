@extends('layouts.app')


@section('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">


@endsection


@section('content')
<div class="container">
<nav aria-label="breadcrumb">

    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">後臺</a></li>
      <li class="breadcrumb-item"><a href="#">最新消息</a></li>
      <li class="breadcrumb-item active" aria-current="page">編輯</li>


    </ol>


  </nav>

  <form method="POST" action="/admin/new/store" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">title</label>
        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" name="title">

    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">sub_title</label>
        <input type="text" class="form-control" id="sub_title" aria-describedby="emailHelp" name="sub_title">

    </div>

      <div class="form-group">
        <label for="img_url">上傳照片</label>
        <input type="file" class="form-control-file" id="img_url" name="img_url">
      </div>
      <div class="form-group">
        <label for="content">content</label>
        <input type="text" class="form-control" id="content" aria-describedby="title" name="content">
      </div>
    <img src="{{$list->img_url}}" alt="">

    <button type="submit" class="btn btn-primary">送出審查</button>
</form>


@endsection


@section('js')

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


@endsection
