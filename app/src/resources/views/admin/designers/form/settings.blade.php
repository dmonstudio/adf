<fieldset>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">发布状态</label>
        <div class="col-sm-10">
            @if($designer->published)
            <form action={{ route('admin.designers.unpublish', compact('designer')) }} method="POST" class="form-inline">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-warning btn-block">撤回</button>
            </form>
            @else
            <form action={{ route('admin.designers.publish', compact('designer')) }} method="POST" class="form-inline">
                {{ csrf_field() }}
                <button class="btn btn-success btn-block">发布</button>
            </form>
            @endif
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">雷区</label>
        <div class="col-sm-10">
            <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#designer-delete">删除</button>
        </div>
    </div>
</fieldset>

<div class="modal inmodal fade" id="designer-delete" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h5 class="modal-title">
                    <i class="fa fa-exclamation-triangle fa-fw"></i>
                    删除设计师
                </h5>
            </div>
            <div class="modal-body">
                <p>
                    删除后所有相关数据将无法恢复
                </p>
                <p>
                    确认删除，请输入设计师名字 <span class="text-danger">{{ $designer->name }}</span>
                    <input type="text" class="form-control mt-2" v-model="confirm">
                    <form action={{ route('admin.designers.destroy', compact('designer')) }} method="POST" class="form-inline">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button type="submit" class="btn btn-danger btn-block" :disabled="confirm !== expected">删除</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>
