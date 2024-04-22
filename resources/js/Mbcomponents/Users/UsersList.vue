<template>
  <div class="container-fluid mt-5">
    <div class="card rounded-top-1 rounded-bottom-0 p-2 mb-2 d-flex ">
      <div class="col-12 d-flex justify-content-between">
        <div class="">
          <h3>Users List</h3>
        </div>
        <div>
          <a  class="btn btn-outline-success  border-2" @click="router.push({name:'add-user'})">AddUser</a>
        </div>
      </div>

    </div>
    <table>
      <tr class="">
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <!-- <th>Address</th> -->
        <!-- <th>Created_by</th> -->
        <th>Created_at</th>
        <th>Action</th>
      </tr>
      <tbody>

        <tr v-for="user_info  in data  " :key="user_info.id">
          <td>{{user_info.id}}</td>
          <td>{{user_info.name}}</td>
          <td>{{user_info.email}}</td>
          <td>{{user_info.created_at}}</td>
          <td><i class="fa fa-edit text-success px-2"> </i> <i class="fa fa-times text-danger"></i> <i class="fa ps-2 fa-eye text-dark"></i></td>
        </tr>
      
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import router from '../../router';
import axios from 'axios';


const data = ref();
onMounted(()=>{
  axios.interceptors.request.use(config => {
  // Retrieve the token from where you stored it (e.g., Vuex store or localStorage)
  const token = localStorage.getItem('token'); // Make sure to replace 'token' with your actual token key
  
  // If a token exists, add it to the request headers
  if (token) {
    config.headers.Authorization = `Bearer ${token}`;
  }
  
  return config;
});
  axios.get('/api/user-list').then((res)=>{
    if (res.status == 200){
      data.value = res.data.data;
      console.log(data.value);
    } 
  }).catch((err)=>{
    console.log(err)
  })
})


</script>

<style scoped>
/* Style for the table */
table {
  border-collapse: collapse;
  width: 100%;
}

/* Style for table headings */
th {
  background-color: #f2f2f2;
  border: 1px solid #ddd;
  padding: 8px;
  text-align: left;
}

/* Style for table cells */
td {
  border: 1px solid #ddd;
  padding: 8px;
}

/* Alternate row color */
tr:nth-child(even) {
  background-color: #f9f9f9;
}
</style>
