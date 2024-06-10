import "./bootstrap";
import "../css/app.css";
import Layout from "./Layouts/Layout.vue";
import { createApp, h } from "vue";
import { Head, Link, createInertiaApp } from "@inertiajs/vue3";

createInertiaApp({
    title: (title) => `Musterapp - ${title}`,
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        let page = pages[`./Pages/${name}.vue`];
        page.default.layout = page.default.layout || Layout; //Wenn es keine Layout-Datei gibt, wird die Standard-Layout-Datei verwendet
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("Head", Head)
            .component("Link", Link)
            .mount(el);
    },
    progress: {
        // The delay after which the progress bar will appear, in milliseconds...
        delay: 250,

        // The color of the progress bar...
        color: "#29d",

        // Whether to include the default NProgress styles...
        includeCSS: true,

        // Whether the NProgress spinner will be shown...
        showSpinner: false,
    },
});
