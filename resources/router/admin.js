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
                name: "AdminDashboard",
                component: () => import("../views/admin/dashboard/index.vue"),
                meta: { title: 'Trang Quản Lý' }
            },
            {
                path: 'category',
                name: "AdminCategory",
                meta: { title: 'Thể Loại' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'tag',
                name: "AdminTag",
                meta: { title: 'Nhãn Dán' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'author',
                name: "AdminAuthor",
                meta: { title: 'Tác Giả' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'bookshelf',
                name: "AdminBookShelf",
                meta: { title: 'Kệ Sách' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'language',
                name: "AdminLanguage",
                meta: { title: 'Ngôn Ngữ' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'major',
                name: "AdminMajor",
                meta: { title: 'Ngành Học' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'user',
                name: "AdminUser",
                meta: { title: 'Người Dùng' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'role',
                name: "AdminRole",
                meta: { title: 'Vai Trò' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'publisher',
                name: "AdminPublisher",
                meta: { title: 'Nhà Xuất Bản' },
                component: () => import("../views/admin/AdminLayout.vue"),
            },
            {
                path: 'book',
                name: "AdminBook",
                meta: { title: 'Sách' },
                component: () => import("../views/admin/AdminLayout.vue"),
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
