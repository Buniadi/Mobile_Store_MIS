<template>
    <div class="container-fluid mt-5">
        <div class="card rounded-top-1 rounded-bottom-0 p-2 mb-2 d-flex ">
          <div class="col-12 d-flex justify-content-between">
            <div class="">
              <h3>Companies List</h3>
            </div>
    
        </div>
        <table>
          <tr class="">
            <th>ID</th>
            <th>Name</th>
            <th>Country</th>
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
      </div>
</template>
<script setup>
import axios from 'axios';
import { onMounted, ref } from 'vue';

const companies_info = ref(null);


onMounted(()=>{
    axios.get('/api/companies')
        .then(
            (res)=>
            {
                companies_info.value = res.data.data
            
            });
})




</script>