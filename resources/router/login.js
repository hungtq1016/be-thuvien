const login = [
    {
        path:'/login',
        name: "login",
        meta: { title: 'Đăng Nhập' },
        component:() => import("../views/admin/login.vue"),
    }
]

export default login
