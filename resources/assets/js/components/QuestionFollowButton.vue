<template>
    <button
            class="btn btn-defaul"
            v-text="text"
    ></button>
</template>

<script>
    export default {
        prups:['question','user'],
        mounted() {
            this.$http.post('/api/question/follower',{'question':this.question,'user':this.user}).then(response =>{
                console.log(response.data);
            })
        },
        data(){
            return{
                followed:false
            }
        },
        computed:{
            text(){
                return this.followed ? '已关注': '关注问题'
            }
        }
    }
</script>
