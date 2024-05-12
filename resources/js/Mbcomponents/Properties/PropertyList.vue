<template>
  <div class="container-fluid mt-5">
    <div class="card rounded-top-1 rounded-bottom-0 p-2 mb-2 d-flex">
      <div class="col-12 d-flex justify-content-between">
        <div class="">
          <h3>Property List</h3>
        </div>
        <div>
          <a
            class="btn btn-outline-success border-2"
            @click="router.push({ name: 'addProprty' })"
            >Add Property</a
          >
        </div>
      </div>
    </div>
    <table>
      <tr class="">
        <th>ID</th>
        <th>Company</th>
        <th>Battery Health</th>
        <th>Model</th>
        <th>Pexel</th>
        <th>Finger</th>
        <th>Face</th>
        <th>PowerType</th>
        <th>Memory</th>
        <th>cameraQuantity</th>
        <th>Ram</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
      <tbody>
        <tr v-for="phone in phones" :key="phone.id">
          <td>{{ phone.id }}</td>
          <td>{{ phone.company_id }}</td>
          <td>{{ phone.battery_level }}</td>
          <td>{{ phone.model }}</td>
          <td>{{ phone.cam_pexel }}</td>
          <td>{{ phone.fingerprint }}</td>
          <td>{{ phone.face }}</td>
          <td>{{ phone.power_type }}</td>
          <td>{{ phone.memory }}</td>
          <td>{{ phone.camera_n }}</td>
          <td>{{ phone.ram }}</td>
          <td>{{ phone.status }}</td>
          <td>
            <i class="fa fa-edit text-success px-2 pointer" @click="router.push({name:'edit-phone', params:{id:phone.id}})"></i>
            <i
              class="fa fa-times text-danger"
              @click="handleDelete(phone.id)"
            ></i>
            <i class="fa ps-2 fa-eye text-dark"></i>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import { useRouter } from "vue-router";
import Swal from "sweetalert2";

const router = useRouter();

const phones = ref(null);

onMounted(() => {
  axios
    .get("/api/allphone")
    .then((res) => {
      console.log(res.data.data);
      phones.value = res.data.data;
    })
    .catch((err) => {
      console.log(err);
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
        axios.delete(`/api/phone/${id}/delete`).then((res)=>{
          if(res.status == 200){
            console.log(res)
            Swal.fire({
             position: "top-end",
             icon: "success",
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

<style scoped></style>