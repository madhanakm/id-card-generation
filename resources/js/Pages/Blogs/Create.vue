<template>
  <div>
    <Head :title="__(title)" />
    <div class="bg-white rounded-md shadow overflow-hidden max-w-full">
      <form @submit.prevent="store">
        <div class="p-8 -mr-6 -mb-8 flex flex-wrap">
          <text-input v-model="form.title" :error="form.errors.title" class="pr-6 pb-8 w-full lg:w-2/3" label="Title" />

            <select-input v-model="form.type_id" :error="form.errors.type_id" class="pr-6 pb-8 w-full lg:w-1/3" :label="__('Type')" :required="true">
                <option :value="null">Select type</option>
                <option v-for="s in types" :key="s.id" :value="s.id">{{ s.name }}</option>
            </select-input>

            <div class="pr-6 pb-8 w-full">
                <label class="form-label" >Details:</label>
                <ckeditor id="ticketDetails" :editor="editor" v-model="form.details" :error="form.errors.details" :config="editorConfig"></ckeditor>
            </div>

            <file-input v-model="form.image" :error="form.errors.image" class="pb-8 pr-6 w-full lg:w-1/3" type="file" accept="image/*" label="Feature image" />

        </div>
        <div class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex justify-end items-center">
          <loading-button :loading="form.processing" class="btn-indigo" type="submit">Create Post</loading-button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
import Layout from '@/Shared/Layout'
import TextInput from '@/Shared/TextInput'
import SelectInput from '@/Shared/SelectInput'
import TextareaInput from '@/Shared/TextareaInput'
import LoadingButton from '@/Shared/LoadingButton'
import FileInput from '@/Shared/FileInput'
import { Link, Head } from '@inertiajs/vue3'
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import UploadAdapter from '@/Shared/UploadAdapter';

export default {
  metaInfo: { title: 'Create a new post' },
  components: {
      LoadingButton,
      SelectInput,
      TextareaInput,
      TextInput,
      FileInput,
      Link,
      Head,
  },
  layout: Layout,
  props: {
      title: String,
      types: Array
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
        title: null,
          type_id: null,
          image: null,
        details: ''
      }),
    }
  },
  methods: {
      uploader(editor) {
          editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
              return new UploadAdapter( loader );
          };
      },
    store() {
      this.form.post(this.route('posts.store'))
    },
  },
}
</script>
