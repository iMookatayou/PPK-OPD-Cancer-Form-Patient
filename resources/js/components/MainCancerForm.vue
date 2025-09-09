<script setup>
import { ref } from 'vue'
import { RouterView } from 'vue-router'
import styles from '@/assets/css/mainform/maincencerform.module.css'

const formData = ref({
  step1: {
    patientInfo: {
      name: '',
      lastname: '',
      sex: '',
      age: null
    },
    address: {
      houseNo: '',
      subDistrict: '',
      district: '',
      province: ''
    }
  },
  step2: {
    specimen: {
      type: '',
      site: ''
    },
    laterality: ''
  },
  step3: {
    diagnosis: {
      code: '',
      description: ''
    },
    grade: ''
  },
  step4: {
    tnm: {
      t: '',
      n: '',
      m: ''
    },
    metastasis: []
  },
  step5: {
    plan: [],
    doctor: {
      name: '',
      department: ''
    },
    note: {
      comment: '',
      recordedBy: ''
    }
  }
})
</script>

<template>
  <div :class="maincontainer">
    <RouterView
      :modelValue="formData"
      @update:modelValue="val => formData = val"
    />
  </div>
</template>
