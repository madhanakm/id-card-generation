<template>
    <div>
        <Head :title="__('Footer Area')" />
        <div class="bg-white rounded-md shadow overflow-hidden mr-2">

            <!-- New code -->
            <form @submit.prevent="update">
                <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
                    <div class="w-full mx-auto">

                        <div class="border-b border-gray-200 dark:border-gray-700 tab-head">
                            <ul class="flex flex-wrap -mb-px" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                                <li class="mr-2" role="presentation" v-for="(tab, ti) in tabs" :key="ti">
                                    <div class="inline-block text-gray-500 hover:text-gray-600 hover:border-gray-300 rounded-t-lg py-4 px-4 text-sm text-center border-transparent border-b-2 dark:text-gray-400 dark:hover:text-gray-300" :class="{'active': tab.active }" @click="activeTab(ti)">{{ tab.name }}</div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class=" p-4 t-content" :class="{'active': tabs[0].active}">
                                <textarea-input :rows="3" v-model="form.html.footer_text" class="pr-6 pb-8 w-full" :label="__('Footer text')" />
                                <text-input v-model="form.html.footer_copyright" class="pr-6 pb-8 w-full" :label="__('Copyright info')" />
                            </div>
                            <div class=" p-4 t-content" :class="{'active': tabs[1].active}">
                                <text-input v-model="form.html.faq_bottom_title" class="pr-6 pb-8 pt-5 w-full" :label="__('Bottom Title')" />
                                <textarea-input name="content" v-model="form.html.faq_bottom_text" class="pr-6 pb-8 w-full" :label="__('Bottom Text')"></textarea-input>
                                <text-input v-model="form.html.faq_bottom_button_text" class="pr-6 pb-8 pt-5 w-full" :label="__('Button Text')" />
                                <text-input v-model="form.html.faq_bottom_button_link" class="pr-6 pb-8 pt-5 w-full" :label="__('Button Link')" />
                            </div>
                            <div class=" p-4 t-content" :class="{'active': tabs[2].active}">
                                <text-input v-model="form.html.subscribe_title" class="pr-6 pb-8 pt-5 w-full " :label="__('Subscribe title')" />
                                <text-input v-model="form.html.subscribe_text" class="pr-6 pb-8 pt-5 w-full " :label="__('Subscribe text')" />
                                <text-input v-model="form.html.subscribe_button_text" class="pr-6 pb-8 pt-5 w-full " :label="__('Subscribe button text')" />
                            </div>
                        </div>

                    </div>
                </div>
                <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center">
                    <loading-button :loading="form.processing" class="btn-indigo ml-auto" type="submit">{{ __('Save') }}</loading-button>
                </div>
            </form>
            <!-- New code -->

        </div>
    </div>
</template>

<script>
import { Link, Head } from '@inertiajs/vue3'
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import LoadingButton from '@/Shared/LoadingButton'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import UploadAdapter from '@/Shared/UploadAdapter';
import TextareaInput from '@/Shared/TextareaInput'

export default {
    metaInfo: { title: 'Footer Area' },
    components: {
        TextareaInput,
        Link,
        Head,
        TextInput,
        LoadingButton,
    },
    layout: Layout,
    props: {
        page: Object,
    },
    remember: 'form',
    data() {
        return {
            editor: ClassicEditor,
            editorConfig: {
                toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'insertTable', 'blockQuote', '|', 'imageUpload', 'mediaEmbed', '|', 'undo', 'redo' ],
                table: {
                    toolbar: [ 'tableColumn', 'tableRow', 'mergeTableCells' ]
                },
                extraPlugins: [this.uploader],
            },
            tabs:[
                {'name': 'Footer', 'active': true},
                {'name': 'FAQ', 'active': false},
                {'name': 'Subscribe', 'active': false},
            ],
            form: this.$inertia.form({
                title: 'Section',
                slug: 'section',
                is_active: this.page && this.page.is_active ? this.page.is_active : true,
                html: this.page && this.page.html ? JSON.parse(this.page.html): {
                    footer_text: 'Generate your card with CardGen',
                    footer_copyright: '@ CardGen Developed by <a href="https://w3bd.com/">W3bd</a>.',
                    faq_bottom_title: 'Have Question ? Get in touch!',
                    faq_bottom_text: 'Start working with CardGen that can provide everything you need to generate card.',
                    faq_bottom_button_text: 'Contact us',
                    faq_bottom_button_link: '/contact',
                    subscribe_title: 'Subscribe our weekly subscription',
                    subscribe_text: 'Add some text to explain benefits of subscription on your services. We\'ll send you the best of our article just once a weekly.',
                    subscribe_button_text: 'Subscribe Now',
                },
            }),
        }
    },
    methods: {
        uploader(editor) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new UploadAdapter( loader );
            };
        },
        update() {
            this.form.put(this.route('front_pages.update', 'section'))
        },
        activeTab(index){
            for (const tab_item of this.tabs) {
                tab_item.active = false
            }
            this.tabs[index].active = true;
        },
    },
    mounted() {

    }
}
</script>
