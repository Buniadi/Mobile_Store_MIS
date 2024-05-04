<template>
  <div class="container-fluid">
    <div
      class="card rounded-top-1 rounded-bottom-0 p-2 my-2 bg-success text-light shadow col-12"
    >
      <h3>Add Property</h3>
    </div>
    <div class="col-12 p-2">
      <form class="d-flex gap-3 justify-content-between">
        <div class="d-flex flex-column gap-2 col-4">
            <Dropdown
              v-model="selectedCity"
              :options="cities"
              optionLabel="name"
              placeholder="Select a City"
              class="w-full md:w-14rem"
            />


          <div class="form-group col-10">
            <label for="exampleInputEmail1" class="form-label mt-4"
              >company</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputcompany1"
              aria-describedby="companyHelp"
              placeholder="Enter company Name"
              autocomplete="off"
              v-model="formdata.company"
            />
          </div>

          <div class="form-group col-10">
            <label for="exampleInputModel1" class="form-label mt-4"
              >Model</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputModel1"
              placeholder="Model"
              autocomplete="off"
              v-model="formdata.model"
            />
          </div>
          <div class="form-group col-10">
            <label for="exampleInputBattery_level1" class="form-label mt-4"
              >Battery_level</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputBattery_level1"
              placeholder="Battery_Health"
              autocomplete="off"
              v-model="formdata.battery_level"
            />
          </div>

          <div class="form-group col-10">
            <label for="exampleInputRAM1" class="form-label mt-4">RAM</label>
            <input
              type="text"
              class="form-control"
              id="exampleInputRAM1"
              aria-describedby="RAMHelp"
              placeholder="Enter RAM Number"
              autocomplete="off"
              v-model="formdata.ram"
            />
          </div>
          <div class="form-group col-10 bd-danger">
            <label for="exampleInputCameraPexel1" class="form-label mt-4"
              >Pexel Number</label
            >
            <input
              type="number"
              class="form-control"
              id="exampleInputCameraPexel1"
              aria-describedby="Camera PexelHelp"
              placeholder="Enter Camera Pexel Number"
              autocomplete="off"
              v-model="formdata.pexel"
            />
          </div>
        </div>

        <div class="d-flex flex-column justify-content-around col-6">
          <div class="form-group">
            <label for="exampleInputfinger1" class="form-label mt-4"
              >Finger</label
            >
            <input
              type="checkbox"
              class="form-checkbox ms-4"
              id="exampleInputfinger1"
              v-model="formdata.finger"
            />
            {{ formdata.finger }}
          </div>

          <div class="form-group">
            <label for="exampleInputface1" class="form-label mt-4">Face</label>
            <input
              type="checkbox"
              class="form-checkbox ms-5"
              id="exampleInputface1"
              v-model="formdata.face"
            />
            {{ formdata.face }}
          </div>

          <div class="form-group col-9">
            <label for="exampleInputpowerType1" class="form-label mt-4"
              >PowerType</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputpowerType1"
              aria-describedby="powerTypeHelp"
              placeholder="Enter powerType Number"
              autocomplete="off"
              v-model="formdata.powertype"
            />
          </div>

          <div class="form-group col-9">
            <label for="exampleInputmemory1" class="form-label mt-4"
              >Memory</label
            >
            <input
              type="text"
              class="form-control"
              id="exampleInputmemory1"
              aria-describedby="memoryHelp"
              placeholder="Enter memory Number"
              autocomplete="off"
              v-model="formdata.memory"
            />
          </div>
          <div class="form-group col-9">
            <label for="exampleInputcameraQuantity1" class="form-label mt-4"
              >Camera Quantity</label
            >
            <input
              type="number"
              class="form-control"
              id="exampleInputcameraQuantity1"
              aria-describedby="cameraQuantityHelp"
              placeholder="Enter cameraQuantity Number"
              autocomplete="off"
              v-model="formdata.camera_quantity"
            />
          </div>

          <div class="form-group col-9">
            <label for="exampleInputPhoto1" class="form-label mt-4"
              >Photo</label
            >
            <input
              type="file"
              class="form-control"
              id="exampleInputPhoto1"
              aria-describedby="PhotoHelp"
              placeholder="Enter Photo Number"
              @input="handleImageUpload"
              accept="image/jpeg"
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
import Dropdown from "primevue/dropdown";

const selectedCity = ref();
const cities = ref([
  { name: "New York", code: "NY" },
  { name: "Rome", code: "RM" },
  { name: "London", code: "LDN" },
  { name: "Istanbul", code: "IST" },
  { name: "Paris", code: "PRS" },
]);

const route = useRouter();
const formdata = ref({
  name: "",
  company: "",
  model: "",
  battery_level: "",
  ram: "",
  finger: "",
  face: "",
  powertype: "",
  memory: "",
  camera_quantity: "",
  photo: "",
  pexel: "",
});

const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    formdata.value.photo = file;
  }
};
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

  for (let key in formdata.value) {
    const value = formdata.value[key];
    formData.append(key, value);
  }
  await axios
    .post("/api/add-phone", formData)
    .then((res) => {
      if (res.status) {
        Swal.fire({
          position: "top-end",
          icon: "success",
          title: "Your work has been saved",
          showConfirmButton: false,
          timer: 1500,
        });
        route.push("users-list");
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