import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 
                'resources/js/app.js',
                'resources/js/Asidebar.js',
                'resources/js/catalog-reports.js',
                'resources/js/catalog.js',
                'resources/js/circulation-reports.js',
                'resources/js/circulation.js',
                'resources/js/dashboard.js',
                'resources/js/employee.js',
                'resources/js/login.js',
                'resources/js/member-reports.js',
                'resources/js/members.js',
                'resources/js/overdue-reports.js',
                'resources/js/profile.js',
                'resources/js/reservation.js',
                'resources/js/settings.js', 

                'resources/js/catalog-addbook.js',
                'resources/js/catalog-addcategories.js',
                'resources/js/catalog-edit_item.js',
                'resources/js/catalog-view_item.js',

                'resources/js/catalog-reports_category.js',
                'resources/js/category-list.js',
                'resources/js/donated.js',
                'resources/js/new.js',

                'resources/js/check-out.js', 
                'resources/js/edit.js', 

                'resources/js/advance.js',
                'resources/js/least.js', 
                'resources/js/mostly.js', 
                




                
            ],
            refresh: true,
        }),
    ],
});
