const admin = [
    {
        path: '/admin',
        beforeEnter(to, from, next) {
            if (isAuthenticated()) {
              if (!hasPermissionsAdmin(to)) {
                next('/');
              } else {
                next();
              }
            } else {
                next('/');
            }
        },
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
            {
                path: 'actor',
                name: "actor",
                meta: { title: 'Diễn Viên' },
                component: () => import("../views/admin/actor/index.vue"),
            },
            {
                path: 'director',
                name: "director",
                meta: { title: 'Đạo Diễn' },
                component: () => import("../views/admin/director/index.vue"),
            },
            {
                path: 'movie',
                name: "movie",
                meta: { title: 'Phim' },
                component: () => import("../views/admin/movie/index.vue"),
            },
        ],
    },
    {
        path: "/admin/:pathMatch(.*)*",
        component: ()=>import("../views/pages/PageNotFound.vue"),
        meta: { title: '404' },
    }
]

function isAuthenticated() {
    const token = localStorage.getItem('token-admin');
    if (token) {
        return true;
    }
    return false
}

function hasPermissionsAdmin() {
    const role = JSON.parse(localStorage.getItem('userInfo')).role;
    if (role.id >=3) {
        return true;
    }
    return false
}
export default admin
