/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                rice: {
                    50: '#faf9f6',
                    100: '#f5f2ee',
                    200: '#ebe5d9',
                    300: '#d8cbbf',
                    400: '#c4b2a0',
                    500: '#af9982',
                    600: '#937b66',
                    700: '#7a6452',
                    800: '#644f40',
                    900: '#4e3b2f',
                    950: '#2a1f18',
                },
                // Semantic colors for status and actions
                success: '#5a8d4b', // rice-based green
                warning: '#c8963b', // husk color
                danger: '#c44536',  // bran color
                info: '#4a90e2',    // germ color (blue-ish)
                // Info shades
                'info-50': '#eff6ff',
                'info-100': '#dbeafe',
                'info-200': '#bfdbfe',
                'info-300': '#93c5fd',
                'info-400': '#60a5fa',
                'info-500': '#4a90e2',
                'info-600': '#3b82f6',
                'info-700': '#2563eb',
                'info-800': '#1d4ed8',
                'info-900': '#1e40af',
                'info-950': '#1e3a8a',
                // Success shades
                'success-50': '#f0fdf4',
                'success-100': '#dcfce7',
                'success-200': '#bbf7d0',
                'success-300': '#86efac',
                'success-400': '#4ade80',
                'success-500': '#22c55e',
                'success-600': '#16a34a',
                'success-700': '#15803d',
                'success-800': '#166534',
                'success-900': '#14532d',
                'success-950': '#052e16',
                // Warning shades
                'warning-50': '#fffbeb',
                'warning-100': '#fef3c7',
                'warning-200': '#fde68a',
                'warning-300': '#fcd34d',
                'warning-400': '#fbbf24',
                'warning-500': '#f59e0b',
                'warning-600': '#d97706',
                'warning-700': '#b45309',
                'warning-800': '#92400e',
                'warning-900': '#78350f',
                'warning-950': '#451a03',
                // Danger shades
                'danger-50': '#fef2f2',
                'danger-100': '#fee2e2',
                'danger-200': '#fecaca',
                'danger-300': '#fca5a5',
                'danger-400': '#f87171',
                'danger-500': '#ef4444',
                'danger-600': '#dc2626',
                'danger-700': '#b91c1c',
                'danger-800': '#991b1b',
                'danger-900': '#7f1d1d',
                'danger-950': '#450a0a',
            },
            fontFamily: {
                sans: ['Open Sans', 'sans-serif'],
                display: ['Playfair Display', 'serif'],
            }
        },
    },
    plugins: [],
};