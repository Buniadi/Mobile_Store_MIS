<script setup>
import Navbar from "./components/Navbar.vue";
import SideNavbar from "./Mbcomponents/Owntemplates/SideNavbar.vue";
</script>
<template>
  <div id="main" class="d-flex p-0 m-0">
    <!-- <Navbar /> -->
    <SideNavbar  class="col-2"/>

     
     <RouterView />
     

  </div>
</template>
<style scoped>
#main{
  max-width: 100%;
}



</style>