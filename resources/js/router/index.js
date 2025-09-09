import { createRouter, createWebHistory } from 'vue-router'
import axios from 'axios'

// Auth
import Login from '@/components/auth/Login.vue'
import Register from '@/components/auth/Register.vue'
import ChangePassword from '@/components/auth/Changepassword.vue'
import Admin from '@/components/auth/Admin.vue'

// Main Pages
import LandingDashboard from '@/views/LandingDashboard.vue'
import CancerFormPage from '@/components/MainCancerForm.vue'
import ThankYou from '@/views/ThankYou.vue'
import PatientList from '@/views/PatientList.vue'

// Steps (ใช้กับ nested route)
import Step1PatientInfo from '@/components/forms/formSteps/Step1PatientInfo.vue'
import Step2ClinicalData from '@/components/forms/formSteps/Step2ClinicalData.vue'
import Step3Pathology from '@/components/forms/formSteps/Step3Pathology.vue'
import Step4Staging from '@/components/forms/formSteps/Step4Staging.vue'
import Step5Treatment from '@/components/forms/formSteps/Step5Treatment.vue'
import StepPreview from '@/components/StepPreview.vue'
import PrintForm from '@/views/mock/PrintForm.vue'

// Axios setup
axios.defaults.baseURL = 'http://localhost:8000'
axios.defaults.withCredentials = true

const routes = [
  { path: '/', redirect: '/landingdashboard' },

  // Dashboard
  {
    path: '/landingdashboard',
    name: 'Dashboard',
    component: LandingDashboard,
    meta: { requiresAuth: true }
  },

  // Auth
  { path: '/login', component: Login },
  { path: '/register', component: Register },
  { path: '/change-password', component: ChangePassword },
  { path: '/admin', component: Admin, meta: { requiresAdmin: true } },

  // Cancer Form Multi-Step (มี component ครอบ)
  {
    path: '/cancer-form',
    component: CancerFormPage, // ✅ component wrapper
    meta: { requiresAuth: true },
    children: [
      { path: '', redirect: '/cancer-form/step1' }, // redirect default
      { path: 'step1', component: Step1PatientInfo },
      { path: 'step2', component: Step2ClinicalData },
      { path: 'step3', component: Step3Pathology },
      { path: 'step4', component: Step4Staging },
      { path: 'step5', component: Step5Treatment },
      { path: 'preview', component: StepPreview },
      { path: 'print', component: PrintForm }
    ]
  },

  // Others
  { path: '/thank-you', component: ThankYou, meta: { requiresAuth: true } },
  { path: '/patient-list', component: PatientList, meta: { requiresAuth: true } }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

// ✅ Route Guard
router.beforeEach(async (to, from, next) => {
  const publicPages = ['/login', '/register', '/change-password']
  const authRequired = to.meta.requiresAuth || !publicPages.includes(to.path)

  try {
    const res = await axios.get('/api/user')
    const user = res.data
    const isAdmin = user.groups?.some(g => g.name === 'admin')

    if (publicPages.includes(to.path) && user) {
      return next('/landingdashboard')
    }

    if (authRequired && !user) {
      return next('/login')
    }

    if (to.meta.requiresAdmin && !isAdmin) {
      return next('/landingdashboard')
    }

    next()
  } catch (err) {
    console.warn('Auth error', err)
    if (authRequired) return next('/login')
    next()
  }
})

export default router
