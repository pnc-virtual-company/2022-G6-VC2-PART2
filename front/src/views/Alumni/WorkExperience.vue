<template>
      <div class="shadow-md bg-[#eee] mt-5 mb-5 py-5 px-10 rounded-md flex items-center justify-between" @mouseover="showAction = true" @mouseleave="showAction = false">
        <div class="flex items-center justify-start">
          <div class="rounded-full w-[5rem] h-[5rem]" >
            <img class="rounded-full border border-gray-100 shadow-sm  w-[5rem] h-[5rem] mr-3" src="@/assets/pnc-logo.jpg" />    
          </div>
          <div class="ml-3">
            <a :href="workExperience.company_link" target="_blank">
              <p class="font-medium	text-lg">{{workExperience.company}}</p>
            </a>            
            <p >{{formatYear(workExperience.start_year)}} <span v-if="workExperience.end_year != null">- {{formatYear(workExperience.end_year)}}</span></p>
          </div>
        </div>
        <div>
          <p class="font-medium	text-lg">{{workExperience.position}}</p>
          <p v-if="workExperience.end_year != null">{{workExperience.duration}}</p>
          <p v-else>Present</p>
        </div>
        <div v-show="showAction" class="flex justify-end items-center w-[45%] mt-[-5rem] absolute">
            <fa icon="trash-alt" class="fa fa-trash text-[#e04] p-2 text-[1.2rem] rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" @click="deleteExperience(workExperience.id)"/>
            <!--==================== Edit alumni experience ================= -->
            <fa icon="pencil" class="fa fa-pencil text-[#0062ff] text-[1.2rem] p-2 rounded-full ml-3 shadow-lg bg-[#ddd] cursor-pointer" @click="showForm('edit', workExperience)" />
        </div>
      </div>
</template>

<script>
import moment from 'moment';
import Swal from 'sweetalert2'
export default {
  props: {
    workExperience: {},
  },
  emits: ['show','deleteExperience', 'uploadImage'],
  data() {
    return {
      show: false,
      durationWork:'',
      showAction: false,
      start_year: '',
      end_year: '',
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
        confirmButtonColor: '#0062ff',
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
    },
    formatYear(value) {
      return moment(String(value)).format('MMMM YYYY')
    }
  },
}
</script>