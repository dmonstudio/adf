@extends('admin.layout.master')

@php
$new = !isset($designer);
$action = $new ? route('admin.designers.store') : route('admin.designers.update', compact('designer'));
$method = $new ? 'post' : 'put';
@endphp

@section('bct')
    @if ($new)
    {{ Breadcrumbs::render('admin.designers.create') }}
    @else
    {{ Breadcrumbs::render('admin.designers.edit', $designer) }}
    @endif
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="tabs-container">
            <ul class="nav nav-tabs">
                @if(!$new)
                <li>
                    <a class="nav-link active" data-toggle="tab" href="#tab-1">基本信息</a>
                </li>
                <li>
                    <a class="nav-link" data-toggle="tab" href="#tab-2">图片</a>
                </li>
                <li>
                    <a class="nav-link" data-toggle="tab" href="#tab-3">设置</a>
                </li>
                @endif
            </ul>
            <div class="tab-content">
                @if(!$new)
                <div id="tab-1" class="tab-pane active">
                    <div class="panel-body">
                        @include('admin.designers.form.basic')
                    </div>
                </div>
                <div id="tab-2" class="tab-pane">
                    <div class="panel-body">
                        @include('admin.designers.form.images')
                    </div>
                </div>
                <div id="tab-3" class="tab-pane">
                    <div class="panel-body">
                        @include('admin.designers.form.settings')
                    </div>
                </div>
                @else
                <div class="tab-pane active">
                    <div class="panel-body">
                        @include('admin.designers.form.basic')
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<link href="https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.css" rel="stylesheet">
@endpush

@push('js')
<script src="https://cdn.bootcss.com/simplemde/1.11.2/simplemde.min.js"></script>
<script>
    $(document).ready(function(){
        var simplemde = new SimpleMDE({ element: $("#markdown")[0] });
    });

    var designer = new Vue({
        el: "#designer-form",
        data: {
            titles: {!! json_encode($new ? [""] : $designer->titles) !!},
            achievements: {!! json_encode($new ? [""] : $designer->achievements) !!}
        },
        methods: {
            removeTitle: function(i) {
                this.titles.length === 1 
                    ? this.titles = [""]
                    : this.titles.splice(i, 1);
            },
            addTitle: function() {
                this.titles.push("");
            },
            removeAchievement: function(i) {
                this.achievements.length === 1 
                    ? this.achievements = [""]
                    : this.achievements.splice(i, 1);
            },
            addAchievement: function() {
                this.achievements.push("");
            },
        }
    })

    @if(!$new)
    var designer = new Vue({
        el: "#designer-delete",
        data: {
            confirm: "",
            expected: "{{ $designer->name }}"
        }
    })
    @endif
</script>
@endpush
