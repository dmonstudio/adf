@extends('layout.master')

@section('content')
<section class="st" id="projects">
    <div class="section-title-bg pingFang-thin">作品 | PROJECTS</div>
    <div class="projects-filter"><label class="pingFang"><input type="radio" name="all" value="0" checked>全部 All</label><label
            class="pingFang-thin"><input type="radio" name="all" value="0">办公空间 Workspace</label><label class="pingFang-thin"><input
                type="radio" name="all" value="0">餐饮娱乐 Dinning & ntertainment</label><label class="pingFang-thin"><input
                type="radio" name="all" value="0">地产 Real Estate</label></div>
    <div class="projects-wrapper" data-grid>
        @foreach($showcases as $showcase)
        <div class="project" data-category="{{ $showcase->category }}">
            <img src={{ $showcase->main_image }}>
            <a class="project-mask" href="project01.html">
                <div class="project-text">
                    <p class="pingFang">{{ $showcase->name }}</p>
                    <p class="pingFang-thin">{{ $showcase->name_en }}</p>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
@endsection

@push('js')
<script src="https://cdn.bootcss.com/bricks.js/1.8.0/bricks.min.js"></script>
<script>
var bricks = Bricks({
    container: '[data-grid]',
    packed: 'data-packed',
    sizes: [
        { columns: 2, gutter: 15 },           
        { mq: '1200px', columns: 3, gutter: 15 },
    ]
});

$(document).ready(function () {
    $('input[type="radio"]').on('change', function(e) {
        var $label = $(e.target).parent('label');

        if (!$label.hasClass('pingFang')) {
            $label.toggleClass('pingFang-thin pingFang')
        }
        $label.siblings('.pingFang').toggleClass('pingFang-thin pingFang')
    });

    bricks.pack();
});
</script>
@endpush
