<template>
    <div>
        <Head title="Services" />
        <!-- Start Hero -->
        <section class="relative table w-full py-20 lg:py-24 bg-gray-50 dark:bg-slate-800">
            <div class="container">
                <div class="grid grid-cols-1 pb-8 text-center mt-10">
                    <h5 class="text-lg font-medium">What We Offer ?</h5>
                    <h3 class="mt-2 md:text-4xl text-3xl md:leading-normal leading-normal font-medium">Our Services</h3>
                </div><!--end grid-->
            </div><!--end container-->

        </section><!--end section-->
        <div class="relative">
            <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
                <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>

        <!-- End Hero -->

        <!-- Start Section-->
        <section class="relative md:py-24 py-16">
            <div class="container">
                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                    <div v-for="(service, si) in page.services" :key="si" class="p-6 transition duration-500 rounded-2xl mt-6 text-center" v-bind:class="{'shadow-xl shadow-gray-100 dark:shadow-gray-800':si%2===0,'hover:shadow-xl hover:shadow-gray-100 dark:hover:shadow-gray-800':si%2!==0}">
                        <div class="w-20 h-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                            <icon class="w-8 w-8 fill-indigo-600" :name="service.icon" />
                        </div>

                        <div class="content mt-7">
                            <h2 class="title h5 text-lg font-medium hover:text-indigo-600">{{ service.name }}</h2>
                            <p class="text-slate-400 mt-3" v-html="sanitizeHtml(service.details)"></p>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->


            <div class="container md:mt-24 mt-16">
                <div class="grid grid-cols-1 text-center">
                    <h6 class="text-indigo-600 text-sm font-bold mb-2">{{ page.contact.tag }}</h6>
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold" v-html="sanitizeHtml(page.contact.title)"></h3>

                    <p class="text-slate-400 max-w-xl mx-auto" v-html="sanitizeHtml(page.contact.details)"></p>

                    <div class="mt-6">
                        <a :href="route('contact')" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mr-2 mt-2"><i class="uil uil-phone"></i> Contact Us</a>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Section-->
    </div>
</template>
<script>
import Layout from '@/Shared/Landing/Layout'
import Icon from '@/Shared/Icon'
import { Head } from '@inertiajs/vue3'
import sanitizeHtml from "sanitize-html";
export default {
    layout: Layout,
    props: {
        data: Object,
    },
    components: {
        Icon,
        Head,
    },
    data() {
        return {
            page: JSON.parse(this.data.html)
        }
    },
    methods: {
        sanitizeHtml : sanitizeHtml
    }
}
</script>
