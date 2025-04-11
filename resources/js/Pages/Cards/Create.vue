<template>
  <div>
    <Head :title="__(title)" />
    <div class="max-w-full bg-white rounded-md shadow overflow-hidden">
      <form @submit.prevent="store">
        <div class="flex flex-wrap">
          <div class="w-full mx-auto">
            <div class="md:mt-10 sm:mt-3 py-10 justify-center flex flex-col lg:flex-row w-full mx-auto card-properties">
              <div class="card-items w-full lg:w-1/2 mx-auto pt-8">
                <div class="flex flex-wrap items-center justify-center w-full ">
                  <div v-if="form.type === 'portrait'" class="card__entry">
                    <div class="flex justify-between card__content card_portrait" :style="[{borderRadius: form.border_radius+'px', color: form.color, fill: form.color}, bg_image ? {backgroundImage: `url('${bg_image}')`}:'']">
                      <div class="flex flex-col w-full main__content relative">
                        <div class="flex items-center justify-center round_circle pt-7 w-full">
                          <div class="text-lg uppercase font-light __company"> {{ active_fields.company }}</div>
                        </div>
                        <div class="flex flex-col justify-center items-center photo_name pt-5 w-full">
                          <div v-if="active_fields.name" class="text-xl font-bold"> {{ active_fields.name }}</div>
                          <div v-if="active_fields.profession" class="tracking-[3px] text-xs uppercase font-light"> {{ active_fields.profession }}</div>
                        </div>
                        <div class="flex justify-center items-center w-full pt-2">
                          <div v-if="active_fields.phone" class="flex phone text-xs font-light pt-2 h-5 w-full justify-center items-center"> <icon name="phone" class="w-3 h-3 mr-1 icon" /> {{ active_fields.phone }}</div>
                        </div>
                        <div class="flex flex-col justify-center items-center gap-3 bottom__sec w-full pt-4">
                          <div class=" flex justify-center items-center qr_code">
                            <div class="qr__image">
                              <img src="/images/qr/1.svg" alt="QR Image" />
                            </div>
                          </div>
                          <div class="flex flex-col items-center justify-center">
                            <div class="flex ___desc items-center">
                              <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="active_fields.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ active_fields.location }}</div>
                                <div v-if="active_fields.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ active_fields.email }}</div>
                                <div v-if="active_fields.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ active_fields.website }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div v-else-if="form.type === 'landscape'" class="card__entry">
                    <div class="flex justify-between card__content card_landscape" :style="[{borderRadius: form.border_radius+'px', color: form.color, fill: form.color}, bg_image ? {backgroundImage: `url('${bg_image}')`}:'']">
                      <div class="flex justify-center w-full main__content relative fill-white">
                        <div class=" flex justify-center items-center qr_code">
                          <div class="qr__image">
                            <img src="/images/qr/1.svg" alt="QR Image" />
                          </div>
                        </div>
                        <div class="flex justify-between items-center gap-1 photo_name w-full pt-24 pb-2 pl-8 mr-3">
                          <div class="flex flex-col">
                            <div v-if="active_fields.name" class="name"> {{ active_fields.name }}</div>
                            <div v-if="active_fields.profession" class="profession"> {{ active_fields.profession }}</div>
                          </div>
                          <div class="flex flex-col items-center justify-center">
                            <div class="flex ___desc items-center">
                              <div class="flex flex-col __desc__names flex-start items-start gap-1">
                                <div v-if="active_fields.phone" class="flex phone  "> <icon name="phone" class="w-4 h-4 mr-2 icon" /> {{ active_fields.phone }}</div>
                                <div v-if="active_fields.email" class="flex email  "> <icon name="email" class="w-4 h-4 mr-2 icon" /> {{ active_fields.email }}</div>
                                <div v-if="active_fields.location" class="flex address  "> <icon name="location" class="w-4 h-4 mr-2 icon" /> {{ active_fields.location }}</div>
                                <div v-if="active_fields.website" class="flex address  "> <icon name="website" class="w-4 h-4 mr-2 icon" /> {{ active_fields.website }}</div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-form w-full lg:w-1/2 mx-auto">
                <div class="flex flex-wrap items-center w-full">
                  <div class="flex flex-wrap items-center w-full">
                    <div class="flex w-full">
                      <div class="w-full pr-6 pb-3">
                        <label for="cardType" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select card type</label>
                        <select v-model="form.type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                          <option value="portrait">Portrait</option>
                          <option value="landscape">Landscape</option>
                        </select>
                      </div>
                    </div>
                    <div class="flex w-full">
                      <div class="w-full pr-6 pb-3">
                        <label class="form-label" for="cardTitle">{{ __('Card Title') }}</label>
                        <input v-model="form.title" autocapitalize="off" autofocus="" required="required" class="form-input" placeholder="Add a title" type="text" name="title" />
                      </div>
                    </div>

                    <div class="flex w-full">
                      <div class="flex w-full items-center justify-start py-5">
                        <label for="isActive" class="flex w-full items-center justify-start gap-2 text-gray-900 dark:text-gray-300">
                          <input id="isActive" v-model="form.is_active" type="checkbox" true-value="1" false-value="0" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600" />
                          {{ __('Active Card') }}
                        </label>
                      </div>
                    </div>

                    <div class="flex w-full">
                      <div class="w-full flex items-center gap-2 pb-3 h-12">
                        <label class="flex form-label h-2.5" for="inputColor">Color</label>
                        <color-picker v-model:pure-color="form.color" format="hex" class="flex" shape="circle" />
                      </div>
                    </div>

                    <div class="flex w-full">
                      <div class="w-full pr-6 pb-3">
                        <label for="borderSlider" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Border Radius') }} - {{ form.border_radius+__('px') }}</label>
                        <input id="borderSlider" v-model="form.border_radius" type="range" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer dark:bg-gray-700" />
                      </div>
                    </div>

                    <div class="flex w-full py-4">
                      <div class="w-full pr-6">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Background Image</label>
                        <input id="file_input" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" @change="onFileChange($event)" />
                      </div>
                    </div>

                    <div class="flex w-full">
                      <loading-button :loading="form.processing" class="btn-indigo" type="submit">{{ __('Save Card') }}</loading-button>
                    </div>
                  </div>
                  <!--                                    <div class="flex w-full lg:w-1/2" v-for="field in card_fields">-->
                  <!--                                        <text-input v-model="form[field.name]" :error="form.errors.name" class="w-full pr-6 pb-5" :label="__(field.value)" :placeholder="'Type Your '+ field.value" type="text" autofocus autocapitalize="off" />-->
                  <!--                                    </div>-->
                </div>
              </div>
            </div>


            <!--                        <div class="w-full mx-auto">-->
            <!--                            <div v-for="(card, ci) in form.cards" :key="ci" class="md:mt-10 sm:mt-3 justify-center flex w-full mx-auto card-properties">-->
            <!--                                <div class="card-items w-full lg:w-1/2 mx-auto">-->
            <!--                                    <div class="flex flex-wrap items-center justify-center w-full ">-->
            <!--                                        <card-portrait v-if="form.type === 'portrait'" :id="selected_design.number" :user="card" />-->
            <!--                                        <card-landscape v-else-if="form.type === 'landscape'" :id="selected_design.number" :user="card" />-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                                <div class="card-form w-full lg:w-1/2 mx-auto">-->
            <!--                                    <div class="flex flex-wrap -mb-8 -mr-6 p-4 justify-center items-center w-full">-->
            <!--                                        <text-input v-model="card.name" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Name')" placeholder="Type Your Name" type="text" autofocus autocapitalize="off" :is_required="true" required />-->
            <!--                                        <text-input v-model="card.profession" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Profession')" placeholder="Type Your Profession" type="text" autofocus autocapitalize="off" :is_required="true" required />-->
            <!--                                        <text-input v-model="card.email" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Email')" placeholder="Type Your Email" type="text" autofocus autocapitalize="off" :is_required="true" required />-->
            <!--                                        <text-input v-model="card.phone" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Phone')" placeholder="Type Your Phone" type="text" autofocus autocapitalize="off" :is_required="true" required />-->
            <!--                                        <text-input v-model="card.website" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Website')" placeholder="Type Your Company Name" type="text" autofocus autocapitalize="off" />-->
            <!--                                        <text-input v-model="card.company" class="pb-5 pr-6 w-full lg:w-1/2 " :label="__('Company Name')" placeholder="Type Your Company Name" type="text" autofocus autocapitalize="off" />-->
            <!--                                        <text-input v-model="card.location" class="pb-5 pr-6 w-full " :label="__('Location')" placeholder="Type Your Location" type="text" autofocus autocapitalize="off" />-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
          </div>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Icon from '@/Shared/Icon';
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import CardPortrait from '@/Shared/CardPortrait'
import CardLandscape from '@/Shared/CardLandscape'

