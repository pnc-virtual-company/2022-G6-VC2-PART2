<template>
  <div class="shadow-md bg-[#eee] mt-3 mb-3 py-4 rounded-md" @mouseover="isHover = true" @mouseout="isHover = false">
    <div v-show="isHover" class="absolute p-2 w-[25%] mt-[-1.2rem] flex justify-end">
        <fa icon="trash-alt" @click="deleteStudyBackground(studyBackground.id)" class="fa fa-trash text-[#e04] w-[20px] h-[20px] p-2 text-[1.2rem] rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" />
        <!--==================== Edit alumni experience ================= -->
        <fa icon="pencil" class="fa fa-pencil text-[#0062ff] text-[1.2rem] w-[20px] h-[20px] p-2 rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" @click="showEditStudyBackground('edit',studyBackground)" />
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
    showStudyBackgroundForm(type,){
      this.$emit('showForm', true,type)
    },
    //======================= delete study background =================
    deleteStudyBackground(id){
      Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0062ff',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          this.$emit('deleteStudyBackground',id);
        }
      })
    },
    //=================== show study background form =================
    showEditStudyBackground(type,studyBackground){
      // console.log(type,studyBackground)
      this.$emit('showFormEditstudybackground', true,type,studyBackground)
    }
  },
  }
</script>