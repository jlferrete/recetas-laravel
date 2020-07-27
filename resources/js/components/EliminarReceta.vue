<template>
    <input 
        type="submit" 
        class="btn btn-danger mr-1 d-block w-100 mb-2" 
        value="Eliminar ×">
</template>

<script>

    export default {
        props: ['recetaId'],
        mounted() {
            console.log('receta actual', this.recetaId)
        },   
    }
</script>