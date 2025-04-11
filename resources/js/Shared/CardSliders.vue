<template>
<!--    <h2 class="flex justify-center font-bold text-3xl pb-6">Portrait Card Layout</h2>-->
<!--    <div class="flex flex-wrap gap-2 items-center justify-center w-full">-->
        <div ref="portTraitContainer" class="keen-slider">
            <card-portrait class="keen-slider__slide" v-for="cardDesign in items" :key="cardDesign" :id="cardDesign" @click="$emit(selectDesign(cardDesign))" :user="form" />
        </div>
<!--    </div>-->

<!--    <h2 class="flex justify-center pt-8 font-bold text-3xl pb-6">Landscape Card Layout</h2>-->
<!--    <div class="flex flex-wrap gap-2 items-center justify-center w-full">-->
<!--        <div ref="containerLandscape" class="keen-slider">-->
<!--            <card-landscape class="keen-slider__slide" v-for="cardDesign in allLandscapeCardDesigns" :key="cardDesign" :id="cardDesign" @click="$emit(selectDesign(cardDesign))" :user="form" />-->
<!--        </div>-->
<!--    </div>-->

</template>

<script>
import { useKeenSlider } from 'keen-slider/vue.es'
import 'keen-slider/keen-slider.min.css'
import CardPortrait from '@/Shared/CardPortrait';
import CardLandscape from '@/Shared/CardLandscape';
import {Head, Link} from '@inertiajs/vue3'


export default {
    components: {
        CardPortrait,
        CardLandscape,
        Link, Head
    },
    props:{
        form: Object,
        items: Array,
        par_page: {
            type: Number,
            default: 3,
        }
    },
    emits: ['selectDesign'],
    data(){
        return {
            allPortraitCardDesigns: [0,1,2],
            allLandscapeCardDesigns: [0,1,2,3],
        }
    },
    setup(){
        const vm = this
        const [portTraitContainer] = useKeenSlider({
            loop: true,
            mode: "snap",
            slides: {
                perView: 3,
                spacing: 0,
            },
        })
        const [landScapeContainer] = useKeenSlider({
            loop: true,
            mode: "snap",
            slides: {
                perView: 2,
                spacing: 0,
            },
        })
        return { portTraitContainer, landScapeContainer }
    }
}
</script>

