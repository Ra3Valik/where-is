/* eslint-disable vue/component-definition-name-casing */
import { createApp } from "vue";
import HomePageLayout from "./layouts/HomePageLayout.vue";
import HomePage from "./views/HomePage.vue";

const app = createApp({
    mounted() {},
});

app.component("app-layout-home-page", HomePageLayout);
app.component("home-page", HomePage);

app.mount("#app");
