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
                path: 'movie',
                name: "movie",
                component: () => import("../views/client/movie/index.vue"),
                meta: { title: 'Danh Sách Phim' }
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
