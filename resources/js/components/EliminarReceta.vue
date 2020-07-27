<template>
    <input 
        type="submit" 
        class="btn btn-danger mr-1 d-block w-100 mb-2" 
        value="Eliminar ×"
        @click="eliminarReceta"    
    >
</template>

<script>

    export default {
        props: ['recetaId'],
        methods : {
            eliminarReceta(){
                this.$swal({
                    title: '¿Deseas eliminar esta receta?',
                    text: "Una vez eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.value) {
                        
                        //Enviar petición al servidor
                        
                        
                        this.$swal({
                            title: 'Receta Eliminada',
                            text: 'Se eliminó la receta',
                            icon: 'success'
                        })
                    }
                })
            }
        }
    }
</script>