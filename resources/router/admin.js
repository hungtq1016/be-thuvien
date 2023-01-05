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
                children: [
                    {
                        path: '',
                        name: "users-index",
                        meta: { title: 'Thể Loại' },
                        component: () => import("../views/admin/category/index.vue"),
                    },
                    // {
                    //     path: 'add',
                    //     name: "user-add",
                    //     component: () => import("../views/admin/users/add.vue"),
                    // }
                ],

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