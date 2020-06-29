<template>
    <div>
        <span 
            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full"
            :class="claseEstadoVacante()"
            @click="cambiarEstado()"
            :key="estadoVacanteData"  
        >
        {{estadoVacante}}
        </span>
    </div>
</template>
<script>
export default {
    props:['estado','vacanteId'],
    data(){
        return{
            estadoVacanteData:null
        }
    },
    mounted(){
        this.estadoVacanteData = Number(this.estado);
    },
    methods:{
        cambiarEstado(){
            if(this.estadoVacanteData === 0){
                this.estadoVacanteData = 1;
            }else{
                this.estadoVacanteData = 0;
            }
            //axios
            const params = {
                estado : this.estadoVacanteData
            }
            axios
                .post('/vacantes/' + this.vacanteId, params)
                .then(respuesta => console.log(respuesta))
                .catch(error => console.log(errror))   

        },
        claseEstadoVacante(){
            return this.estadoVacanteData === 1 ? "bg-green-100 text-green-800" : "bg-red-100 text-red-800";
        }
    },
    computed:{
        estadoVacante(){
            return this.estadoVacanteData === 1 ? 'Active' : 'Inactive';
        }
    }
}
</script>