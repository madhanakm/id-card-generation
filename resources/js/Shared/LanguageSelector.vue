<template>
    <div class="ml-4">
        <select @change="handleSelect($event)" v-model="selectable_locale" class="language_switcher">
            <option v-for="language in languages" :value="language.code">
                <icon class="w-5 h-5" :name="language.code" /> {{ language.name }}
            </option>
        </select>
    </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
    components: {
        Icon,
    },

    data() {
        return{
            selectable_locale: this.$page.props.locale,
            languages: [
                {name: 'Chinese', code: 'cn'},
                {name: 'English', code: 'en'},
            ]
        }
    },

    methods: {
        handleSelect(event) {
            window.location.replace('/language/' + event.target.value)
        },
    }
}
</script>
