<template>

</template>

<script>
import axios from 'axios'
    export default {
      data(){
        return{
          isShow : Number,
          config: {
                headers: { Authorization: `Bearer ${localStorage.getItem('token-admin')}` }
            }
        }
      },
        props:{
            labels:{
                required: true,
            },
            data:{
                required: true,
            }
        },
        methods:{
          async destroy(value){
            await axios.delete(`http://127.0.0.1:8001/api/category/${value}`, this.config);
          },
          async update(payload){
            (payload.status == 1) ? this.isShow = 0 : this.isShow = 1;
            await axios.put(`http://127.0.0.1:8001/api/category/${payload.id}/update`,{status:this.isShow}, this.config);
          }
        }
    }
</script>

<style lang="scss" scoped>

</style>
