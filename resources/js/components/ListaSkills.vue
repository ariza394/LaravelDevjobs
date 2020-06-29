<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li 
                v-for="(skill, i) in this.skills" 
                v-bind:key="i"
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class="verificarClaseActiva(skill)"
                @click="activar($event)"
            >{{skill}}</li>
        </ul>
        <input type="hidden" name="skills" id="skills">
    </div>
</template>

<script>
export default {
    props:['skills','oldskills'],
    data(){
        return{
            habilidades:new Set()
        }
    },
    created:function(){
        if(this.oldskills){
            const skillsArray = this.oldskills.split(',');
            console.log(skillsArray);
            console.log('aca');
            skillsArray.forEach(skill => this.habilidades.add(skill));
        }
    },
    mounted:function(){
        document.querySelector('#skills').value = this.oldskills;
    },
    methods:{
        activar(e){
            if(e.target.classList.contains('bg-teal-400')){

                //elimina clase
                e.target.classList.remove('bg-teal-400');

                //agrega al set de habilidades
                this.habilidades.delete(e.target.textContent);

            }else{

                //agrega clase
                e.target.classList.add('bg-teal-400');

                //agrega al set de habilidades
                this.habilidades.add(e.target.textContent);
            }

            //agrega habilidades
            const stringhabilidades = [...this.habilidades];
            document.querySelector('#skills').value = stringhabilidades;            
        },
        verificarClaseActiva(skill){
            return this.habilidades.has(skill) ? 'bg-teal-400' : ''
        }
    }
}
</script>