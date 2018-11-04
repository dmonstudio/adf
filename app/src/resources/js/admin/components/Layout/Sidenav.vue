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
        <el-submenu index="/pages/">
            <template slot="title">
                <i class="el-icon-tickets"></i>
                <span slot="title">页面管理</span>
            </template>
            <el-menu-item index="/pages/home/edit">首页</el-menu-item>
            <el-menu-item index="/pages/about/edit">公司介绍</el-menu-item>
            <el-menu-item index="/pages/showcases/edit">作品展示</el-menu-item>
            <el-menu-item index="/pages/stories/edit">动态</el-menu-item>
            <el-menu-item index="/pages/contact/edit">联系我们</el-menu-item>
            <el-menu-item index="/pages/career/edit">招聘</el-menu-item>
        </el-submenu>
        <el-menu-item index="/designers">
            <i class="el-icon-service"></i>
            <span>设计师</span>
        </el-menu-item>
        <el-menu-item index="/showcases">
            <i class="el-icon-star-off"></i>
            <span>项目展示</span>
        </el-menu-item>
        <el-menu-item index="/stories">
            <i class="el-icon-news"></i>
            <span>新闻动态</span>
        </el-menu-item>
    </el-menu>
</template>
