import { reactive } from 'vue'

export const store = reactive({
    order: [
        { "title": "", "count": 0, "price": 0}
    ]
});