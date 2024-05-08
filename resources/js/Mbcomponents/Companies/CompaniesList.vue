<template>
  <div class="container-fluid mt-5">
    <div class="card rounded-top-1 rounded-bottom-0 p-2 mb-2 d-flex">
      <div class="col-12 d-flex justify-content-between">
        <div class="">
          <h3>Companies List</h3>
        </div>
        <div>
          <a
            class="btn btn-outline-success border-2"
            @click="router.push({ name: 'add-companies' })"
            >Add Company</a
          >
        </div>
      </div>
      <table class="mt-4">
        <tr class="">
          <th>ID</th>
          <th>Name</th>
          <th>Country</th>
          <th>Created_at</th>
          <th>Action</th>
        </tr>
        <tbody>
          <tr v-for="com_info in companies_info" :key="com_info.id">
            <td>{{ com_info.id }}</td>
            <td>{{ com_info.name }}</td>
            <td>{{ com_info.country }}</td>
            <td>{{ com_info.created_at }}</td>
            <td>
              <i class="fa fa-edit text-success px-2 pointer" @click="router.push({name:'edit-company', params:{id:com_info.id}})"></i>

              <i class="fa fa-times text-danger" @click="handleDelete(com_info.id)"></i>
              <i class="fa ps-2 fa-eye text-dark"></i>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script setup>
import axios from "axios";
import router from "../../router";
import { onMounted, ref } from "vue";
import { RouterLink } from "vue-router";
import Swal from "sweetalert2";

const companies_info = ref(null);

onMounted(() => {
  axios.get("/api/companies").then((res) => {
    companies_info.value = res.data.data;
  });
});

const handleDelete = (id) =>{
  Swal.fire({
      title: 'Are you sure?',
      text: 'You are about to delete this company.',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
    }).then((result) => {
      if (result.isConfirmed) {
        // Delete the company
        axios.delete('/api/comapanies/delete/'+id).then((res)=>{
          if(res.status == 200){
            console.log(res)
            Swal.fire({
             position: "top-end",
             icon: "error",
             title: "res.message",
             showConfirmButton: false,
             timer: 1500,
           });
          }
        })
      }
    });
}
</script>