<script setup>
import SpecimenInfoSection from '@/components/formsSections/Clinical/SpecimenInfoSection.vue'
import LateralitySection from '@/components/formsSections/Clinical/LateralitySection.vue'

defineProps({ modelValue: Object })
defineEmits(['update:modelValue'])

const updateField = (key, value) => {
  const updated = { ...modelValue, [key]: value }
  emit('update:modelValue', updated)
}
</script>

<template>
  <div style="padding: 2rem">
    <h2>ข้อมูลคลินิก (Step 2)</h2>

    <SpecimenInfoSection
      :modelValue="modelValue.specimen"
      @update:modelValue="val => updateField('specimen', val)"
    />

    <LateralitySection
      :modelValue="modelValue.laterality"
      @update:modelValue="val => updateField('laterality', val)"
    />
  </div>
</template>
