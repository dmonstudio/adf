<template>
    <el-menu
      default-active="1"
      class="el-menu-vertical-demo"
      background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b"
      router
      id="side_nav"
    >
        <h1>ADF</h1>
        <el-menu-item index="/">
            <i class="el-icon-menu"></i>
            <span>控制台</span>
        </el-menu-item>
        <el-menu-item index="/designers">
            <i class="el-icon-menu"></i>
            <span>设计师</span>
        </el-menu-item>
        <el-menu-item index="/showcases">
            <i class="el-icon-document"></i>
            <span>项目</span>
        </el-menu-item>
        <el-menu-item index="/press">
            <i class="el-icon-setting"></i>
            <span>动态</span>
        </el-menu-item>
        <el-menu-item index="/">
            <i class="el-icon-menu"></i>
            <span>页面</span>
        </el-menu-item>
        <el-menu-item index="/stats">
            <i class="el-icon-menu"></i>
            <span>统计</span>
        </el-menu-item>
    </el-menu>
</template>
