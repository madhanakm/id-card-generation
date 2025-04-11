<template>
    <div>
        <!-- Start Hero -->
        <Head title="Home" />
        <!-- Start Hero -->
        <section class="relative table w-full py-20">
            <div class="container">
                <div class="grid grid-cols-1 text-center mt-10">
                    <h3 class="text-3xl leading-normal font-semibold">{{ __('Create a ticket') }}</h3>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="relative">
            <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-gray-50 dark:text-slate-800">
                <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End Hero -->

        <!-- Start -->
        <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800" id="ticketSubmit">
            <div class="container">
                <form class="card mt-2 p-4 rounded shadow-xl overflow-hidden" @submit.prevent="store" enctype="multipart/form-data">
                    <div class="px-5 pt-8">
                        <div class="flex flex-wrap">
                            <text-input v-model="form.first_name" :error="form.errors.last_name" class="pr-6 pb-5 md:col-span-6 lg:w-1/3" label="First name" />
                            <text-input v-model="form.last_name" :error="form.errors.last_name" class="pr-6 pb-5 md:col-span-6 lg:w-1/3" label="Last name" />
                            <text-input v-model="form.email" :error="form.errors.email" class=" pb-5 md:col-span-6 lg:w-1/3" label="Email Address" />
                            <text-input v-model="form.subject" :error="form.errors.subject" class=" pb-5 w-full" label="Subject" />

                            <select-input v-model="form.department_id" :error="form.errors.department_id" class="pr-6 pb-5 md:col-span-6 lg:w-1/3" label="Department">
                                <option :value="null">Select a department</option>
                                <option v-for="department in departments" :key="department.id" :value="department.id">{{ department.name }}</option>
                            </select-input>

                            <select-input v-model="form.type_id" :error="form.errors.type_id" class="pr-6 pb-5 md:col-span-6 lg:w-1/3" label="Ticket type">
                                <option :value="null">Select a type</option>
                                <option v-for="type in types" :key="type.id" :value="type.id">{{ type.name }}</option>
                            </select-input>

                            <select-input v-model="form.category_id" :error="form.errors.category_id" class=" pb-5 md:col-span-6 lg:w-1/3" label="Category">
                                <option :value="null">Select a category</option>
                                <option v-for="category in categories" :key="category.id" :value="category.id">{{ category.name }}</option>
                            </select-input>

                            <div class=" pt-2 pb-8 w-full">
                                <label class="form-label" >Request Details:</label>
                                <ckeditor id="ticketDetails" :editor="editor" v-model="form.details" :error="form.errors.details" :config="editorConfig"></ckeditor>
                            </div>

                        </div>

                        <!-- Attachments -->
                        <input ref="file" type="file" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf, .zip" class="hidden" multiple="multiple" @change="fileInputChange" />
                        <div class="pr-6 pb-8 w-full lg:w-full flex-col">
                            <button type="button" class="btn flex justify-center items-center border-0" @click="fileBrowse">
                                <icon name="file" class="flex-shrink-0 h-8 fill-gray-400 pr-1" /> <h4>{{ __('Attach files') }}</h4>
                            </button>
                            <div v-if="form.files.length" class="flex items-center justify-between pr-6 pt-8 w-full lg:w-1/2" v-for="(file, fi) in form.files" :key="fi">
                                <div class="flex-1 pr-1">
                                    {{ file.name }} <span class="text-gray-500 text-xs">({{ getFileSize(file.size) }})</span>
                                </div>
                                <button type="button" class="btn flex justify-center items-center" @click="fileRemove(file, fi)">
                                    {{ __('Remove') }}</button>
                            </div>
                        </div>
                        <!-- Attachments -->
                    </div>
                    <div class="px-10 py-4 border-t border-gray-100 flex">
                        <loading-button :loading="form.processing" class="ml-auto btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mr-2 mt-2" type="submit">Submit</loading-button>
                    </div>

                </form>
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <div class="relative">
            <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-gray-50 dark:text-slate-800">
                <svg class="w-full h-auto" viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End -->

        <!-- Start -->
        <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800">
            <div class="container md:mt-24 mt-16 md:mb-12">
                <div class="grid grid-cols-1 text-center">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Have Question ? Get in touch!</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">Start working with HelpDesk that can provide everything you need to generate awareness, drive traffic, connect.</p>

                    <div class="mt-6">
                        <Link :href="route('contact')" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mr-2 mt-2"><i class="uil uil-phone"></i> Contact us</Link>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <div class="relative">
            <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-dark-footer">
                <svg class="w-full h-auto" viewBox="0 0 2880 250" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M720 125L2160 0H2880V250H0V125H720Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End -->

    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/vue3'
import Logo from '@/Shared/Logo'
import Layout from '@/Shared/Landing/Layout'
import Icon from '@/Shared/Icon'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import LoadingButton from '@/Shared/LoadingButton'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import UploadAdapter from '@/Shared/UploadAdapter';
export default {
    metaInfo: { title: 'Home' },
    layout: Layout,
    components: {
        Logo,
        Icon,
        LoadingButton,
        SelectInput,
        TextInput,
        Head,
        Link,
    },
    props: {
        categories: Array,
        departments: Array,
        types: Array,
        title: String,
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
            form: this.$inertia.form({
                first_name: '',
                last_name: '',
                email: '',
                department_id: null,
                category_id: null,
                type_id: null,
                subject: null,
                details: '',
                files: [],
            }),
        }
    },

    methods: {
        uploader(editor) {
            editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
                return new UploadAdapter( loader );
            };
        },
        uploadFiles() {
            this.form.files = this.$refs.files.files
        },
        store() {
            this.form.post(this.route('ticket_store'),{
                onSuccess: () => {
                    this.form.reset()
                },
                // form.reset()
            })
        },
        fileInputChange(e) {
            let selectedFiles = e.target.files;
            for (let i = 0; i < selectedFiles.length; i++) {
                this.form.files.push(selectedFiles[i]);
            }
        },
        fileRemove(image, index) {
            this.form.files.splice(index, 1);
        },
        getFileSize(size) {
            const i = Math.floor(Math.log(size) / Math.log(1024))
            return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i]
        },
        fileBrowse() {
            this.$refs.file.click()
        },
    },
}
</script>




