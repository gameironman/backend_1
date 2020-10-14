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


    </ol>

    <a href="/admin/new/create" class="btn btn-success">新增資料</a>
  </nav>

  <table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>title</th>
            <th>sub_title</th>
            <th>img_url</th>
            <th>content</th>
            <th>create_at</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($productv2 as $productv1)
        <tr>
            <td>{{$productv1->name}}</td>
            <td>{{$productv1->type}}</td>
            <td><img src="{{$productv1->image_url}} "  alt="" width="100px" ></td>
            <td>{{$productv1->text}}</td>
            <td>{{$productv1->create_at}}</td>
            <td>
            <a href="/admin/new/edit/{{$productv1->id}}" class="btn btn-success">編輯</a>
                <a href="/admin/new/destroy/{{$productv1->id}}" class="btn btn-danger">刪除</a>
            </td>
        </tr>
        @endforeach


</table>
</div>


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
