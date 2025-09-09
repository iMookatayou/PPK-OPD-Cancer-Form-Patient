import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import laravel from 'laravel-vite-plugin'
import path from 'path'

// 🔧 ปรับตามเครื่อง dev ของคุณ
const devHost = '127.0.0.1'
const devPort = 8000  // Laravel backend

export default defineConfig({
  resolve: {
    alias: {
      vue: 'vue/dist/vue.esm-bundler.js',
      '@': path.resolve(__dirname, 'resources/js'),
      '@components': path.resolve(__dirname, 'resources/js/components'),
      '@views': path.resolve(__dirname, 'resources/js/views'),
      '@images': path.resolve(__dirname, 'public/images'),
      '@css': path.resolve(__dirname, 'resources/css'),
      '@assets': path.resolve(__dirname, 'resources/assets')
    }
  },
  plugins: [
    laravel({
      input: ['resources/js/app.js'],
      refresh: true
    }),
    vue()
  ],
  server: {
    host: devHost,
    port: 5173, // Vue dev server
    hmr: {
      host: devHost,      // ห้ามมี http://
      protocol: 'ws'
    },
    proxy: {
      '/api': {
        target: `http://${devHost}:${devPort}`, // Laravel backend
        changeOrigin: true,
        secure: false,
      },
      '/sanctum': {
        target: `http://${devHost}:${devPort}`,
        changeOrigin: true,
        secure: false,
      }
    }
  }
})
