<template>
  <div class="layout-app" :class="current_mode" :dir="$page.props.dir">
      <div id="dropdown" />
    <div class="md:flex md:flex-col">
      <div class="md:h-screen md:flex md:flex-col">
        <div class="md:flex md:shrink-0 ">
          <div class="md:shrink-0 md:py-2 md:w-60 flex items-center justify-between md:justify-center sidebar-left-top">
              <Link class="mt-1" href="/">
                  <logo class="help-desk-logo" />
              </Link>
              <dropdown class=" md:hidden" className="small-menu" placement="bottom-end">
                  <template #default>
                      <svg class="w-6 h-6 mobile-menu-selector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
                  </template>
                  <template #dropdown>
                      <div class="mt-2 px-8 py-4 bg-hd-sidebar rounded shadow-lg">
                          <main-menu :auth="auth" />
                      </div>
                  </template>
              </dropdown>
          </div>
          <div class="bg-white w-full p-4 md:py-2 md:pr-12 md:pl-8 text-sm flex justify-first items-center top_bar">
              <div class="placement-top-left">
                  <div class="mt-1 welcome_text">{{ __(generateGreetings()) }} <span>{{ $page.props.auth.user.first_name }}!</span></div>
                  <div class="display-time">
                      <span class="time">{{ time }} </span>
                  </div>
              </div>
              <div class="placement-top-right">
                  <dropdown class="mt-1 language_menu_wrapper rtl:ml-5" placement="bottom-end">
                      <template #default>
                      <div class="flex items-center cursor-pointer group language_menu">
                          <div class=" font-bold mr-1 rtl:ml-1 whitespace-nowrap">
                              <icon class="w-5 h-5 rtl:ml-3" :name="selected_language.code" /> <span>{{ selected_language.name }}</span>
                          </div>
                          <icon class="w-5 h-5 drop-down-caret-icon" name="cheveron-down" />
                      </div>
                      </template>
                      <template #dropdown>
                      <div class=" py-2 shadow-xl rounded text-sm language_menu_list">
                          <Link v-for="language in languages_except_selected" :key="language.code" class="block px-6 py-2 hover:bg-indigo-500 hover:text-white" :href="route('language', [language.code])">
                              <icon class="w-5 h-5 rtl:ml-3" :name="language.code" /> <span class="lang_name">{{ language.name }}</span>
                          </Link>
                      </div>
                      </template>
                  </dropdown>
                  <dropdown class="mt-1 select_user" placement="bottom-end">
                      <template #default>
                          <div class="flex items-center cursor-pointer group">
                              <div class=" mr-1 whitespace-nowrap">
                                  <img v-if="$page.props.auth.user.photo" class="user_photo rtl:ml-3" :alt="$page.props.auth.user.first_name" :src="$page.props.auth.user.photo" />
                                  <img v-else src="/images/svg/profile.svg" class="w-5 h-5 rtl:ml-3" alt="user profile" />
                                  <span>{{ $page.props.auth.user.first_name }}</span>
                                  <span class="hidden md:inline">{{ $page.props.auth.user.last_name }}</span>
                              </div>
                              <icon class="w-5 h-5 drop-down-caret-icon" name="cheveron-down" />
                          </div>
                      </template>
                      <template #dropdown>
                          <div class="shadow-xl bg-white rounded text-sm">
                              <Link class="block px-6 py-2 hover:bg-indigo-500 hover:text-white" :href="route('users.edit.profile')">{{ __('Edit Profile') }}</Link>
                              <Link class="block px-6 py-2 hover:bg-indigo-500 hover:text-white w-full text-left" :href="route('logout')" method="delete" as="button">{{ __('Logout') }}</Link>
                          </div>
                      </template>
                  </dropdown>
              </div>
          </div>
        </div>
        <div class="md:flex md:flex-grow md:overflow-hidden">
          <main-menu class="hidden md:block sidebar shrink-0 md:w-60 overflow-y-auto" />
          <div class="md:flex-1 md:overflow-y-auto" scroll-region>
              <div class="container-head">
                  <div class="ch-left">
                      <h1 class="page-title">{{ __(title) }}</h1>
                      <div class="breadcrumb text-sm">
                          <Link :href="route('dashboard')"><icon class="w-3 h-3" name="home" /></Link>
                          <span class="b-item">/</span>
                          <Link v-if="edit_route" :href="route(edit_route)" class="capitalize">{{ edit_route }}</Link>
                          <span v-if="edit_route" class="b-item">/</span>
                          <span class="b-item">{{ __(title) }}</span>
                      </div>
                  </div>
                  <div class="ch-right cursor-pointer">
                      <button class="theme-toggle" id="theme-toggle" title="Toggles light & dark" :aria-label="current_mode" aria-live="polite" @click="switchMode">
                          <svg class="sun-and-moon" aria-hidden="true" width="24" height="24" viewBox="0 0 24 24">
                              <mask class="moon" id="moon-mask">
                                  <rect x="0" y="0" width="100%" height="100%" fill="white" />
                                  <circle cx="24" cy="10" r="6" fill="black" />
                              </mask>
                              <circle class="sun" cx="12" cy="12" r="6" mask="url(#moon-mask)" fill="currentColor" />
                              <g class="sun-beams" stroke="currentColor">
                                  <line x1="12" y1="1" x2="12" y2="3" />
                                  <line x1="12" y1="21" x2="12" y2="23" />
                                  <line x1="4.22" y1="4.22" x2="5.64" y2="5.64" />
                                  <line x1="18.36" y1="18.36" x2="19.78" y2="19.78" />
                                  <line x1="1" y1="12" x2="3" y2="12" />
                                  <line x1="21" y1="12" x2="23" y2="12" />
                                  <line x1="4.22" y1="19.78" x2="5.64" y2="18.36" />
                                  <line x1="18.36" y1="5.64" x2="19.78" y2="4.22" />
                              </g>
                          </svg>
                      </button>
                  </div>
              </div>
            <flash-messages />
              <div class="sec-cont">
                  <slot />
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'
import Dropdown from '@/Shared/Dropdown'
import MainMenu from '@/Shared/MainMenu'
import FlashMessages from '@/Shared/FlashMessages'
import LanguageSelector from '@/Shared/LanguageSelector'
import { Link } from '@inertiajs/vue3'
import moment from 'moment'

