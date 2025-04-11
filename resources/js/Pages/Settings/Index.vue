<template>
  <div>
    <Head :title="title" />
    <div class="bg-white rounded-md shadow overflow-hidden mr-2">
        <form @submit.prevent="update">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
            <text-input v-model="form.app_name" :error="form.errors.app_name" class="pr-6 pb-8 w-full lg:w-1/3" :label="__('App Name')" />
            <div class="pb-8 pr-6 w-full flex lg:w-2/3">
                <file-input v-model="form.logo" :error="form.errors.photo" class="pr-2 w-full lg:w-3/5" type="file" accept="image/png" label="Logo" />
                <div class="w-full lg:w-2/5 flex items-center justify-center">
                    <img v-if="form.main_logo" class="block mb-2 max-h-[50px]" :src="form.main_logo" />
                </div>
            </div>
            <div class="pb-8 pr-6 w-full flex lg:w-1/3">
                <file-input v-model="form.logo_white" :error="form.errors.logo_white" class="pr-2 w-full lg:w-4/5" type="file" accept="image/png" label="Logo White" />
                <div class="w-full lg:w-1/5 flex items-end justify-center">
                    <img v-if="form.main_logo_white" class="block mb-2 rounded bg-dark" :src="form.main_logo_white" />
                </div>
            </div>
        </div>

            <div class="pt-8 pl-8 flex w-full items-center gap-3">
                <h3 class="title font-bold text-xl">Card Fields</h3>
                <small class="text-sm">(You can modify card fields and default values as you want to)</small>
            </div>
            <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                <div class="flex gap-3 w-full font-bold">
                    <div class="border-b pb-4">On/Off</div>
                    <div class="border-b w-full pb-4">Field name</div>
                    <div class="border-b w-full pb-4">Default value</div>
                </div>
                <div class="flex gap-3 pt-6 w-full pb-8" v-for="(field, fi) in form.card_fields" :key="fi">
                    <label :for="field.slug+fi" class="flex toggle_swtich items-center cursor-pointer pr-2">
                        <div class="relative">
                            <input :id="field.slug+fi" type="checkbox" class="sr-only" v-model="field.is_active" true-value="1" false-value="0" />
                            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
                        </div>
                    </label>
                    <text-input v-model="field.name" class=" w-full" />
                    <text-input v-model="field.value" class=" w-full" />
                </div>
            </div>
            <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center">
                <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">{{ __('Save') }}</loading-button>
            </div>
        </form>

    </div>
  </div>
</template>

<script>
import { Link, Head } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon'
import Layout from '@/Shared/Layout'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import FileInput from '@/Shared/FileInput'

export default {
  metaInfo: { title: 'Priorities' },
  components: {
    Icon,
    Link,
      Head,
      FileInput,
    Pagination,
    SearchFilter,
      TextInput,
      SelectInput,
      LoadingButton,
  },
  layout: Layout,
  props: {
      title: String,
      settings: Object,
      card_fields: Object,
      languages: Array,
  },
    remember: 'form',
  data() {
    return {
        form: this.$inertia.form({
            app_name: this.settings.app_name.value,
            logo: null,
            logo_white: null,
            main_logo: '/images/logo.png',
            main_logo_white: '/images/logo_white.png',
            default_language: this.settings.default_language.value,
            // card_fields: typeof this.card_fields === 'object' && this.card_fields? JSON.parse(this.card_fields.html): {values: [{"name": "name", "value": "Name", "is_active": 1},
            //         {"name": "profession", "value": "Profession", "is_active": 1},
            //         {"name": "email", "value": "Email Address", "is_active": 1},
            //         {"name": "phone", "value": "Phone", "is_active": 1},
            //         {"name": "website", "value": "Website", "is_active": 1},
            //         {"name": "company", "value": "Company", "is_active": 1},
            //         {"name": "location", "value": "Location", "is_active": 1}]},
            card_fields: this.card_fields,
        }),
        fontFamily: ''
    }
  },
    created() {
      console.log(this.card_fields)
    },
    methods: {
      update() {
          const vm = this;
          this.form.post(this.route('global.update'), {
              onSuccess: () => {
                  const successMessage = vm.$page.props.flash.success
                  this.form.logo = null
                  this.form.logo_white = null
                  if(successMessage){
                      window.location.reload()
                  }
              }
          })
      },
  },
}
</script>