import { ColorPicker } from 'vue3-colorpicker'
import 'vue3-colorpicker/style.css'


export default {
    components: {
        Head,
        Icon,
        Link,
        LoadingButton,
        SelectInput,
        TextInput,
        CardPortrait,
        CardLandscape,
        ColorPicker,
    },
    layout: Layout,
    props: {
        title: String,
        card_fields: {
            required: true,
        },
        card_info: {
            required: false,
        },
    },
    remember: 'form',
    data() {
        return {
            bg_image: null,
            active_fields: {},
            form: this.$inertia.form({
                id: null,
                type: 'portrait',
                title: '',
                background: null,
                color: '#ffffff',
                html: null,
                css: null,
                border_radius: 0,
                is_active: '1',
            }),
        }
    },
    created() {
        for (let f = 0; f < this.card_fields.length; f++) {
            if(this.card_fields[f].is_active){
                this.active_fields[this.card_fields[f].slug] = this.card_fields[f].value
            }
        }

        if(this.card_info){
            Object.assign(this.form, this.card_info)
            if(this.card_info.background){
                this.bg_image = this.card_info.background;
            }
        }
    },
    methods: {
        onFileChange(e){
            if (e.target.files.length){
                this.form.background = e.target.files[0]
                // console.log(URL.createObjectURL(e.target.files[0]))
                this.bg_image = URL.createObjectURL(e.target.files[0])
            }
        },
        store() {
            this.form.post(this.route('cards.store'))
        },
    },
}
</script>
