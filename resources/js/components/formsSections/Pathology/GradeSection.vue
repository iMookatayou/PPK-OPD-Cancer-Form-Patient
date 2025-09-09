<script setup>
defineProps({ modelValue: String })
defineEmits(['update:modelValue'])
</script>

<template>
  <fieldset style="border: 1px solid #ccc; padding: 1rem">
    <legend>เกรดของเนื้องอก</legend>
    <select :value="modelValue" @change="$emit('update:modelValue', $event.target.value)">
      <option value="">เลือกเกรด</option>
      <option value="G1">G1 - Well differentiated</option>
      <option value="G2">G2 - Moderately differentiated</option>
      <option value="G3">G3 - Poorly differentiated</option>
      <option value="G4">G4 - Undifferentiated</option>
    </select>
  </fieldset>
</template>
