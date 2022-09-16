<template>
  <div class="m-auto w-[100%]">
    <div class="shadow-md bg-[#eee] mt-5 mb-5 py-5 px-10 rounded-md" @mouseover="isHover = true" @mouseout="isHover = false">
      <div v-show="isHover" class="absolute float-right ml-[13rem] mt-[-1rem]">
          <fa icon="trash-alt" @click="deleteStudyBackground(studyBackground.id)" class="fa fa-trash text-[#e04] p-2 text-[1.2rem] rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" />
          <!--==================== Edit alumni experience ================= -->
          <fa icon="pencil" class="fa fa-pencil text-[#0062ff] text-[1.2rem] p-2 rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" />
      </div>
      <div class="flex flex-col	text-center">
          <fa icon="graduation-cap" class="text-2xl text-[#0062ff]" />
          <a target="_blank">
            <p class="font-medium	text-xl">{{studyBackground.school}}</p>
          </a>
          <p class="text-md">{{studyBackground.major}}</p>
          <p class="text-md">{{studyBackground.start_year}} - {{studyBackground.end_year}}</p>
      </div>
      <div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from 'sweetalert2'
export default {
  props: {
    studyBackground: Object
  },
  data() {
    return {
      isHover: null,
    };
  },
  methods:{
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