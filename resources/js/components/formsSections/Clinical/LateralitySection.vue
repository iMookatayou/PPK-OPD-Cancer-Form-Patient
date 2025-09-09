<script setup>
defineProps({ modelValue: String })
defineEmits(['update:modelValue'])
</script>

<template>
  <fieldset style="border: 1px solid #ccc; padding: 1rem">
    <legend>ข้างที่ตรวจ</legend>
    <div>
      <label>
        <input type="radio" value="left" :checked="modelValue === 'left'" @change="$emit('update:modelValue', 'left')" />
        ซ้าย
      </label>
      <label>
        <input type="radio" value="right" :checked="modelValue === 'right'" @change="$emit('update:modelValue', 'right')" />
        ขวา
      </label>
      <label>
        <input type="radio" value="both" :checked="modelValue === 'both'" @change="$emit('update:modelValue', 'both')" />
        ทั้งสองข้าง
      </label>
    </div>
  </fieldset>
</template>