export default {
    components: {
        Dropdown,
        FlashMessages,
        Icon,
        Logo,
        Link,
        MainMenu,
        LanguageSelector,
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
            time: '',
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
        generateGreetings(){
            const currentHour = this.moment().format('HH')
            if (currentHour >= 3 && currentHour < 12){
                return 'Good Morning'
            } else if (currentHour >= 12 && currentHour < 15){
                return 'Good Noon'
            }else if (currentHour >= 15 && currentHour < 18){
                return 'Good Afternoon'
            }   else if (currentHour >= 18 && currentHour < 20){
                return 'Good Evening'
            } else {
                return 'Hello'
            }
        },
        switchMode(){
            this.current_mode = this.current_mode === 'light' ? 'dark' : 'light'
            localStorage.setItem('current_mode', this.current_mode)
        },
        detectCurrentUrl(){
            const url = this.$page.url;
            const splitUrl = url.split('/');
            let editString = ['edit', 'create'].includes(url.substring(url.lastIndexOf("/") + 1));
            if(!editString){
                editString = splitUrl[splitUrl.length - 2] === 'tickets';
            }
            let editRoute = url.split('/')[2]
            if(['settings','front_pages'].includes(editRoute)){
                editRoute = url.split('/')[3];
            }
            this.edit_route = editString? editRoute : '';
        },
    },
    updated() {
        this.detectCurrentUrl()
    },
    created() {
        this.moment = moment;
        let vm = this
        if(localStorage.getItem('current_mode')){
            this.current_mode = localStorage.getItem('current_mode')
        }
        vm.time = vm.moment().format('MMMM Do YYYY, h:mm A')
        window.setInterval(function () {
            vm.time = vm.moment().format('MMMM Do YYYY, h:mm A')
        }, 1000)
        this.detectCurrentUrl()
    }
}
</script>
