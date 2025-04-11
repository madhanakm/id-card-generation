<template>
  <div>
      <Head :title="__('Dashboard')" />

      <div class="response__details flex flex-col lg:flex-row px-2 mt-3 gap-5">
          <div class="flex gap-5 flex-col lg:flex-row lg:w-10/12">
              <div class="w-full bg-white rounded-lg shadow-lg p-10">
                  <div id="chart" class="w-full">
                      <apexchart type="line" :options="chartOptions" height="400" :series="series"></apexchart>
                  </div>
              </div>
          </div>
          <div class="flex gap-5 flex-col lg:w-2/12">
              <div class="badge__item h-32 w-full cursor-pointer" @click="goToLink(this.route('contacts'))">
                  <div class="l__items bg-white rounded-lg shadow-lg flex justify-between w-full">
                      <div class="badge__info rtl:pr-4 rtl:pl-0">
                          <span class="title">{{ __('Contacts') }}</span>
                          <span class="number">{{ total.contacts }}</span>
                      </div>
                      <div class="a__right">
                          <icon name="pending_users" class="h-5 fill-gray-400 mr-5 rtl:ml-5 rtl:pl-0" />
                      </div>
                  </div>
              </div>
              <div class="badge__item h-32 w-full cursor-pointer" @click="goToLink(this.route('organizations'))">
                  <div class="l__items bg-white rounded-lg shadow-lg flex justify-between w-full">
                      <div class="badge__info rtl:pr-4 rtl:pl-0">
                          <span class="title">{{ __('Organizations') }}</span>
                          <span class="number">{{ total.organizations }}</span>
                      </div>
                      <div class="a__right">
                          <icon name="contact" class="h-5 fill-gray-400 mr-5 rtl:ml-5 rtl:pl-0" />
                      </div>
                  </div>
              </div>
              <div class="badge__item h-32 w-full cursor-pointer" @click="goToLink(this.route('notes'))">
                  <div class="l__items bg-white rounded-lg shadow-lg flex justify-between w-full">
                      <div class="badge__info rtl:pr-4 rtl:pl-0">
                          <span class="title">{{ __('Notes') }}</span>
                          <span class="number">{{ total.notes }}</span>
                      </div>
                      <div class="a__right">
                          <icon name="notes" class="h-5 fill-gray-400 mr-5 rtl:ml-5 rtl:pl-0" />
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- Loading Process -->
      <div v-if="loading" class="processing-overlay">
          <div class="background"></div>
          <div class="loader">
              <svg width="200px" height="200px"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;">
                  <circle cx="75" cy="50" fill="#ffffff" r="6.39718">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.875s"></animate>
                  </circle>
                  <circle cx="67.678" cy="67.678" fill="#ffffff" r="4.8">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.75s"></animate>
                  </circle>
                  <circle cx="50" cy="75" fill="#ffffff" r="4.8">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.625s"></animate>
                  </circle>
                  <circle cx="32.322" cy="67.678" fill="#ffffff" r="4.8">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.5s"></animate>
                  </circle>
                  <circle cx="25" cy="50" fill="#ffffff" r="4.8">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.375s"></animate>
                  </circle>
                  <circle cx="32.322" cy="32.322" fill="#ffffff" r="4.80282">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.25s"></animate>
                  </circle>
                  <circle cx="50" cy="25" fill="#ffffff" r="6.40282">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.125s"></animate>
                  </circle>
                  <circle cx="67.678" cy="32.322" fill="#ffffff" r="7.99718">
                      <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="0s"></animate>
                  </circle>
              </svg>
          </div>
      </div>
      <!-- Loading Process -->

  </div>
</template>

<script>
import {Head, Link} from '@inertiajs/vue3'
import Layout from '@/Shared/Layout'
import Icon from '@/Shared/Icon'

export default {
  metaInfo: { title: 'Dashboard' },
    components: {
        Head,
        Icon,
        Link,
    },
  layout: Layout,
    props: {
        auth: Object,
        total: Object,
        visitors: Array,
        labels: Array,
    },
    data() {
        return {
            errors: [],
            loading: false,
            firstResponse: [],
            lastResponse: [],
            months: [],
            series: [{
                name: 'Total',
                type: 'column',
                data: this.visitors
            }],
            chartOptions: {
                chart: {
                    height: 350,
                    type: 'line',
                },
                title: {
                    text: 'Generated Cards by Date'
                },
                dataLabels: {
                    enabled: true,
                    enabledOnSeries: [1]
                },
                labels: this.labels,
                xaxis: {
                    type: 'datetime'
                },
                yaxis: [{
                    title: {
                        text: 'User Count',
                    },

                }]
            },
        }
    },
    created() {
      console.log(this.visitors)
      console.log(this.labels)
    },
    methods: {
        goToLink(link){
            window.location.href = link;
        },
    },
}
</script>
