<template>
    <nav id="topnav" class="ud-header absolute top-0 left-0 z-40 flex w-full items-center bg-transparent">
        <div id="dropdown" />
        <div class="container">
            <div class="relative -mx-4 flex items-center justify-between">
                <div class="w-60 max-w-full px-4">
                    <Link :href="route('home')" class="logo pl-0 mt-2 mb-2">
                        <logo class="help-desk-logo"/>
                        <logo name="white" class="help-desk-logo white"/>
                    </Link>
                </div>
                <div class="flex w-full items-center justify-between px-4">
                    <div>
                        <button
                            id="navbarToggler"
                            class="absolute right-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary lg:hidden"
                        >
                <span
                    class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                ></span>
                            <span
                                class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                            ></span>
                            <span
                                class="relative my-[6px] block h-[2px] w-[30px] bg-white"
                            ></span>
                        </button>
                    </div>
                    <div class="justify-end pr-16 sm:flex lg:pr-0">
                        <nav
                            id="navbarCollapse"
                            class="absolute right-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6"
                        >
                            <ul class="blcok lg:flex">
                                <li class="group relative" :class="{'active' : active_menu === 'home'}" @click="active_menu = 'home'">
                                    <Link :href="route('home')" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">{{ __('Home') }}</Link>
                                </li>
                                <li class="group relative" :class="{'active' : active_menu === 'faq'}" @click="active_menu = 'faq'">
                                    <Link :href="route('faq')" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">{{ __('FAQ') }}</Link>
                                </li>
                                <li class="group relative" :class="{'active' : active_menu === 'blog'}" @click="active_menu = 'blog'">
                                    <Link :href="route('blog')" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">{{ __('Blog') }}</Link>
                                </li>
                                <li class="group relative" :class="{'active' : active_menu === 'contact'}" @click="active_menu = 'contact'">
                                    <Link :href="route('contact')" class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">{{ __('Contact') }}</Link>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </nav>
<!--    <nav id="topnav" class="defaultscroll is-sticky">-->
<!--        <div id="dropdown" />-->
<!--        <div class="container">-->
<!--            &lt;!&ndash; Logo container&ndash;&gt;-->
<!--            <Link :href="route('home')" class="logo pl-0 mt-2 mb-2">-->
<!--                <logo class="help-desk-logo" />-->
<!--            </Link>-->

<!--            &lt;!&ndash; End Logo container&ndash;&gt;-->
<!--            <div class="menu-extras">-->
<!--                <div class="menu-item">-->
<!--                    &lt;!&ndash; Mobile menu toggle&ndash;&gt;-->
<!--                    <div class="navbar-toggle cursor-pointer" id="isToggle" @click="toggleMenu">-->
<!--                        <div class="lines">-->
<!--                            <span></span>-->
<!--                            <span></span>-->
<!--                            <span></span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    &lt;!&ndash; End mobile menu toggle&ndash;&gt;-->
<!--                </div>-->
<!--            </div>-->

<!--            <div id="navigation">-->
<!--                &lt;!&ndash; Navigation Menu&ndash;&gt;-->
<!--                <ul class="navigation-menu">-->
<!--                    <li :class="{'active' : active_menu === 'home'}"><Link :href="route('home')" @click="active_menu = 'home'" class="sub-menu-item">Home</Link></li>-->
<!--                    <li :class="{'active' : active_menu === 'kb'}"><Link :href="route('kb')" @click="active_menu = 'kb'" class="sub-menu-item">{{ __('Knowledge') }}</Link></li>-->
<!--                    <li :class="{'active' : active_menu === 'faq'}"><Link :href="route('faq')" @click="active_menu = 'faq'" class="sub-menu-item">FAQs</Link></li>-->
<!--                    <li :class="{'active' : active_menu === 'blog'}"><Link :href="route('blog')" @click="active_menu = 'blog'" class="sub-menu-item">Blog</Link></li>-->
<!--                    <li :class="{'active' : active_menu === 'contact'}"><Link :href="route('contact')" @click="active_menu = 'contact'" class="sub-menu-item">Contact</Link></li>-->
<!--                </ul>&lt;!&ndash;end navigation menu&ndash;&gt;-->
<!--            </div>&lt;!&ndash;end navigation&ndash;&gt;-->


<!--        </div>&lt;!&ndash;end container&ndash;&gt;-->
<!--    </nav>-->
</template>
<script>
import Logo from '@/Shared/Logo'
import Dropdown from '@/Shared/Dropdown'
import Icon from '@/Shared/Icon'
import { Link } from '@inertiajs/vue3'
export default {
    components: {
        Logo,
        Icon,
        Dropdown,
        Link
    },
    data(){
        return {
            active_menu: 'home'
        }
    },
    methods: {
        toggleMenu() {
            document.getElementById('isToggle').classList.toggle('open');
            var isOpen = document.getElementById('navigation')
            if (isOpen.style.display === "block") {
                isOpen.style.display = "none";
            } else {
                isOpen.style.display = "block";
            }
        },
        windowScroll() {
            const navbar = document.getElementById("topnav");
            if (navbar != null) {
                if (
                    document.body.scrollTop >= 50 ||
                    document.documentElement.scrollTop >= 50
                ) {
                    navbar.classList.add("sticky");
                } else {
                    navbar.classList.remove("sticky");
                }
            }
        }
    },
    mounted() {
      this.active_menu = this.$page.url.substr(1) || 'home'
    },
    created() {
        window.addEventListener('scroll', (ev) => {
            ev.preventDefault();
            this.windowScroll();
        })

        window.onload = function(){
            const navbarToggler = document.getElementById('navbarToggler')
            const navbarCollapse = document.getElementById("navbarCollapse")
            navbarToggler.onclick = function() {
                navbarToggler.classList.toggle("navbarTogglerActive")
                navbarCollapse.classList.toggle("hidden")
            }
        }
    }
}
</script>
