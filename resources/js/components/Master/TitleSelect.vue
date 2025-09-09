<template>
  <div>
    <label for="title">คำนำหน้า</label>
    <select v-model="model" id="title">
      <option value="">-- เลือก --</option>
      <option v-for="item in options" :key="item.code" :value="item.name">
        {{ item.name }}
      </option>
    </select>
  </div>
</template>

<script setup>
import { ref, watchEffect,onMounted  } from 'vue'
import { useCawRef } from '@/composables/useCawRef'

const props = defineProps({ modelValue: String })
const emit = defineEmits(['update:modelValue'])

const model = ref(props.modelValue)
const options = ref([])

watchEffect(() => emit('update:modelValue', model.value))

onMounted(async () => {
  options.value = await useCawRef('title')
})
</script>
