import "./bootstrap";
import "../css/app.css";
import Layout from "./Layouts/Layout.vue";
import { createApp, h } from "vue";
import { Head, Link, createInertiaApp } from "@inertiajs/vue3";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

createInertiaApp({
    title: (title) => `Musterapp - ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || Layout; //Wenn es keine Layout-Datei gibt, wird die Standard-Layout-Datei verwendet
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) }).use(plugin);
        use(ZiggyVue).component("Head", Head).component("Link", Link).mount(el);
    },
    progress: {
        //delay: 250,
        color: "#29d",
        includeCSS: true,
        showSpinner: false,
    },
});
