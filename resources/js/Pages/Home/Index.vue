<template>
  <div class="layout-app card_gen_layout">
    <Head :title="__(title)" />
    <section class="relative z-10 overflow-hidden bg-primary h-[73px]" /><!--end section-->
    <section class="relative table w-full py-8 lg:py-12 pt-5 lg:pt-5">
      <div class="md:mt-8 sm:mt-3 justify-center flex generator__container">
        <div class="input-box rounded-lg shadow-lg flex flex-col justify-center items-center w-full lg:max-w-4xl ">
          <span class="top-bar" />
          <div class="w-full mx-auto my-4 border-b-2 pb-4 steps">
            <div class="flex pb-3">
              <div class="flex-1" />

              <div class="flex-1" :class="{'done': [1,2,3,4].includes(step)}">
                <div class="w-10 h-10 st-bg mx-auto border-2 border-grey-light rounded-full text-lg  flex items-center">
                  <span class=" text-center w-full">1</span>
                </div>
              </div>


              <div class="w-1/6 align-center items-center align-middle content-center flex" :class="{'done': [2,3,4].includes(step)}">
                <div class="w-full bg-grey-light rounded items-center align-middle align-center flex-1">
                  <div class="st-bar-bg text-xs leading-none py-1 text-center text-grey-darkest rounded w-full" />
                </div>
              </div>


              <div class="flex-1" :class="{'done': [2,3,4].includes(step)}">
                <div class="w-10 h-10 st-bg mx-auto border-2 border-grey-light rounded-full text-lg  flex items-center">
                  <span class=" text-center w-full">2</span>
                </div>
              </div>

              <div class="w-1/6 align-center items-center align-middle content-center flex" :class="{'done': [3,4].includes(step)}">
                <div class="w-full bg-grey-light rounded items-center align-middle align-center flex-1">
                  <div class="st-bar-bg text-xs leading-none py-1 text-center text-grey-darkest rounded w-full" />
                </div>
              </div>

              <div class="flex-1" :class="{'done': [3,4].includes(step)}">
                <div class="w-10 h-10 st-bg border-2 border-grey-light mx-auto rounded-full text-lg  flex items-center">
                  <span class="text-grey-darker text-center w-full">3</span>
                </div>
              </div>


              <div class="w-1/6 align-center items-center align-middle content-center flex" :class="{'done': step === 4}">
                <div class="w-full bg-grey-light rounded items-center align-middle align-center flex-1">
                  <div class="st-bar-bg text-xs leading-none py-1 text-center text-grey-darkest rounded w-full" />
                </div>
              </div>


              <div class="flex-1" :class="{'done': step === 4}">
                <div class="w-10 h-10 st-bg border-2 border-grey-light mx-auto rounded-full text-lg  flex items-center">
                  <span class="text-grey-darker text-center w-full">4</span>
                </div>
              </div>


              <div class="flex-1" />
            </div>

            <div class="flex text-xs content-center text-center">
              <div class="w-1/4">
                {{ __('Card information') }}
              </div>

              <div class="w-1/4">
                {{ __('Choose design') }}
              </div>

              <div class="w-1/4">
                {{ __('Review card info') }}
              </div>

              <div class="w-1/4">
                {{ __('Print preview') }}
              </div>
            </div>
          </div>
          <div v-if="step === 1">
            <h3 class="mt-2 text-lg w-full text-center items-center justify-center font-light">{{ __('Type your card information as following!') }}</h3>
            <form class="flex flex-col justify-center items-center" @submit.prevent="chooseDesign">
              <div id="cardInputs" class="flex flex-wrap p-6 items-center w-full">
                <div v-for="field in card_fields" :key="field.id" class="flex w-full lg:w-1/2">
                    <!--
                    <text-input v-model="form[field.slug]" :error="form['errors'][field.slug]" class="w-full pr-6 pb-5" :label="__(field.name)" :placeholder="'Type Your '+ field.name" type="text" autofocus autocapitalize="off" />
                    -->
                  <text-input v-model="form[field.slug]" :error="form['errors'][field.slug]" class="w-full p-5" :label="__(field.name)" :placeholder="'Type Your '+ field.name" type="text" autofocus autocapitalize="off" />
                </div>
                <div class="pb-0 pr-6 flex w-full company-logo mt-3 justify-between items-center ">
                  <div class="w-full lg:w-3/4 items-center justify-center">
                    <label class="inline-flex items-center mt-3" for="importCheck">
                      <input id="importCheck" v-model="enable_csv_import" type="checkbox" name="csv_import" class="form-checkbox h-5 w-5 text-gray-600" @change="enableCsvImport(enable_csv_import)" />
                      <div class="ml-2 rtl:mr-2">{{ __('Check this if want to import data from CSV or Excel file.') }}</div>
                    </label>
                    <p v-if="enable_csv_import" class="pt-1 inline-flex font-light text-sm"><a class="px-1 hover:underline" href="/files/card.csv">{{ __('You may download example formatted csv file which may help to import data properly.') }}</a></p>
                  </div>
                  <loading-button v-if="!enable_csv_import" :loading="form.processing" class="w-full md:w-1/4 mt-5 btn generate transition_icon hover:bg-indigo-800" type="submit"> {{ __('Next') }} <icon name="arrow-right" class="fill-white ml-4 rtl:mr-4 w-4" /></loading-button>
                  <loading-button v-else :loading="form.processing" class="w-full md:w-1/4 mt-5 btn generate " type="button" @click="$refs.file.click()"> <icon name="file" class="fill-white mr-1 rtl:ml-1 w-4" /> {{ __('Add CSV') }}</loading-button>
                </div>
                <!-- New Code -->
                <input id="file" ref="file" type="file" :accept="file_accept" class="hidden" @change="fileInputChange" />
                <!-- New Code -->
              </div>
            </form>
          </div>

          <div v-else-if="step === 2" class="w-full mx-auto">
            <div class="md:mt-10 sm:mt-3 justify-center flex w-full mx-auto">
              <div class="card-items w-full mx-auto">
                <h2 class="flex justify-center font-bold text-3xl pb-6">{{ __('Portrait Card Layout') }}</h2>
                <div class="navigation w-full relative">
                  <div class="left__nav rounded-full p-5 flex justify-center items-center absolute top-[145px] left-[10px] z-10 cursor-pointer bg-white" :class="{'disabled': page_number_portrait === 1}" @click="previousPagePortrait"><icon name="cheveron-left" class="w-6 h-6 " /></div>
                  <div class="right__nav rounded-full p-5 flex justify-center items-center absolute top-[145px] right-[10px] z-10 cursor-pointer bg-white" :class="{'disabled':allPortraitCardDesigns.length <= page_number_portrait * 3}" @click="nextPagePortrait"><icon name="cheveron-right" class="w-6 h-6 " /></div>
                </div>
                <div class="flex flex-wrap gap-2 items-center justify-center w-full ">
                  <card-portrait v-for="cardDesign in cardPortraitDesigns" :id="cardDesign" :key="cardDesign" :user="form" @click="selectDesign(cardDesign, 'portrait')" :ds="getStyle(cardDesign)" />
                </div>
                <h2 class="flex justify-center pt-12 font-bold text-3xl pb-6">{{ __('Landscape Card Layout') }}</h2>
                <div class="navigation w-full relative">
                  <div class="left__nav rounded-full p-5 flex justify-center items-center absolute top-20 left-[8px] z-10 cursor-pointer bg-white" :class="{'disabled': page_number_landscape === 1}" @click="previousPageLandscape"><icon name="cheveron-left" class="w-6 h-6 " /></div>
                  <div class="right__nav rounded-full p-5 flex justify-center items-center absolute top-20 right-[8px] z-10 cursor-pointer bg-white" :class="{'disabled':allLandscapeCardDesigns.length <= page_number_landscape * 2}" @click="nextPageLandscape"><icon name="cheveron-right" class="w-6 h-6 " /></div>
                </div>
                <div class="flex flex-wrap gap-2 items-center justify-center w-full">
                  <card-landscape v-for="cardDesign in cardLandscapeDesigns" :id="cardDesign" :key="cardDesign" :user="form" @click="selectDesign(cardDesign, 'landscape')" />
                </div>
              </div>
            </div>
            <div class="flex justify-between p-3 pb-5 items-center w-full">
              <loading-button :loading="form.processing" class="w-full md:w-1/5 mt-5 ml-6 rtl:mr-6 btn generate transition_icon hover:bg-indigo-800" @click="goToFirstStep"><icon name="arrow-left" class="fill-white mr-4 rtl:ml-4 w-4" /> {{ __('Previous') }}</loading-button>
            </div>
          </div>
          <div v-else-if="step === 3 && selected_design && selected_design.type" class="w-full mx-auto">
            <h2 class="flex justify-center font-bold text-xl">{{ __('Review the card information before printing') }}</h2>
            <div v-if="!form.cards.length" class="md:mt-10 sm:mt-3 justify-center flex flex-col lg:flex-row w-full mx-auto card-properties">
              <div class="card-items flex w-full lg:w-1/2 mx-auto">
                <div class="flex flex-wrap flex-col items-center justify-center w-full">
                  <card-portrait v-if="selected_design.type === 'portrait'" :id="selected_design.number" :user="form" :ds="getStyle(selected_design.number)" />
                  <card-landscape v-else-if="selected_design.type === 'landscape'" :id="selected_design.number" :user="form" :ds="getStyle(selected_design.number)" />
