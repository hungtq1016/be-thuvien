const admin = [
    {
        path: '/admin',
        component: () => import("../views/admin/admin.vue"),
        children: [
            {
                path: '',
                name: "admin-dashboard",
                component: () => import("../views/admin/dashboard/index.vue"),
                meta: { title: 'Trang Quản Lý' }
            },
            {
                path: 'category',
                name: "category",
                meta: { title: 'Thể Loại' },
                component: () => import("../views/admin/category/index.vue"),
            },
            {
                path: 'tag',
                name: "tag",
                meta: { title: 'Nhãn Dán' },
                component: () => import("../views/admin/tag/index.vue"),
            },

        ],
    },
    {
        path: "/:pathMatch(.*)*", 
        component: ()=>import("../views/pages/PageNotFound.vue"),
        meta: { title: '404' },
    }
]

export default admin