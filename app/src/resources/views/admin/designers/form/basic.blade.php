<form action={{ $action }} method="POST" id="designer-form">
    {{ method_field($method) }}
    {{ csrf_field() }}
    <fieldset>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">名字</label>
            <div class="col-sm-10">
                <input name="name" type="text" class="form-control" value="{{ $new ? null : $designer->name }}" autocomplete="off">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">链接</label>
            <div class="col-sm-10">
                <div class="input-group input-group-sm">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">{{ route('admin.designers.show', ['designer' => '']) . '/' }}</span>
                    </div>
                    <input name="slug" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" value="{{ $new ? null : $designer->slug }}"
                        autocomplete="off">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">头衔</label>
            <div class="col-sm-10">
                <template v-for="(title,i) in titles">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">
                                <i class="fa fa-dot-circle-o"></i>
                            </span>
                        </div>
                        <input name="titles[]" type="text" class="form-control" v-model="titles[i]" autocomplete="off">
                        <div class="input-group-append">
                            <span class="input-group-addon hover" @click="removeTitle(i)">
                                <i class="fa fa-times text-danger"></i>
                            </span>
                        </div>
                    </div>
                </template>
                <button class="btn btn-success btn-sm btn-outline px-4" type="button" @click="addTitle">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">成就</label>
            <div class="col-sm-10">
                <template v-for="(achievement,i) in achievements">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-addon">
                                <i class="fa fa-trophy"></i>
                            </span>
                        </div>
                        <input name="achievements[]" type="text" class="form-control" v-model="achievements[i]" autocomplete="off">
                        <div class="input-group-append">
                            <span class="input-group-addon hover" @click="removeAchievement(i)">
                                <i class="fa fa-times text-danger"></i>
                            </span>
                        </div>
                    </div>
                </template>
                <button class="btn btn-success btn-sm btn-outline px-4" type="button" @click="addAchievement">
                    <i class="fa fa-plus"></i>
                </button>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">介绍</label>
            <div class="col-sm-10">
                <textarea name="body" id="markdown">{!! $new ? null : $designer->body !!}</textarea>
            </div>
        </div>
    </fieldset>
    <div class="row">
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary">提交</button>
            <a href={{ route( 'admin.designers.index') }} class="btn btn-default">取消</a>
        </div>
    </div>
</form>
