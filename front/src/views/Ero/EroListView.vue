<template>
  <div class="bg-[#fff] w-[60%] m-auto p-5 rounded-lg shadow-xl">
    <div class="flex justify-between font-bold text-center text-[#0062ff] text-2xl"> Ero List
     <fa icon="plus" class="w-[1rem] h-[1rem] text-white bg-[gray] p-2 rounded-full" @click="show = true"/>
    </div>
    <div class="m-auto w-[100%] flex justify-end"></div>
    <div class="m-auto w-[100%]" >
      <EroList v-for:="ero in eros" :ero="ero" 
       @deleteEro = "deleteEro"
      />
    </div>
  </div>
  <section v-if="show" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> 
    <EroForm 
      @onClick="hide"
      @addUserEro="addUserEro"
    />      
  </section>
</template>

<script>
import axios from '../../axios-http'
import EroList from './EroList.vue';
import EroForm from './EroForm.vue'
export default {
  data() {
    return {
      eros: [],
      show: false,
    };
  },
  components: {
    EroList,
    EroForm
  },
  methods: {
    //======================= show create ero form =====================
    hide(value){
      this.show=value
    },
    //====================== add ero ==============================
    addUserEro(firstName,lastName,email,role,gender,phone,telegram){
      let user = {firstName:firstName, lastName:lastName, email:email, role:role,password:'12345678',gender:gender, phone:phone,telegram:telegram}
      axios.post('user',user)
      .then((res)=> {
        console.log(res.data.sms.id);

          this.getData()
          this.show=false
            })
    },
    //====================== delete ero ==============================
    deleteEro(userId,eroId){
      axios.delete('user/'+ userId)
      .then(()=>{
        axios.delete('ero/'+ eroId);
        this.getData()
      })
      
    },
    //=====================getdata  form functions =================
    getData() {
      axios.get("ero").then((res) => {
        this.eros = res.data;
      });
    },
  },
  created() {
    this.getData();
  },
};
</script>
