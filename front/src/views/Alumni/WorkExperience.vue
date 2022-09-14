<template>
  <div class="bg-[#fff] w-[60%] m-auto p-5 rounded-lg shadow-xl">
    <h1 class="font-bold text-center text-[#0062ff] text-2xl">WORK EXPERIENCE</h1>
    <div class="m-auto w-[100%] flex justify-end">
      <!--================== option content create form ============= -->
      <fa icon="plus" class="w-[1.8rem] h-[1.8rem] text-white bg-[#0062ff] p-2 rounded-full cursor-pointer" @click="showForm('create')"/>
    </div>
    <div  v-if="workExperiences !==[]" class="m-auto w-[100%]" v-for:="workExperience in workExperiences.slice().reverse()">
      <div class="shadow-xl bg-[#eee] mt-5 mb-5 py-5 px-10 rounded-md flex items-center justify-between">
        <div class="flex items-center justify-start">
          <img class="rounded-full w-[5rem] mr-3 border border-[#ddd]" src="https://res.cloudinary.com/crunchbase-production/image/upload/c_lpad,h_170,w_170,f_auto,b_white,q_auto:eco,dpr_1/81991fd67e25ba7dbdb6" alt="">
          <div>
            <a :href="workExperience.company_link" target="_blank">
              <p class="font-medium	text-lg">{{workExperience.company}}</p>
            </a>
            <p class="">{{workExperience.start_year}} - {{workExperience.end_year}}</p>
          </div>
        </div>
        <div>
          <p class="font-medium	text-lg">{{workExperience.position}}</p>
          <p>4 years</p>
        </div>
        <div>
            <fa icon="trash-alt" class="fa fa-trash text-[#e04] p-3 text-[1.4rem] rounded-full ml-3 shadow-lg bg-[#ddd]" @click="deleteExperience(workExperience.id)"/>
            <!--==================== Edit alumni experience ================= -->
            <fa icon="pencil" class="fa fa-pencil text-[#0062ff] text-[1.4rem] p-3 rounded-full ml-3 shadow-lg bg-[#ddd]" @click="showForm('edit', workExperience)" />
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
  emits: ['show','deleteExperience'],
  data() {
    return {
      show: false,
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
  },
  }
</script>