<template>
  <div class="container-fluid">
    <div
      class="card rounded-top-1 rounded-bottom-0 p-2 my-2 bg-success text-light shadow col-12"
    >
      <h3>Add User</h3>
    </div>
    <div class="col-12 p-2">
      <form class="d-flex gap-3 justify-content-between">
        <div class="d-flex flex-column justify-content-between gap-2 col-4">
          <div class="form-group col-10">
            <label for="exampleInputName" class="form-label mt-4">Name</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputName"
              aria-describedby="nameHelp"
              placeholder="Enter Name"
              v-model="formdata.name"
            />
          </div>
          <div class="form-group col-10">
            <label for="exampleInputEmail1" class="form-label mt-4"
              >Email</label
            >
            <input
              type="email"
              class="form-control"
              id="exampleInputEmail1"
              aria-describedby="emailHelp"
              placeholder="Enter email"
              autocomplete="off"
              v-model="formdata.email"
            />
          </div>

          <div class="form-group col-10">
            <label for="exampleInputPassword1" class="form-label mt-4"
              >Password</label
            >
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Password"
              autocomplete="off"
              v-model="formdata.password"
            />
          </div>
          <div class="form-group col-10">
            <label for="exampleInputPassword1" class="form-label mt-4"
              >Password Confirmation</label
            >
            <input
              type="password"
              class="form-control"
              id="exampleInputPassword1"
              placeholder="Password"
              autocomplete="off"
              v-model="formdata.confirmPassword"
            />
          </div>
        </div>

        <div
          class="d-flex flex-column justify-content-around col-6 "
        >

        <div class="form-group col-9">
          <label for="exampleInputPhone1" class="form-label mt-4"
            >Phone</label
          >
          <input
            type="Phone"
            class="form-control"
            id="exampleInputPhone1"
            aria-describedby="phoneHelp"
            placeholder="Enter Phone Number"
            autocomplete="off"
            v-model="formdata.phone"
          />
        </div>
        <div class="form-group col-9 bd-danger">
          <label for="exampleInputAddress1" class="form-label mt-4"
            >Address</label
          >
          <input
            type="text"
            class="form-control"
            id="exampleInputAddress1"
            aria-describedby="AddressHelp"
            placeholder="Enter Address Number"
            autocomplete="off"
            v-model="formdata.address"
          />
        </div>

        <div class="form-group col-9">
          <label for="exampleInputPosition1" class="form-label mt-4"
            >position</label
          >
          <input
            type="text"
            class="form-control"
            id="exampleInputPosition1"
            aria-describedby="PositionHelp"
            placeholder="Enter Position Number"
            autocomplete="off"
            v-model="formdata.position"
          />
        </div>

        <div class="form-group col-9" >
          <label for="exampleInputPhoto1" class="form-label mt-4"
            >Photo</label
          >
          <input
            type="file"
            class="form-control"
            id="exampleInputPhoto1"
            aria-describedby="PhotoHelp"
            placeholder="Enter Photo Number" 
            @input="handleImageUpload" accept="image/jpeg"
          />
        </div>


        </div>
      </form>
      <div class="col-12 d-flex">
        <a class="btn btn-success ms-auto my-3" @click="submitform">
          Add User</a
        >
      </div>
    </div>
  </div>
</template>


<script setup>
import axios from "axios";
import { ref } from "vue";
import Swal from "sweetalert2";
import InputText from "primevue/inputtext";
import { useRoute, useRouter } from "vue-router";


const route = useRouter();
const formdata = ref({
  name: "",
  email: "",
  password: "",
  confirmPassword: "",
  phone:"",
  address:"",
  position:"",
});

const handleImageUpload = (event)=>{
  const file = event.target.files[0];
  if(file){
    formdata.value.photo = file   
  }
}
// axios.interceptors.request.use((config) => {
//   // Retrieve the token from where you stored it (e.g., Vuex store or localStorage)
//   const token = localStorage.getItem("token"); // Make sure to replace 'token' with your actual token key

//   // If a token exists, add it to the request headers
//   if (token) {
//     config.headers.Authorization = `Bearer ${token}`;
//   }

//   return config;
// });

const submitform = async () => {

  const formData = new FormData();

  for (let  key  in formdata.value) {
    const value = formdata.value[key];
    formData.append(key,value) 
  }
  await axios
    .post("/api/add-user", formData)
    .then((res) => {
      if (res.status) {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Your work has been saved",
          showConfirmButton: false,
          timer: 1500,
        });
        route.push('users-list');
      }
    })
    .catch((err) => {
      Swal.fire({
        position: "top-end",
        icon: "error",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500,
      });
    });
};
</script>


<style scoped></style>