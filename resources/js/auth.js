import axios from 'axios'

export async function getUser() {
  try {
    const res = await axios.get('/api/user')
    return res.data
  } catch (err) {
    return null
  }
}

export async function logout() {
  try {
    await axios.post('/api/logout')
    return true
  } catch (err) {
    console.error('Logout failed:', err)
    return false
  }
}
