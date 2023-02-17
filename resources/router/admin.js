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
                next('/login');
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
                path: 'author',
                name: "author",
                meta: { title: 'Tác Giả' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'bookshelf',
                name: "BookShelf",
                meta: { title: 'Kệ Sách' },
                component: () => import("../views/admin/AdminLayout.vue"),
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
        component: () => import("../views/pages/PageNotFound.vue"),
        meta: { title: '404' },
    }
]

function isAuthenticated() {
    // const token = localStorage.getItem('token-admin');
    const token = window.$cookies.isKey("ltoken");
    if (token) {
        return true;
    }
    return false
}

function hasPermissionsAdmin() {
    const today = new Date()
    const isAdmin = window.btoa(today.getMonth() + "admin");
    const token = window.$cookies.isKey(isAdmin);
    if (token) {
        return true;
    }
    return false
}
export default admin
