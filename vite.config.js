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
                
            ],
            refresh: true,
        }),
    ],
});
