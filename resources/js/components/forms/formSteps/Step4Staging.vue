<script setup>
import TNMSection from '@/components/formsSections/Staging/TNMSection.vue'
import MetastasisSection from '@/components/formsSections/Staging/MetastasisSection.vue'

defineProps({ modelValue: Object })
defineEmits(['update:modelValue'])

const updateField = (key, value) => {
  const updated = { ...modelValue, [key]: value }
  emit('update:modelValue', updated)
}
</script>

<template>
  <div style="padding: 2rem">
    <h2>การระบาดของโรค (Step 4)</h2>

    <TNMSection
      :modelValue="modelValue.tnm"
      @update:modelValue="val => updateField('tnm', val)"
    />

    <MetastasisSection
      :modelValue="modelValue.metastasis || []"
      @update:modelValue="val => updateField('metastasis', val)"
    />
  </div>
</template>
