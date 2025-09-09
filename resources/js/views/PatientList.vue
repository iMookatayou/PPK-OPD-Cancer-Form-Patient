<template>
  <div class="patient-list">
    <h2>📋 รายการแบบฟอร์มที่ส่งแล้ว</h2>
    <table>
      <thead>
        <tr>
          <th>ชื่อ</th>
          <th>เพศ</th>
          <th>อายุ</th>
          <th>ICD10</th>
          <th>Topology</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="form in forms" :key="form.id">
          <td>{{ form.title }}</td>
          <td>{{ form.sex }}</td>
          <td>{{ form.age }}</td>
          <td>{{ form.icd10 }}</td>
          <td>{{ form.topology }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

const forms = ref([])

onMounted(async () => {
  const res = await axios.get('/api/cancer-form', { withCredentials: true })
  forms.value = res.data
})
</script>

<style scoped>
.patient-list {
  padding: 2rem;
}
table {
  width: 100%;
  border-collapse: collapse;
}
th, td {
  padding: 0.75rem;
  border: 1px solid #ccc;
}
</style>
