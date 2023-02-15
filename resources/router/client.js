const client = [
    {
        path:'/',
        children:[
            {
                path: '',
                name: "home",
                component: () => import("../views/client/home/index.vue"),
                meta: { title: 'Trang Chủ' }
            },
            {
                path: 'book',
                name: "book",
                component: () => import("../views/client/book/index.vue"),
                meta: { title: 'Danh Sách' }
            },
            {
                path: 'category',
                name: "category",
                component: () => import("../views/client/item.vue"),
                meta: { title: 'category' }
            },
            {
                path: 'category/:id',
                name: "category-detail",
                component: () => import("../views/client/item.vue"),
                meta: { title: 'category' }
            },
        ],
        component: () => import("../views/client/client.vue"),
    },
    {
        path: "/:pathMatch(.*)*",
        component: ()=>import("../views/pages/PageNotFound.vue"),
        meta: { title: '404' },
    }
]

export default client;
