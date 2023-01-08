const login = [
    {
        path:'/admin-login',
        name: "admin-login",
        meta: { title: 'Đăng Nhập' },
        component:() => import("../views/admin/login.vue"),
    }
]

export default login
