<template>

    <div class="text-base text-black dark:text-white dark:bg-slate-900 layout_landing " :class="current_mode" :dir="$page.props.dir">
        <!-- Start Navbar -->
        <top-nav />
        <!-- End Navbar -->

        <!--success message -->
        <flash-messages />
        <!--success message -->

        <!--main content-->
        <slot />
        <!--main content-->
        <!-- footer -->
        <footer-section :footer="footer" />
        <!-- footer -->

        <!-- Back to top -->
        <a id="back-to-top" @click="topFunction" href="javascript:void(0)" class="back-to-top flex fixed hidden bottom-5 right-5 left-auto z-[999] h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark">
            <span class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"></span>
        </a>
        <!-- Back to top -->


        <span class="disabled_button"></span>


    </div>
</template>

<script>
import Icon from '@/Shared/Icon'
import Logo from '@/Shared/Logo'
import TopNav from '@/Shared/Landing/TopNav'
import FooterSection from '@/Shared/Landing/FooterSection'
import Switcher from '@/Shared/Landing/Switcher'
import { Link } from '@inertiajs/vue3'
import FlashMessages from '@/Shared/FlashMessages'
import moment from 'moment'

export default {
    components: {
        Icon,
        Logo,
        Link,
        TopNav,
        FooterSection,
        Switcher,
        FlashMessages,
    },
    props: {
        title: String,
        footer: Object,
    },
    data() {
        return{
            current_mode: 'light',
            current_chat: null,
            open_chat: false,
            unread_count: 0,
            chat_id: 0,
            message: null,
            init_user:{
                firstName: '',
                lastName: '',
                email: '',
            },
        }
    },
    mounted() {

    },
    methods:{
        scrollFunction() {
            const mybutton = document.getElementById("back-to-top");
            if(mybutton!=null){
                if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                    mybutton.classList.add("block");
                    mybutton.classList.remove("hidden");
                } else {
                    mybutton.classList.add("hidden");
                    mybutton.classList.remove("block");
                }
            }
        },
        topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        },
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
        this.moment = moment
        const vm = this;
        window.onscroll = function () {
            vm.scrollFunction();
        }
    }
}
</script>
