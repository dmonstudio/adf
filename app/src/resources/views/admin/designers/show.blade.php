@extends('admin.layout.master')

@section('bct')
{{ Breadcrumbs::render('admin.designers.show', $designer) }}
@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="ibox ">
            <div class="ibox-title">
                <h5>{{ $designer->name }}</h5>
            </div>
            <div>
                <div class="ibox-content profile-content">
                    <div>
                        @each('admin.designers.partials.title', $designer->titles, 'title')
                    </div>
                    <hr>
                    <div>
                        @each('admin.designers.partials.achievement', $designer->achievements, 'achievement')
                    </div>
                    <hr>
                    <p>
                        {!! $designer->body !!}
                    </p>
                    <div class="row m-t-lg text-center">
                        <div class="col-md-4">
                            <div>
                                <i class="fa fa-fw fa-dot-circle-o fa-lg text-info"></i>
                            </div>
                            <h5 ><strong>头衔</strong> {{ $designer->titles_count }}</h5>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <i class="fa fa-fw fa-trophy fa-lg text-info"></i>
                            </div>
                            <h5 ><strong>荣誉</strong> {{ $designer->achievements_count }}</h5>
                        </div>
                        <div class="col-md-4">
                            <div>
                                <i class="fa fa-fw fa-line-chart fa-lg text-info"></i>
                            </div>
                            <h5>访问量 1530</h5>
                        </div>
                    </div>
                </div>
                <div class="ibox-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <a href={{ route('admin.designers.edit', compact('designer')) }} class="btn btn-primary btn-outline btn-sm btn-block">
                                <i class="fa fa-pencil"></i> 
                                编辑
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href={{ route('admin.designers.preview', compact('designer')) }} class="btn btn-info btn-outline btn-sm btn-block">
                                <i class="fa fa-eye"></i>
                                预览
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-title">
                <h5>图片</h5>
            </div>
            <div class="ibox-content no-padding border-left-right">
                <img alt="image" class="img-fluid" src={{ $designer->main_image }}>
            </div>
        </div>
    </div>
    
    <div class="col-md-8">
        <div class="ibox">
            <div class="ibox-title">
                <h5>访问数据</h5>
            </div>
            <div class="ibox-content">
                <canvas id="visits-chart" height="140"></canvas>
            </div>
        </div>
        <div class="ibox">
            <div class="ibox-title">
                <h5>最近访问记录</h5>
                <div class="ibox-content">
                    这那
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.bootcss.com/Chart.js/2.7.2/Chart.min.js"></script>
<script>
$(function () {

var lineData = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [

        {
            label: "Data 1",
            backgroundColor: 'rgba(26,179,148,0.5)',
            borderColor: "rgba(26,179,148,0.7)",
            pointBackgroundColor: "rgba(26,179,148,1)",
            pointBorderColor: "#fff",
            data: [28, 48, 40, 19, 86, 27, 90]
        },{
            label: "Data 2",
            backgroundColor: 'rgba(220, 220, 220, 0.5)',
            pointBorderColor: "#fff",
            data: [65, 59, 80, 81, 56, 55, 40]
        }
    ]
};

var lineOptions = {
    responsive: true
};


var ctx = document.getElementById("visits-chart").getContext("2d");
new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});
});
</script>
@endpush
