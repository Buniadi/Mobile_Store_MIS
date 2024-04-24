<template>
    <div class="container-fluid">
      <div
        class="card rounded-top-1 rounded-bottom-0 p-2 my-2 bg-success text-light shadow col-12"
      >
        <h3>Edit</h3>
      </div>
      <div class="col-12 p-2">
        <form class="d-flex gap-3 justify-content-between" @submit.prevent="submitform">
          <div class="d-flex justify-content-between col-12">
            <div class="form-group col-5">
              <label for="exampleInputName" class="form-label mt-4">Company Name</label>
              <input
                type="text"
                class="form-control"
                id="exampleInputName"
                aria-describedby="emailHelp"
                placeholder="eg. Iphone"
                v-model="formdata.name"
              />
            </div>
            <div class="form-group col-5">
              <label for="exampleInputcountry1" class="form-label mt-4"
                >Country</label
              >
              <input
                type="text"
                class="form-control"
                id="exampleInputcountry1"
                aria-describedby="countryHelp"
                placeholder="Enter country"
                autocomplete="off"
                v-model="formdata.country"
              />
            </div>
          </div>
  

        </form>
        <div class="col-12 d-flex">
          <a class="btn btn-success ms-auto my-3" @click="submitform">
            Edite</a
          >
        </div>
      </div>
    </div>
  </template>
  
  
  <script setup>
  import axios from "axios";
  import { onMounted, ref } from "vue";
  import Swal from "sweetalert2";
  import InputText from "primevue/inputtext";
import { useRoute } from "vue-router";
  
  
  const formdata = ref({
    id:"", 
    name: "",
    country: "",
  });
  
  const route = useRoute();

//   axios.interceptors.request.use((config) => {
//     // Retrieve the token from where you stored it (e.g., Vuex store or localStorage)
//     const token = localStorage.getItem("token"); // Make sure to replace 'token' with your actual token key
  
//     // If a token exists, add it to the request headers
//     if (token) {
//       config.headers.Authorization = `Bearer ${token}`;
//     }
  
//     return config;
//   });


onMounted(()=>{
    console.log(route.id)
    axios.get(`/api/companies/${route.params.id}/edit`).then((res)=>{
        if(res.status == 200) {
            formdata.value.id = res.data.id;
            formdata.value.name = res.data.name;
            formdata.value.country = res.data.country;
        }
    }).catch((err) => {
        console.log(err.message);
    });


})
  
//   const submitform = async () => {
  
//     await axios
//       .post("/api/companies/update/", formdata.value)
//       .then((res) => {
//         if (res.status) {
//           Swal.fire({
//             position: "top-end",
//             icon: "success",
//             title: "Your work has been saved",
//             showConfirmButton: false,
//             timer: 1500,
//           });
//         }
//       })
//       .catch((err) => {
//         Swal.fire({
//           position: "top-end",
//           icon: "error",
//           title: "Your work has been saved",
//           showConfirmButton: false,
//           timer: 1500,
//         });
//       });
//   };
  </script>