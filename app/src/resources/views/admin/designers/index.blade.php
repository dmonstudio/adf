@extends('admin.layout.master')

@section('bct')
{{ Breadcrumbs::render('admin.designers.index') }}
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <a href={{ route('admin.designers.create') }} class="btn btn-primary">
            <i class="fa fa-plus"></i>
            添加设计师
        </a>
    </div>
</div>
<hr>
<div class="row">
    @foreach($designers as $designer)
    <div class="col-lg-4">
        @include('admin.designers.card', $designer)
    </div>
    @endforeach
</div>
@endsection
