

<template>

</template>



<script type="text/javascript">
import  AppStorage  from "../../Helpers/AppStorage";	
export default {
   created(){
    localStorage.removeItem('token')
    localStorage.removeItem('user')
    localStorage.clear();
   // AppStorage.clear();
    Toast.fire({
          icon: 'success',
          title: 'Đã đăng xuất!'
        })
    this.$router.push({ name: '/'})

   }
 

}




</script>


<style type="text/css">
	
</style>