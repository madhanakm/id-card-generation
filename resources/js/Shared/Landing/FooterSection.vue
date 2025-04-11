
<template>

    <footer class="wow fadeInUp relative z-10 bg-footer-black pt-20 lg:pt-[80px]" data-wow-delay=".15s">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-4/12 xl:w-4/12">
                    <div class="mb-10 w-full">
                        <Link :href="route('home')" class="mb-6 inline-block">
                            <logo class="help-desk-logo" />
                        </Link>
                        <p class="mb-7 text-base text-[#f3f4fe]" v-html="section.footer_text"></p>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-4/12 xl:w-4/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-white">Usefull Links</h4>
                        <ul>
                            <li><a :href="route('terms_service')" class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">{{ __('Terms of Services') }}</a></li>
                            <li><a :href="route('privacy')" class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">{{ __('Privacy Policy') }}</a></li>
                            <li><a :href="route('blog')" class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">{{ __('Blog') }}</a></li>
                            <li><a :href="route('login')" class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">{{ __('Login') }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-4/12 xl:w-4/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-white">Newsletter</h4>
                        <p class="mt-5 text-white">Join our newsletter service.</p>
                        <form @submit.prevent="subscribe">
                            <div class="grid grid-cols-1">
                                <div class="foot-subscribe my-3">
                                    <label class="form-label text-white">Your email address <span class="text-red-600">*</span></label>
                                    <div class="form-icon relative mt-2 text-white">
                                        <icon class="w-4 w-4 absolute top-3 left-4 z-1 fill-white" name="send_plan" />
                                        <input type="email" v-model="form.email" class="form-input bg-gray-800 border border-white pl-12 focus:shadow-none" placeholder="Email" name="email" required="">
                                    </div>
                                </div>

                                <loading-button :loading="form.processing" class="rounded-lg bg-primary py-3 px-6 text-base font-medium justify-center text-white duration-300 ease-in-out hover:bg-opacity-80" type="submit">{{ __('Submit') }}</loading-button>
                            </div>
                        </form>
                    </div><!--end col-->
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-opacity-40 py-8 lg:mt-[60px]">
            <div class="container">
                <div class="-mx-4 flex flex-wrap justify-center">
                    <div class="my-1 flex justify-center ">
                        <p class="text-base text-center text-[#f3f4fe]" v-html="section.footer_copyright"></p>
                    </div>
                </div>
            </div>
        </div>

        <div>
        <span class="absolute left-0 top-0 z-[-1]">
          <img src="/landing/images/footer/shape-1.svg" alt="" />
        </span>

            <span class="absolute bottom-0 right-0 z-[-1]">
          <img src="/landing/images/footer/shape-3.svg" alt="" />
        </span>

            <span class="absolute top-0 right-0 z-[-1]">
            <img src="/landing/images/footer/shape-2.svg" alt="" />
        </span>
        </div>
    </footer>
</template>

<script>
import Logo from '@/Shared/Logo'
import Icon from '@/Shared/Icon'
import LoadingButton from '@/Shared/LoadingButton'
import { Link } from '@inertiajs/vue3'
export default {
    components: {
        Logo, LoadingButton, Link, Icon
    },
    props: {
        footer: Object,
    },
    data() {
        return {
            section: this.$page.props.section ? JSON.parse(this.$page.props.section.html) : {
                footer_text: 'Generate your card with CardGen.',
                footer_copyright: '@ CardGen - Developed by <a href="https://w3bd.com/">W3bd</a>.',
            },
            form: this.$inertia.form({
                email: '',
            }),
        }
    },
    methods: {
        subscribe() {
            this.form.post(this.route('subscribe.news'))
            this.form.email = ''
        },
    }

}
</script>
