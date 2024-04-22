import "./bootstrap";
import PrimeVue from 'primevue/config';
import { createApp } from "vue";
import { createPinia } from "pinia";
import router from './router'
import App from "./App.vue";


const app = createApp({
  components: {
    App,
  },
});

app.use(PrimeVue);
app.use(createPinia);
app.use(router).mount("#app");