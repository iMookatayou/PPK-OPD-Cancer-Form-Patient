import axios from 'axios'

// กำหนด baseURL ให้ตรงกับ IP และ port Laravel backend
axios.defaults.baseURL = 'http://localhost:8000'  // เปลี่ยนเป็น IP ของ Windows เครื่องคุณ
axios.defaults.withCredentials = true  // ต้องเปิดเพื่อส่ง cookie และรับ cookie

export async function useCawRef(type, filter = true) {
  const res = await axios.get(`/api/cawref/${type}`)
  return filter ? res.data.filter(i => i.status === 'y') : res.data
}

export async function getCsrfCookie() {
  return axios.get('/sanctum/csrf-cookie')
}