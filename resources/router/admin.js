const admin = [
    {
        path:'/admin',
        component:() => import("../views/admin/admin.vue"),
        children:[
            {
                path:'',
                name: "admin-dashboard",
                component:() => import("../views/admin/dashboard/index.vue"),
            },
            {
                path:'users',
                name: "admin-users",
                component:() => import("../views/admin/users/index.vue"),
            }
        ]
    }
]

export default admin