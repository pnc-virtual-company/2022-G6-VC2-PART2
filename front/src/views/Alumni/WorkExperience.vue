<template>
  <div class="bg-[#fff] w-[60%] m-auto p-5 rounded-lg shadow-xl">
    <h1 class="font-bold text-center text-[#0062ff] text-2xl">WORK EXPERIENCE</h1>
    <div class="m-auto w-[100%] flex justify-end">
      <!--================== option content create form ============= -->
      <fa icon="plus" class="text-[1.2rem]  text-black bg-[#ddd] p-2 rounded-full cursor-pointer" @click="showForm('create')"/>
    </div>
    <div  v-if="workExperiences !==[]" class="m-auto w-[100%]" v-for:="workExperience in workExperiences.slice().reverse()">
      <div class="shadow-xl bg-[#eee] mt-5 mb-5 py-5 px-10 rounded-md flex items-center justify-between">
        <div class="flex items-center justify-start">
          <div class="rounded-full w-[5rem] h-[5rem]" >
            <img class="rounded-full border border-gray-100 shadow-sm  w-[5rem] h-[5rem] mr-3" src="@/assets/pnc-logo.jpg" />    
          </div>
          <div class="ml-3">
            <a :href="workExperience.company_link" target="_blank">
              <p class="font-medium	text-lg">{{workExperience.company}}</p>
            </a>            
            <p >{{workExperience.start_year}} - {{workExperience.end_year}}</p>

          </div>
        </div>
        <div>
          <p class="font-medium	text-lg">{{workExperience.position}}</p>
          <p>{{workExperience.duration}}</p>
        </div>
        <div>
            <fa icon="trash-alt" class="fa fa-trash text-[#e04] p-2 text-[1.2rem] rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" @click="deleteExperience(workExperience.id)"/>
            <!--==================== Edit alumni experience ================= -->
            <fa icon="pencil" class="fa fa-pencil text-[#0062ff] text-[1.2rem] p-2 rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" @click="showForm('edit', workExperience)" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
  props: {
    workExperiences: [],
  },
  emits: ['show','deleteExperience', 'uploadImage'],
  data() {
    return {
      url: "http://127.0.0.1:8000/api/",
      show: false,
      durationWork:'',
    };
  },
  methods:{
  //===================== show  form functions =================
    showForm(type, experience) {
      this.$emit('show', true, type, experience);
    },
  //===================== delete experience one by one ===========
    deleteExperience(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          this.$emit('deleteExperience', id);
        }
      })
    },
    // ==============Uplaod Profile Company================
    uplaodImage(profile, id) {
      this.$emit('uploadImage', profile, id);
    }
  },
}
</script>