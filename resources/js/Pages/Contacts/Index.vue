<template>
  <div>
    <Head :title="__(title)" />
    <div class="flex items-center justify-between mb-6">
        <search-filter v-model="form.search" class="mr-4 w-full max-w-md" @reset="reset"></search-filter>
      <Link class="btn-indigo" :href="route('contacts.create')">
        <span>{{ __('Create New') }}</span>
      </Link>
    </div>
    <div class="bg-white rounded-md shadow overflow-x-auto">
      <table class="w-full whitespace-nowrap">
        <tr class="text-left font-bold">
          <th class="pb-4 pt-6 px-6">{{ __('Name') }}</th>
          <th class="pb-4 pt-6 px-6">{{ __('Email') }}</th>
          <th class="pb-4 pt-6 px-6">{{ __('City') }}</th>
          <th class="pb-4 pt-6 px-6" colspan="2">{{ __('Phone') }}</th>
        </tr>
        <tr v-for="contact in contacts.data" :key="contact.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
          <td class="border-t">
            <Link class="flex items-center px-6 py-4 focus:text-indigo-500" :href="route('contacts.edit', contact.id)">
              {{ contact.name }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="route('contacts.edit', contact.id)" tabindex="-1">
              <div v-if="contact.email">
                {{ contact.email }}
              </div>
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="route('contacts.edit', contact.id)" tabindex="-1">
              {{ contact.city }}
            </Link>
          </td>
          <td class="border-t">
            <Link class="flex items-center px-6 py-4" :href="route('contacts.edit', contact.id)" tabindex="-1">
              {{ contact.phone }}
            </Link>
          </td>
          <td class="w-px border-t">
            <Link class="flex items-center px-4" :href="route('contacts.edit', contact.id)" tabindex="-1">
              <icon name="cheveron-right" class="block w-6 h-6 fill-gray-400" />
            </Link>
          </td>
        </tr>
        <tr v-if="contacts.data.length === 0">
          <td class="px-6 py-4 border-t" colspan="4">{{__('No contacts found.')}}</td>
        </tr>
      </table>
    </div>
    <pagination class="mt-6" :links="contacts.links" />
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon'
import pickBy from 'lodash/pickBy'
import Layout from '@/Shared/Layout'
import throttle from 'lodash/throttle'
import mapValues from 'lodash/mapValues'
import Pagination from '@/Shared/Pagination'
import SearchFilter from '@/Shared/SearchFilter'

export default {
  components: {
    Head,
    Icon,
    Link,
    Pagination,
    SearchFilter,
  },
  layout: Layout,
  props: {
    filters: Object,
    contacts: Object,
      title: String,
  },
  data() {
    return {
      form: {
        search: this.filters.search,
      },
    }
  },
  watch: {
    form: {
      deep: true,
      handler: throttle(function () {
        this.$inertia.get(this.route('contacts'), pickBy(this.form), { preserveState: true })
      }, 150),
    },
  },
  created() {
  },
  methods: {
    reset() {
      this.form = mapValues(this.form, () => null)
    },
  },
}
</script>