<!--                    <h3 class="my-3 text-xl font-bold text-gray-900 dark:text-white bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Download Card</h3>-->
                    <div class="buttons flex justify-center flex-col gap-2">
                        <button @click="downloadAsPNG('png')" type="button" class="text-gray-900 mt-3 btn generate transition_icon hover:bg-indigo-800 border border-gray-200 focus:outline-none rounded-lg px-5 py-2 text-center inline-flex gap-2 items-center">
                            <icon name="download" class="w-4 h-4 fill-white" /> Download Card
                        </button>
                        <p class="text-xs text-center w-full">Resolution: 2100px * 1200px</p>
<!--                        <button @click="downloadAsPNG('svg')" type="button" class="text-gray-900 bg-white hover:bg-gray-100 border border-gray-200 focus:outline-none rounded-lg px-5 py-2.5 text-center inline-flex gap-2 items-center dark:focus:ring-gray-600 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 me-2 mb-2">-->
<!--                            <img src="/images/svg.svg" class="w-5 h-5" /> SVG-->
<!--                        </button>-->
                    </div>
                </div>
              </div>
              <div class="card-form w-full lg:w-1/2 mx-auto">
                <div class="flex flex-wrap -mr-6 px-4 items-center w-full">
                  <div v-for="field in card_fields" class="flex w-full lg:w-1/2" :key="field.id">
                    <text-input v-model="form[field.slug]" :error="form['errors'][field.slug]" class="w-full pr-6 pb-5" :label="__(field.name)" :placeholder="'Type Your '+ field.name" type="text" autofocus autocapitalize="off" />
                  </div>
                  <text-input v-model="form.quantity" :error="form.errors.quantity" class="pb-5 pr-6 w-full " :label="__('Quantity') + __('(') + __('how many card items need to print') + __(')')" placeholder="e.g 10" type="number" autofocus autocapitalize="off" />
                </div>
              </div>
            </div>
            <div v-else-if="form.cards.length" class="w-full mx-auto">
              <div v-for="(card, ci) in form.cards" :key="ci" class="md:mt-10 sm:mt-3 justify-center flex w-full mx-auto card-properties">
                <div class="card-items w-full lg:w-1/2 mx-auto">
                  <div class="flex flex-wrap items-center justify-center w-full ">
                    <card-portrait v-if="selected_design.type === 'portrait'" :id="selected_design.number" :user="card" :ds="getStyle(selected_design.number)" />
                    <card-landscape v-else-if="selected_design.type === 'landscape'" :id="selected_design.number" :user="card" :ds="getStyle(selected_design.number)" />
                  </div>
                </div>
                <div class="card-form w-full lg:w-1/2 mx-auto">
                  <div class="flex flex-wrap -mb-8 -mr-6 p-4 justify-center items-center w-full">
                    <text-input v-model="card.name" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Name')" placeholder="Type Your Name" type="text" autofocus autocapitalize="off" :is_required="true" required />
                    <text-input v-model="card.profession" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Profession')" placeholder="Type Your Profession" type="text" autofocus autocapitalize="off" :is_required="true" required />
                    <text-input v-model="card.email" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Email')" placeholder="Type Your Email" type="text" autofocus autocapitalize="off" :is_required="true" required />
                    <text-input v-model="card.phone" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Phone')" placeholder="Type Your Phone" type="text" autofocus autocapitalize="off" :is_required="true" required />
                    <text-input v-model="card.website" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Website')" placeholder="Type Your Company Name" type="text" autofocus autocapitalize="off" />
                    <text-input v-model="card.company" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Company Name')" placeholder="Type Your Company Name" type="text" autofocus autocapitalize="off" />
                    <text-input v-model="card.location" class="pb-5 pr-6 w-full " :label="__('Location')" placeholder="Type Your Location" type="text" autofocus autocapitalize="off" />
                  </div>
                </div>
              </div>
            </div>
            <div class="flex justify-between p-3 pb-6 items-center w-full">
              <loading-button :loading="form.processing" class="w-full md:w-1/5 mt-5 ml-6 rtl:mr-6 btn generate transition_icon hover:bg-indigo-800" @click="step = 2"><icon name="arrow-left" class="fill-white mr-4 rtl:ml-4 w-4" /> {{ __('Previous') }}</loading-button>
              <loading-button :loading="form.processing" class="w-full md:w-1/5 mt-5 mr-6 rtl:ml-6 btn generate transition_icon hover:bg-indigo-800" @click="printPreview"> {{ __('Next') }} <icon name="arrow-right" class="fill-white ml-4 rtl:mr-4 w-4" /></loading-button>
            </div>
          </div>
          <div v-else-if="step === 4 && selected_design && selected_design.type" class="w-full mx-auto md:mt-8 sm:mt-3 justify-center p_card">
            <div class="buttons flex justify-between relative w-full">
              <button class="absolute top-[-50px]  left-[9%] flex items-center w-[120px] mt-5 btn print_download" @click="downloadPrintPage()"><icon class="w-3 h-3 fill-white mr-2 rtl:ml-2" name="download" /> {{ __('Download') }}</button>
              <button class="absolute top-[-50px]   right-[9%] flex items-center w-[125px] mt-5 btn print_download" onclick="window.print()"><icon class="w-3 h-3 fill-white mr-2 rtl:ml-2" name="print" /> {{ __('Print') }}</button>
            </div>
            <div v-if="selected_design && selected_design.type === 'portrait'">
              <div v-for="(cardPage, cpi) in cardPages" :key="cpi" class=" flex flex-wrap items-center justify-center w-full print_area a_portrait bg-white" :class="{'pageBreak':cpi > 0}">
                <card-portrait v-for="(item, ci) in cardPage" :id="selected_design.number" :key="ci" :user="form.cards.length?item:form" :ds="getStyle(selected_design.number)" />
              </div>
            </div>
            <div v-if="selected_design && selected_design.type === 'landscape'">
              <div v-for="(cardPage, cpi) in cardPages" :key="cpi" class=" flex flex-wrap items-center justify-center w-full print_area a_landscape bg-white" :class="{'pageBreak':cpi > 0}">
                <card-landscape v-for="(item, ci) in cardPage" :id="selected_design.number" :key="ci" :user="form.cards.length?item:form" />
              </div>
            </div>
            <div class="flex justify-between p-3 items-center w-full">
              <loading-button :loading="form.processing" class="w-full md:w-1/5 mt-5 ml-6 rtl:mr-6 btn generate transition_icon hover:bg-indigo-800" @click="step = 3"><icon name="arrow-left" class="fill-white mr-4 rtl:ml-4 w-4" /> {{ __('Previous') }}</loading-button>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Loading Process -->
    <div v-if="form.processing" class="processing-overlay">
      <div class="background" />
      <div class="loader">
        <svg width="200px" height="200px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" style="background: none;">
          <circle cx="75" cy="50" fill="#ffffff" r="6.39718">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.875s" />
          </circle>
          <circle cx="67.678" cy="67.678" fill="#ffffff" r="4.8">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.75s" />
          </circle>
          <circle cx="50" cy="75" fill="#ffffff" r="4.8">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.625s" />
          </circle>
          <circle cx="32.322" cy="67.678" fill="#ffffff" r="4.8">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.5s" />
          </circle>
          <circle cx="25" cy="50" fill="#ffffff" r="4.8">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.375s" />
          </circle>
          <circle cx="32.322" cy="32.322" fill="#ffffff" r="4.80282">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.25s" />
          </circle>
          <circle cx="50" cy="25" fill="#ffffff" r="6.40282">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="-0.125s" />
          </circle>
          <circle cx="67.678" cy="32.322" fill="#ffffff" r="7.99718">
            <animate attributeName="r" values="4.8;4.8;8;4.8;4.8" times="0;0.1;0.2;0.3;1" dur="1s" repeatCount="indefinite" begin="0s" />
          </circle>
        </svg>
      </div>
    </div>
    <!-- Loading Process -->

    <!-- How to use model -->
    <div v-if="how_to_use" class="fixed z-10 overflow-y-auto top-0 w-full left-0" :class="{'hidden': !how_to_use}">
      <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-gray-900 opacity-75" />
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all w-full sm:my-8 sm:align-middle sm:max-w-lg sm:w-full lg:max-w-4xl" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
          <div class="flex justify-end">
            <button
              type="button"
              class="btn-close box-content w-5 h-5 p-1 text-white border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-white hover:opacity-75 hover:no-underline"
              data-bs-dismiss="modal" aria-label="Close" @click="how_to_use=false"
            >
              <icon name="close" class="w-5 h-5 fill-black" />
            </button>
          </div>
          <div class="relative h-0 overflow-hidden max-w-full w-full" style="padding-bottom: 56.25%">
            <iframe :src="enable_csv_import ? 'https://www.youtube.com/embed/pG5ThuWwajs' : 'https://www.youtube.com/embed/DLC195lWI_4'" frameborder="0" allowfullscreen class="absolute top-0 left-0 w-full h-full" />
          </div>
        </div>
      </div>
    </div>
    <!-- How to use model -->
  </div>
