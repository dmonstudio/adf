<?php

Breadcrumbs::for('admin.home', function ($trail) {
    $trail->push('后台', route('admin.home'));
});

Breadcrumbs::for('admin.designers.index', function ($trail) {
    $trail->parent('admin.home');
    $trail->push('设计师', route('admin.designers.index'));
});

Breadcrumbs::for('admin.designers.show', function ($trail, $designer) {
    $trail->parent('admin.designers.index');
    $trail->push('设计师详情', route('admin.designers.show', $designer));
});

Breadcrumbs::for('admin.designers.create', function ($trail) {
    $trail->parent('admin.designers.index');
    $trail->push('新建设计师', route('admin.designers.create'));
});

Breadcrumbs::for('admin.designers.edit', function ($trail, $designer) {
    $trail->parent('admin.designers.index');
    $trail->push('编辑设计师', route('admin.designers.edit', compact('designer')));
});
