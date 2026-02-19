import { createApp } from "vue";
import router from './router/index'

const app = createApp({});

app.use(router);
app.mount("#app");