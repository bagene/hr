import { createApp, h } from 'vue';
import { createInertiaApp, Link } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import MainLayout from './layouts/MainLayout.vue';

createInertiaApp({
	resolve: async name => {
		let page = (await import(`./Pages/${name}`)).default;

		if(page.layout === undefined) {
			page.layout = MainLayout;
		}

		return page;
	},
	setup({ el, App, props, plugin }) {
		createApp({ render: () => h(App, props) })
			.use(plugin)
			.component('Link', Link)
			.mixin({ methods: { route }})
			.mount(el)
	},
})

InertiaProgress.init();