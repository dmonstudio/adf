<div class="table-responsive">
    <table class="table table-bordered table-stripped">
        <thead>
            <tr>
                <th>
                    图片预览
                </th>
                <th>
                    图片链接
                </th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($designer->images as $image)
            <tr>
                <td>
                    <img src={{ $image }}>
                </td>
                <td>
                    <input type="text" class="form-control" disabled value={{ $image }}>
                </td>
                <td>
                    <button class="btn btn-white">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
