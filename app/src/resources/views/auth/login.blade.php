<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ mix('css/admin.css') }}">
    </head>
    <body>
        <div id="login">
            <el-dialog
                title="后台登录"
                :visible="true"
                width="400px"
                center
                :show-close="false"
            >
                <el-form :model="login" action="/login" method="POST">
                    <el-form-item>
                        <el-input placeholder="用户名" v-model="login.username" name="username"/>
                    </el-form-item>
                    <el-form-item>
                        <el-input placeholder="密码" type="password" name="password" v-model="login.password"/>
                    </el-form-item>
                    @csrf
                    <div class="text-center">
                        <el-button type="primary" native-type="submit">登录</el-button>
                    </div>
                </el-form>
            </el-dialog>
        </div>
        <script src="{{ mix('js/manifest.js') }}"></script>
        <script src="{{ mix('js/vendor.js') }}"></script>
        <script src="{{ mix('js/login.js') }}"></script>
    </body>
</html>
