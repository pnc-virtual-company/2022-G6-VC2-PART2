<template>
  <div class="bg-[#fff] w-[60%] m-auto p-5 rounded-lg shadow-xl">
    <h1 class="font-bold text-center text-[#0062ff] text-2xl">STUDY BACKGROUND</h1>
    <div class="m-auto w-[100%] flex justify-end">
      <!--================== option content create form ============= -->
      <fa icon="plus" class="w-[1.8rem] h-[1.8rem] text-white bg-[#0062ff] p-2 rounded-full cursor-pointer"
        @click="showStudyBackgroundForm"
      />
    </div>
    <div  class="m-auto w-[100%]" >
      <div class="shadow-xl bg-[#eee] mt-5 mb-5 py-5 px-10 rounded-md flex items-center justify-between" v-for="studyBackground of studyBackgrounds" :key="studyBackground">
        <div class="flex items-center justify-start">
          <img class="rounded-full w-[5rem] mr-3 border border-[#ddd]" :src="studyBackground.school_logo" alt="">
          <div>
            <a target="_blank">
              <p class="font-medium	text-lg">{{studyBackground.school}}</p>
            </a>
            <p class="">{{studyBackground.start_year}} | {{studyBackground.end_year}}</p>
          </div>
        </div>
        <div>
          <p class="font-medium	text-lg">{{studyBackground.major}}</p>
          <p>4 years</p>
        </div>
        <div>
            <fa icon="trash-alt" @click="deleteStudyBackground(studyBackground.id)" class="fa fa-trash text-[#e04] p-3 text-[1.4rem] rounded-full ml-3 shadow-lg bg-[#ddd]" />
            <!--==================== Edit alumni experience ================= -->
            <fa icon="pencil" class="fa fa-pencil text-[#0062ff] text-[1.4rem] p-3 rounded-full ml-3 shadow-lg bg-[#ddd]" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
  props: {
    studyBackgrounds:Array
  },
  data() {
    return {

    };
  },
  emits: ['showForm'],
  methods:{
    showStudyBackgroundForm(){
      this.$emit('showForm', true)
    },
    //======================= delete study background =================
    deleteStudyBackground(id){
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
          this.$emit('deleteStudyBackground',id);
        }
      })
    }
  },
  }
</script>