</template>

<script>
// import Layout from '@/Shared/LayoutFront'
import Layout from '@/Shared/Landing/Layout'
import Logo from '@/Shared/Logo'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import Icon from '@/Shared/Icon'
import CardPortrait from '@/Shared/CardPortrait'
import CardLandscape from '@/Shared/CardLandscape'
import {Link, Head} from '@inertiajs/vue3'
import { toPng, toSvg } from 'html-to-image';

export default {
    components: {
        Logo,
        Icon,
        CardPortrait,
        CardLandscape,
        LoadingButton,
        SelectInput,
        TextInput,
        Link, Head,
    },
    layout: Layout,
    props: {
        title: String,
        card_fields: Object,
        custom_cards: {
            required: true,
        },
    },
    remember: 'form',
    data() {
        return {
            step: 1,
            file_accept: '.csv,.xlsx,.tsv,.ods,.xls,.slk,.xml',
            // fields: typeof this.card_fields === 'object' && this.card_fields? JSON.parse(this.card_fields.html).values : [
            //     {'name': 'name', 'value': 'Name', 'is_active': 1},
            //     {'name': 'profession', 'value': 'Profession', 'is_active': 1},
            //     {'name': 'email', 'value': 'Email Address', 'is_active': 1},
            //     {'name': 'phone', 'value': 'Phone', 'is_active': 1},
            //     {'name': 'website', 'value': 'Website', 'is_active': 1},
            //     {'name': 'company', 'value': 'Company', 'is_active': 1},
            //     {'name': 'location', 'value': 'Location', 'is_active': 1},
            // ],
            // fields: this.card_fields,
            form: this.$inertia.form({
                name: '',
                company: '',
                profession: '',
                phone: '',
                email: '',
                location: '',
                website: '',
                image: '',
                cards: [],
                processing: false,
                with_photos: false,
                logo: null,
                csv_import: null,
                quantity: '12',
            }),
            enable_csv_import: false,
            cardPages: [],
            print_preview: false,
            allPortraitCardDesigns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14],
            allLandscapeCardDesigns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15],
            cardPortraitDesigns: [],
            cardLandscapeDesigns: [],
            page_number_portrait: 1,
            page_number_landscape: 1,
            selected_design: null,
            current_card: null,
            how_to_use: false,
            paper: {
                size: 'a4',
            },
        }
    },
    created() {
        this.resetForm()
        this.testDesign()

        // New Code
        if(this.custom_cards.length){
            console.log(this.custom_cards)
            for (let c = 0; c < this.custom_cards.length; c++) {
                const cType = this.custom_cards[c].type || ''
                if(cType === 'portrait'){
                    this.allPortraitCardDesigns.push('_'+this.custom_cards[c].id)
                }else if(cType === 'landscape'){
                    this.allLandscapeCardDesigns.push('_'+this.custom_cards[c].id)
                }
            }
        }
        // New Code

    },
    methods: {
        downloadPrintPage(){
            const target_selector = document.getElementsByClassName('print_area')
            const target = target_selector?target_selector[0]: null
            const gen_id = Math.floor(Date.now() /1000)
            if(target){
                toPng(target, {pixelRatio: 6}).then((dataUrl) => {
                    const link = document.createElement('a')
                    link.download = gen_id + '.png'
                    link.href = dataUrl
                    link.click()
                })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        },
        downloadAsPNG(type){
            const target_selector = document.getElementsByClassName('card__content')
            const target = target_selector?target_selector[0]: null
            const conversion = type === 'svg'? toSvg(target): toPng(target, {pixelRatio: 6})
            const gen_id = Math.floor(Date.now() /1000)
            conversion.then((dataUrl) => {
                    const link = document.createElement('a')
                    link.download = gen_id + '.' + type
                    link.href = dataUrl
                    link.click()
                })
                .catch((err) => {
                    console.log(err)
                })
        },
        getStyle(id){
            let style = null
            if(typeof id === 'string' && id.includes('_')){
                const card_id = id.replace('_', '')
                const card_item = this.custom_cards.find(c=>parseInt(c.id) === parseInt(card_id))
                if(card_item){
                    style = [{borderRadius: card_item.border_radius+'px', color: card_item.color, fill: card_item.color}, card_item.background ? {backgroundImage: `url('${card_item.background}')`}:'']
                }
            }
            return style
        },
        goToFirstStep(){
            this.enable_csv_import = false
            this.step = 1
            this.form.cards.length = 0
            // this.testDesign()
        },
        testDesign(){
            this.card_fields.forEach(field => {
                this.form[field.slug] = field.value
            })
        },
        nextPagePortrait(){
            const itemCount = this.allPortraitCardDesigns.length
            if(itemCount > this.page_number_portrait * 3){
                this.page_number_portrait += 1
                this.cardPortraitDesigns = this.paginate(this.allPortraitCardDesigns, 3, this.page_number_portrait)
            }
        },
        previousPagePortrait(){
            if(this.page_number_portrait !== 1){
                this.page_number_portrait -= 1
                this.cardPortraitDesigns = this.paginate(this.allPortraitCardDesigns, 3, this.page_number_portrait)
            }
        },
        nextPageLandscape(){
            const itemCount = this.allLandscapeCardDesigns.length
            if(itemCount > this.page_number_landscape * 2){
                this.page_number_landscape += 1
                this.cardLandscapeDesigns = this.paginate(this.allLandscapeCardDesigns, 2, this.page_number_landscape)
            }
        },
        previousPageLandscape(){
            if(this.page_number_landscape !== 1){
                this.page_number_landscape -= 1
                this.cardLandscapeDesigns = this.paginate(this.allLandscapeCardDesigns, 2, this.page_number_landscape)
            }
        },
        paginate(array, page_size, page_number){
            return array.slice((page_number - 1) * page_size, page_number * page_size)
        },
        submitCardInfo(){
            this.step = 2
            this.generateCardDesign()
            this.form.processing = false
        },
        generateCardDesign(){
            this.cardLandscapeDesigns = this.paginate(this.allLandscapeCardDesigns, 2, this.page_number_landscape)
            this.cardPortraitDesigns = this.paginate(this.allPortraitCardDesigns, 3, this.page_number_portrait)
        },
        chooseDesign(){
            this.generateQrCode()
            this.submitCardInfo()
        },
        generateQrCode(){
            this.form.processing = true
            let qrText = this.form.name + '\n'
            qrText+= this.form.profession + '\n'
            qrText+= this.form.location + '\n'
            qrText+= this.form.phone + '\n'
            qrText+= this.form.email + '\n'
            qrText+= this.form.website + '\n'

            this.axios.post(this.route('generate.qr'), {text: qrText}).then(( response ) => {
                if(response.data && response.data.image){
                    this.form.image = response.data.image
                    this.form.processing = false
                }else{
                    alert('something went wrong!')
                    this.form.processing = false
                }
            }).catch((error) => {
                this.form.processing = false
                console.log(error)
            })
        },
        selectDesign(dn, designType){
            this.selected_design = { number: dn, type: designType }
            this.step = 3
        },
        resetForm(){
            this.file_accept = '.csv'
            this.form.school_name = ''
            this.form.student_name = ''
            this.form.image = ''
            this.form.cards = []
            this.form.processing = false
            this.form.with_photos = false
            this.cardPages = []
            this.print_preview = false
            this.form.school_logo = null
        },
        playVideo(){
            this.how_to_use = true
            console.log('play video')
        },
        printSectionReady(){
            this.print_preview = true
            this.cardPages = this.partitionArray(this.form.cards, 6)
            this.form.processing = false
        },
        partitionArray(array, size){
            return array.map( (e,i) => (i % size === 0) ? array.slice(i, i + size) : null ).filter( (e) => e )
        },
        withPhotosCheck(){
            if(this.form.with_photos){
                this.file_accept = '.zip'
            }
        },
        schoolLogoInputChange(e){
            if(e.target.files.length && e.target.files[0]){
                this.form.processing = true
                let data = new FormData()
                data.append('school_logo', document.getElementById('schoolLogo').files[0])
                this.axios.post(this.route('upload.school_logo'), data).then(( response ) => {
                    if(response.data && response.data.school_logo){
                        this.form.school_logo = response.data.school_logo
                        this.form.processing = false
                    }else{
                        alert('something went wrong!')
                        this.form.processing = false
                    }
                }).catch((error) => {
                    this.form.processing = false
                    console.log(error)
                })
            }
        },
        enableCsvImport(boolean){
            let el = document.getElementById('cardInputs'), all = el.getElementsByTagName('input'), i
            for (i = 0; i < all.length; i++) {
                if(all[i].type.toLowerCase() === 'text'){
                    all[i].disabled = boolean
                    if(boolean){
                        all[i].parentElement.classList.add('opacity-30')
                    }else{
                        all[i].parentElement.classList.remove('opacity-30')
                    }
                }
            }
        },
        fileInputChange(e) {
            this.form.processing = true
            let data = new FormData()
            const fileSel = document.getElementById('file')
            if(fileSel.files.length && fileSel.files[0]){
                data.append('file', document.getElementById('file').files[0])
                this.axios.post(this.route('import.file'), data).then(( response ) => {
                    if(response.data && response.data.csv && response.data.csv.length){
                        this.setCard(response.data.csv)
                        this.generateCardDesign()
                        this.form.processing = false
                        this.step = 2
                    }else{
                        alert('something went wrong!')
                        this.form.processing = false
                    }
                }).catch((error) => {
                    this.form.processing = false
                    console.log(error)
                })
            }
        },
        setCard(data){
            this.form.cards = [...data]
            const cardData = this.form.cards.map((c, ci) => {
                const qrText = c.name + ' \n' + c.profession + ' \n' + c.location + ' \n' + c.phone + ' \n' + c.email + ' \n' + c.website
                return {name: qrText, index: ci}
            })
            this.createQr(cardData)
        },
        setQrImageToCards(qrData){
            for (let index = 0; index < this.form.cards.length; index++) {
                this.form.cards[index].image = qrData[index]
                if(index === 0){
                    Object.assign(this.form, this.form.cards[index])
                }
            }
        },
        createQr(cardData){
            this.axios.post(this.route('create.qr'), { data: cardData }).then((response) => {
                if( response.data && response.data.images && response.data.images.length ){
                    this.setQrImageToCards(response.data.images)
                }
            }).catch((error) => {
                console.log(error)
                this.form.processing = false
            })
        },
        fileBrowse() {
            if(this.form.school_name){
                this.$refs.file.click()
            }else{
                alert('Please input school name first!')
            }
        },
        fileBrowseSchoolLogo() {
            if(this.form.school_name){
                this.$refs.schoolLogo.click()
            }else{
                alert('Please input school name first!')
            }
        },
        async printPreview(){
            this.form.processing = true
            if(this.form.cards.length){
                await this.setCard(this.form.cards)
            }else{
                await this.generateQrCode()
            }
            if(!this.form.cards.length){
                this.cardPages = await this.partitionArray(Array.from(Array(parseInt(this.form.quantity)).keys()), 6)
            }else{
                this.cardPages = await this.partitionArray(this.form.cards, 6)
            }
            await this.saveUserData()
            setTimeout(()=>{
                this.step = 4
                this.print_preview = true
            }, 10)
        },
        saveUserData(){
            this.form.processing = true
            this.axios.post(this.route('save.user.data'), []).then(( response ) => {
                if(response.data && response.data.log){
                    this.form.processing = false
                }else{
                    alert('something went wrong!')
                    this.form.processing = false
                }
            }).catch((error) => {
                this.form.processing = false
                console.log(error)
            })
        },
    },
}
</script>





