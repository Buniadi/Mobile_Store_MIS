<template>


  <div class="wrapper ">
    <div class="sidebar">
      <h2>Sidebar</h2>
      <ul>
        <li>
            <a href="#"><i class="fas fa-user"></i>Profile</a>
        </li>
        <li>
            <router-link :to="{name:'users-list'}">Users</router-link>
        </li>
        <li>
            <RouterLink :to="{ name: 'propertyList' }">Property List</RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'home' }">Home</RouterLink>
        </li>
        <li>
            <RouterLink :to="{ name: 'login' }">Login</RouterLink>
        </li>
        <li>
          <RouterLink :to="{ name: 'companiesList' }">Companies</RouterLink>
        </li>
        <li>
          <a href="#"><i class="fas fa-address-book"></i>Contact</a>
        </li>
        <li>
          <a href="#" @click="logout"><i class="fas fa-map-pin"></i>Logout</a>
        </li>
      </ul>
      <div class="social_media">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
    </div>

  </div>
</template>

<script setup>
import { useRouter } from "vue-router";


const router  = useRouter();

const logout = ()=>{
  window.user = null ;
  router.push('/login');
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Josefin Sans', sans-serif;
}

body{
   background-color: #f3f5f9;
}

.wrapper{
  display: flex;
  position: relative;
  height: 100vh;
  width: fit-content;
}

.wrapper .sidebar{
  width: 200px;
  height: 100%;
  background: #4b4276;
  padding: 30px 0px;
  position: sticky;
}

.wrapper .sidebar h2{
  color: #fff;
  text-transform: uppercase;
  text-align: center;
  margin-bottom: 30px;
}

.wrapper .sidebar ul li{
  padding: 15px;
  border-bottom: 1px solid #bdb8d7;
  border-bottom: 1px solid rgba(0,0,0,0.05);
  border-top: 1px solid rgba(255,255,255,0.05);
}    

.wrapper .sidebar ul li a{
  color: #bdb8d7;
  display: block;
}

.wrapper .sidebar ul li a .fas{
  width: 25px;
}

.wrapper .sidebar ul li:hover{
  background-color: #594f8d;
}
    
.wrapper .sidebar ul li:hover a{
  color: #fff;
}
 
.wrapper .sidebar .social_media{
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translateX(-50%);
  display: flex;
}

.wrapper .sidebar .social_media a{
  display: block;
  width: 40px;
  background: #594f8d;
  height: 40px;
  line-height: 45px;
  text-align: center;
  margin: 0 5px;
  color: #bdb8d7;
  border-top-left-radius: 5px;
  border-top-right-radius: 5px;
}

.wrapper .main_content{
  width: 100%;
  margin-left: 200px;
}

.wrapper .main_content .header{
  padding: 20px;
  background: #fff;
  color: #717171;
  border-bottom: 1px solid #e0e4e8;
}

.wrapper .main_content .info{
  margin: 20px;
  color: #717171;
  line-height: 25px;
}

.wrapper .main_content .info div{
  margin-bottom: 20px;
}

@media (max-height: 500px){
  .social_media{
    display: none !important;
  }
}


</style>