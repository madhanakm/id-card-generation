<template>
  <div>
      <Head :title="__(title)" />
    <div class="bg-white rounded-md shadow overflow-hidden max-w-full">
      <form @submit.prevent="update">
          <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
              <div class="pr-6 pb-8 w-full lg:w-1/3">
                  <div class="font-bold text-sm mb-1">{{ __('Language Name') }} </div>
                  <div class="font-light text-sm"> {{ language_data.name }} </div>
              </div>
              <div class="pr-6 pb-8 w-full lg:w-1/3">
                  <div class="font-bold text-sm mb-1">{{ __('Code') }} </div>
                  <div class="font-light text-sm"> {{ language_data.code }} </div>
              </div>
              <div class="pr-6 pb-8 w-full lg:w-1/3">
                  <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">{{ __('Update') }}</loading-button>
              </div>
          </div>
          <div class="flex flex-col mb-5 text-sm">
              <div v-for="(lan, li) in form.language_values" :key="li" class="p-8 -mr-6 -mb-8 flex flex-wrap lang_input">
                  <text-input class="pr-6 pb-2 w-full lg:w-1/2" v-model="lan.name" label="Title" />
                  <text-input class="pr-6 pb-2 w-full lg:w-1/2" v-model="lan.value" label="Value" />
              </div>
          </div>
          <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center">
              <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">{{ __('Update') }}</loading-button>
          </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import { Link, Head } from '@inertiajs/vue3'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'

export default {
  components: {
    LoadingButton,
    TextInput,
    Link,
      Head,
  },
  layout: Layout,
  props: {
      title: String,
      language_data: Object,
  },
  remember: 'form',
  data() {
    return {
      form: this.$inertia.form({
          language_values: this.language_data.data,
      }),
    }
  },
  methods: {
    update() {
      this.form.put(this.route('languages.update', this.language_data.id))
    },
  },
}
</script>
