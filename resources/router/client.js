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
                path: 'book/:slug',
                name: "BookDetail",
                props: true,
                component: () => import("../views/client/BookDetailView.vue"),
                meta: { title: 'Danh Sách' }
            },
            {
                path: 'category',
                name: "CategoryList",
                component: () => import("../views/client/CateLayout.vue"),
                meta: { title: 'category' }
            },
            {
                path: 'category/:slug',
                name: "RequestBook",
                props: true,
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
