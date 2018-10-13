<div class="contact-box center-version raisable{{ $designer->published ? '' : ' unpublished' }}">
    <a href={{ route('admin.designers.show', compact('designer')) }}>
        <img alt="image" class="rounded-circle m-t-xs img-fluid" src={{ $designer->main_image }}>
        <h3 class="m-b-xs">
            <i class="fa fa-fw fa-circle status-dot text-{{ $designer->published ? 'success' : 'warning' }}"></i>
            <strong>{{ $designer->name }}</strong>
        </h3>
        <div class="font-bold ellipsis">{{ $designer->main_title }}</div>
        <div class="m-t-md text-center">
            <i class="fa fa-fw fa-dot-circle-o text-info"></i>
            {{ $designer->titles_count }} 个头衔
            <span class="mx-4"> </span>
            <i class="fa fa-fw fa-trophy text-info"></i>
            {{ $designer->achievements_count }} 个成就
        </div>
    </a>
    <div class="contact-box-footer">
        <div class="m-t-xs btn-group">
            <a href={{ route('admin.designers.edit', compact('designer')) }} class="btn btn-xs btn-white"><i class="fa fa-pencil"></i> 编辑</a>
            <a href="" class="btn btn-xs btn-white"><i class="fa fa-envelope"></i> 预览</a>
            <a href="" class="btn btn-xs btn-white"><i class="fa fa-user-plus"></i> 发布</a>
        </div>
    </div>

</div>
