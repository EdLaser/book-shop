import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import BookShopView from './views/BookShopView.vue';

const app = createApp(App)
app.component(
    'BookShopView', BookShopView
)

app.mount('#app')
