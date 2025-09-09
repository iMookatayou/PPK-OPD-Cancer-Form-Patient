<script setup>
import { onMounted } from 'vue'
import PatientBasicInfoSection from '@/components/formsSections/Patient/PatientBasicInfoSection.vue'
import AddressSection from '@/components/formsSections/Patient/AddressSection.vue'
import styles from '@/assets/css/mainform/step/Step1PatientInfo.module.css'

const props = defineProps({
  modelValue: Object
})

const emit = defineEmits(['update:modelValue'])

onMounted(() => {
  console.log('✅ Step1 modelValue:', props.modelValue)
})
</script>

<template>
  <div style="max-width: 960px; margin: auto; padding: 2rem">
    <h2 style="font-size: 1.75rem; font-weight: bold; margin-bottom: 1rem;">
      ข้อมูลผู้ป่วย (Step 1)
    </h2>

    <PatientBasicInfoSection
      :modelValue="props.modelValue.patientInfo"
      @update:modelValue="val =>
        emit('update:modelValue', { ...props.modelValue, patientInfo: val })"
    />

    <AddressSection
      :modelValue="props.modelValue.address"
      @update:modelValue="val =>
        emit('update:modelValue', { ...props.modelValue, address: val })"
    />
  </div>
</template>
