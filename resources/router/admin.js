const admin = [
    {
        path: '/admin',
        component: () => import("../views/admin/admin.vue"),
        children: [
            {
                path: '',
                name: "admin-dashboard",
                component: () => import("../views/admin/dashboard/index.vue"),
            },
            {
                path: 'users',
                children: [
                    {
                        path: '',
                        name: "users-index",
                        component: () => import("../views/admin/users/index.vue"),
                    },
                    {
                        path: 'add',
                        name: "user-add",
                        component: () => import("../views/admin/users/add.vue"),
                    }
                ],

            },

        ]
    }
]

export default admin