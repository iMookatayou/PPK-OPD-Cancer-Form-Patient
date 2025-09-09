<script setup>
import DiagnosisSection from '@/components/formsSections/Pathology/DiagnosisSection.vue'
import GradeSection from '@/components/formsSections/Pathology/GradeSection.vue'

defineProps({ modelValue: Object })
defineEmits(['update:modelValue'])

const updateField = (key, value) => {
  const updated = { ...modelValue, [key]: value }
  emit('update:modelValue', updated)
}
</script>

<template>
  <div style="padding: 2rem">
    <h2>พยาธิวิทยา (Step 3)</h2>

    <DiagnosisSection
      :modelValue="modelValue.diagnosis"
      @update:modelValue="val => updateField('diagnosis', val)"
    />

    <GradeSection
      :modelValue="modelValue.grade"
      @update:modelValue="val => updateField('grade', val)"
    />
  </div>
</template>
