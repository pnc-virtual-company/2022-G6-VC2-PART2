<template>
    <div class="mt-[3.5rem] w-[80%] mx-auto">
        <filterAlumni/>
        <div class="mt-4 mx-auto bg-slate-50 rounded-lg p-2.5 ">
            <CardAlumni :alumniData='alumniData'/>
        </div>
    </div>
</template>
<script>
import axios from '../../axios-http'
import filterAlumni from "../Ero/FilterAlumni.vue"
import CardAlumni from "../Ero/ListALumniCard.vue"
export default ({
    components: {filterAlumni,CardAlumni},
    data(){
        return{
            alumniData:[]
        }
    },
    methods:{
        getAlumni(){
            axios.get('alumni').then((res)=>{
                this.alumniData=res.data
            }).catch((error)=>{
                console.log(error);
            })
        }
    },
    created(){
        this.getAlumni()
    }
})
</script>
