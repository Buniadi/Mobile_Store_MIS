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
            :options="companies"
            optionLabel="name"
            placeholder="Select a City"
            class="w-full md:w-14rem"
          />
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
        {{ $route.params.id }}
      </div>
    </div>
  </div>
</template>
    
    
  <script setup>
import axios from "axios";
import { onMounted, ref } from "vue";
import Swal from "sweetalert2";
import InputText from "primevue/inputtext";
import { useRoute, useRouter } from "vue-router";
import Dropdown from "primevue/dropdown";

const route = useRouter();
const router = useRoute();
const formdata = ref({
  company: "",
  model: "",
  battery_level: "",
  ram: "",
  finger: false,
  face: false,
  powertype: "",
  memory: "",
  camera_quantity: "",
  photo: "",
  pexel: "",
});

const selectedCity = ref();
const companies = ref();

const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (file) {
    formdata.value.photo = file;
  }
};

onMounted(() => {
  axios
    .get("/api/allcompanies")
    .then((res) => {
      console.log(res.data);
      companies.value = res.data;
    })
    .catch((err) => {
      console.log(err);
    });

  axios
    .get(`/api/phone/${router.params.id}/edit`)
    .then((res) => {
      console.log(res.data);
      formdata.value.company = res.data.company_id;
      formdata.value.model = res.data.model;
      formdata.value.battery_level = res.data.battery_level;
      formdata.value.ram = res.data.ram;
      formdata.value.finger = res.data.fingerprint === '1' ? true : false;
      formdata.value.face = res.data.face === '1' ? true : false;
      formdata.value.memory = res.data.memory;
      formdata.value.powertype = res.data.power_type;
      formdata.value.camera_quantity = res.data.camera_n;
      formdata.value.photo = res.data.photo;
      formdata.value.pexel = res.data.cam_pexel;

      const selectedCompany = companies.value.find(company => company.id === formdata.value.company)
      selectedCity.value = selectedCompany;
      //   phones.value = res.data.data;
    })
    .catch((err) => {
      console.log(err);
    });
});
const submitform = async () => {
  formdata.value.company = selectedCity.value.id;
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
        // route.push("users-list");
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