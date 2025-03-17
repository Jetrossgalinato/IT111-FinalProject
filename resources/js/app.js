import "./bootstrap";
import { createApp } from "vue";
import App from "./components/App.vue";

// Create a new Vue application instance
const app = createApp(App);

// Mount the Vue application to an HTML element with the ID 'app'
app.mount("#app");
