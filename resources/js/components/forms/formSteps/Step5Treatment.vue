<script setup>
import PlanSection from '@/components/formsSections/Treatment/PlanSection.vue'
import DoctorAndHospitalSection from '@/components/formsSections/Treatment/DoctorAndHospitalSection.vue'

defineProps({ modelValue: Object })
defineEmits(['update:modelValue'])

const updateField = (key, value) => {
  const updated = { ...modelValue, [key]: value }
  emit('update:modelValue', updated)
}

function handleDoctorNoteUpdate(val) {
  updateField('doctor', val.doctor)
  updateField('note', val.note)
}
</script>

<template>
  <div style="padding: 2rem">
    <h2>แผนการรักษา (Step 5)</h2>

    <PlanSection
      :modelValue="modelValue.plan"
      @update:modelValue="val => updateField('plan', val)"
    />

    <DoctorAndHospitalSection
      :modelValue="{ doctor: modelValue.doctor, note: modelValue.note }"
      @update:modelValue="handleDoctorNoteUpdate"
    />
  </div>
</template>
