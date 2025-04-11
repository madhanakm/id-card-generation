<template>
  <div class="layout-app card_gen_layout" :class="current_mode" :dir="$page.props.dir">
      <div id="dropdown" />
      <div class="top-nav bg-white flex items-center justify-center p-2 flex-col md:flex-row">
          <a :href="route('home')"><logo class="top_logo h-14" /></a>
          <div class="flex justify-center items-center">
              <dropdown class="mt-5 md:mt-1 language_menu_wrapper md:absolute md:right-12 md:top-5" placement="bottom-end">
                  <template #default>
                      <div class="flex justify-between items-center cursor-pointer group language_menu">
                          <div class=" font-bold mr-1 whitespace-nowrap flex justify-center item-center gap-2">
                              <icon class="w-5 h-5" :name="selected_language.code" /> <span>{{ selected_language.name }}</span>
                          </div>
                          <icon class="w-5 h-5 drop-down-caret-icon" name="cheveron-down" />
                      </div>
                  </template>
                  <template #dropdown>
                      <div class=" py-2 shadow-xl rounded text-sm language_menu_list">
                          <Link v-for="language in languages_except_selected" :key="language.code" class="flex items-center justify-center gap-2 px-6 py-2 hover:bg-indigo-500 hover:text-white" :href="route('language', [language.code])">
                              <icon class="w-5 h-5" :name="language.code" /> <span class="lang_name">{{ language.name }}</span>
                          </Link>
                      </div>
                  </template>
              </dropdown>
          </div>
      </div>
      <flash-messages />
      <div class="sec-cont">
          <slot />
      </div>
      <!-- switcher -->
      <div class="fixed top-1/4 -right-1 z-3">
            <span class="relative inline-block rotate-90">
                <input type="checkbox" class="checkbox opacity-0 absolute" id="chk" :checked="current_mode==='dark'" @change="switchMode" />
                <label class="label bg-slate-900 dark:bg-white shadow dark:shadow-gray-800 cursor-pointer rounded-full flex justify-between items-center p-1 w-14 h-8" for="chk">
                    <svg class="text-[20px] fill-yellow-500 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M428.3 367.5c-5.609-9.312-16.08-13.91-26.75-11.97c-42.39 8.188-85.83-2.938-119.2-30.5C248.4 297 228.9 255.5 228.9 211.3c0-52.75 28.2-101.8 73.59-127.8c9.453-5.406 14.38-15.88 12.55-26.66c-1.812-10.75-9.891-19-20.61-21C283.1 33.66 265.3 32 253.9 32C131.5 32 32 132.5 32 256s99.55 224 221.9 224c67.19 0 130-30.25 172.4-83C433.1 388.4 433.9 376.9 428.3 367.5zM253.9 448C149.2 448 64 361.9 64 256s85.19-192 189.9-192c4.891 0 11.53 .4062 18.09 1.031C225.3 98.34 196.9 152.9 196.9 211.3c0 53.84 23.7 104.3 65.05 138.5c36.25 29.94 82.17 43.88 128.5 39.69C354.8 426.8 305.8 448 253.9 448z"/></svg>
                    <svg class="text-[20px] fill-yellow-500 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 112C247.2 112 240 104.8 240 96V16C240 7.156 247.2 0 256 0s16 7.156 16 16V96C272 104.8 264.8 112 256 112zM272 496V416c0-8.844-7.156-16-16-16S240 407.2 240 416v80c0 8.844 7.156 16 16 16S272 504.8 272 496zM512 256c0-8.844-7.156-16-16-16H416c-8.844 0-16 7.156-16 16s7.156 16 16 16h80C504.8 272 512 264.8 512 256zM112 256c0-8.844-7.156-16-16-16H16C7.156 240 0 247.2 0 256s7.156 16 16 16H96C104.8 272 112 264.8 112 256zM380.5 154.2l56.56-56.59c6.25-6.25 6.25-16.38 0-22.62s-16.38-6.25-22.62 0l-56.56 56.59c-6.25 6.25-6.25 16.37 0 22.62c3.125 3.125 7.219 4.691 11.31 4.691S377.3 157.3 380.5 154.2zM97.61 437l56.56-56.59c6.25-6.25 6.25-16.37 0-22.62s-16.38-6.253-22.62-.0031l-56.56 56.59c-6.25 6.25-6.25 16.38 0 22.62c3.125 3.125 7.219 4.688 11.31 4.688S94.48 440.2 97.61 437zM437 437c6.25-6.25 6.25-16.38 0-22.62l-56.56-56.59c-6.25-6.25-16.38-6.247-22.62 .0031s-6.25 16.37 0 22.62l56.56 56.59c3.125 3.125 7.219 4.688 11.31 4.688S433.9 440.2 437 437zM154.2 154.2c6.25-6.25 6.25-16.37 0-22.62L97.61 74.97c-6.25-6.25-16.38-6.25-22.62 0s-6.25 16.38 0 22.62l56.56 56.59c3.125 3.125 7.219 4.688 11.31 4.688S151 157.3 154.2 154.2zM368 256c0-61.75-50.25-112-112-112S144 194.3 144 256s50.25 112 112 112S368 317.8 368 256zM336 256c0 44.13-35.89 80-80 80S176 300.1 176 256S211.9 176 256 176S336 211.9 336 256z"/></svg>
                    <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
                </label>
            </span>
      </div>
      <!-- switcher -->
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'
import FlashMessages from '@/Shared/FlashMessages'
import Dropdown from '@/Shared/Dropdown'
import LanguageSelector from '@/Shared/LanguageSelector'
import { Link } from '@inertiajs/vue3'

export default {
    components: {
        FlashMessages,
        Icon,
        Logo,
        Link,
        LanguageSelector,
        Dropdown,
    },
    props: {
        title: String,
    },
    data() {
        return{
            languages: [
                {name: 'English', code: 'en', dir: 'ltr'},
                {name: 'German', code: 'de', dir: 'ltr'},
                {name: 'Chinese', code: 'cn', dir: 'ltr'},
                {name: 'Bengali', code: 'bd', dir: 'ltr'},
                {name: 'Dutch', code: 'nl', dir: 'ltr'},
                {name: 'Italian', code: 'it', dir: 'ltr'},
                {name: 'Arabic', code: 'sa', dir: 'rtl'},
                {name: 'Spanish', code: 'es', dir: 'ltr'},
                {name: 'Swedish', code: 'se', dir: 'ltr'},
            ],
            current_mode: 'light',
            modes: ['dark', 'light'],
            edit_route: ''

        }
    },
    computed: {
        selected_language() {
            return this.languages.find(language => language.code === this.$page.props.locale)
        },
        languages_except_selected(){
            return this.languages.filter(language => language.code !== this.$page.props.locale)
        }
    },
    methods:{
        switchMode(){
            this.current_mode = this.current_mode === 'light' ? 'dark' : 'light'
            localStorage.setItem('current_mode', this.current_mode)
            this.changeTheme();
        },
        changeTheme(){
            const htmlTag = document.getElementsByTagName("html")[0]
            htmlTag.className = this.current_mode;
        }
    },
    updated() {
    },
    created() {
        if(localStorage.getItem('current_mode')){
            this.current_mode = localStorage.getItem('current_mode')
            this.changeTheme();
        }
    }
}
</script>
