<template>
    <van-tabbar v-model="TBactive">
        <van-tabbar-item name="1" url="/Mobile/AppList" icon="home-o">需求申请</van-tabbar-item>
        <van-tabbar-item name="2" url="/QpSys/Airplane/showMBACQry" icon="search">飞机查询</van-tabbar-item>
        <van-tabbar-item name="3" url="/Mobile/AppList" icon="friends-o">出机计划</van-tabbar-item>
        <van-tabbar-item name="4" url="/Mobile/AppList" icon="setting-o">个人中心</van-tabbar-item>
    </van-tabbar>
</template>

<script>
    export default {
        props:["act"],
        name: "mbnavbar",
        data() {
            return {
                TBactive: 0,
            };
        },
        methods: {},
        //通过路由跳转判断选中的样式
        created() {
            this.TBactive = this.act;
        }
    };
</script>

<style>
</style>
