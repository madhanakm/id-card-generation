<template>
    <div class="flex items-center">
        <div class="flex w-full bg-white rounded shadow">
            <input class="relative px-6 py-3 w-full rounded-r focus:shadow-outline" autocomplete="off" type="text" name="search" :placeholder="__(placeholder)" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" />
        </div>
        <button class="ml-3 rtl:mr-3 text-gray-500 hover:text-gray-700 focus:text-indigo-500 text-sm flex" type="button" @click="$emit('reset')">
            {{ __('Clear') }}
        </button>
    </div>
</template>

<script>
import Dropdown from '@/Shared/Dropdown'

export default {
    components: {
        Dropdown,
    },
    props: {
        modelValue: String,
        maxWidth: {
            type: Number,
            default: 300,
        },
        placeholder:{
            type: String,
            default: 'Search...'
        }
    },
    emits: ['update:modelValue', 'reset'],
}
</script>
