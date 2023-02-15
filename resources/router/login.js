const login = [
    {
        path:'/login',
        name: "login",
        meta: { title: 'Đăng Nhập' },
        component:() => import("../views/pages/login.vue"),
    }
]

export default login
