<template>
    <vue-dropzone ref="myVueDropzone" id="dropzone" :options="dropzoneOptions"></vue-dropzone>
</template>


<script>

import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

export default {
    name: 'Dropzone',
    components: {
        vueDropzone: vue2Dropzone
    },
    data(){
        return {
            dropzoneOptions: {
                url: window.location.origin,
                thumbnailWidth: 150,
                maxFilesize: 0.5
            }
        }
    },
}
</script>