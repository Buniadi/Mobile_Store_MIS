<template>
        <div class="container-fluid mt-5">
          <div class="card rounded-top-1 rounded-bottom-0 p-2 mb-2 d-flex ">
            <div class="col-12 d-flex justify-content-between">
              <div class="">
                <h3>Property List</h3>
              </div>
              <div>
                <a  class="btn btn-outline-success  border-2" @click="router.push({name:'addProprty'})">Add Property</a>
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
            
            </tbody>
          </table>
        </div>

</template>

<script setup>
import { useRouter } from 'vue-router';


const router = useRouter();
</script>

<style scoped></style>