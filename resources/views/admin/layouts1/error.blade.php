@extends('admin.layouts.app')

@section('title', '错误提示')

@section('content')
<div class="pd-20">
  <?= Session::get('error')?>
</div>
@endsection



