<template>
    <button 
        class="text-red-600 hover:text-red-900  mr-5"
        @click="eliminarVacante"  
    >Delete</button>
</template>
<script>
export default {
    props:['vacanteId'],
    methods:{
        eliminarVacante(){
            
            this.$swal.fire({
                title: 'Do you want to delete it',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.value) {

                    const params = {
                        id:this.vacanteId,
                        _method:'delete'
                    }

                    axios.post('/vacantes/'+this.vacanteId,params)
                        .then(respuesta => {
                            this.$swal.fire(
                                'Deleted!',
                                'Your vacant has been deleted.',
                                'success'
                            );

                            //eliminar el vacante
                            this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                        })
                        .catch(error => {

                        })
                    
                }
                })
        }
    }
}
</script>