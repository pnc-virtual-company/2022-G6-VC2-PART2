<template>
  <div>
    <AlumniProfile @edit="showForm" @showExperience="showExperiences"/>
    <section v-if="isShow || showExperience" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> 
      <BaseForm @hideForm="hideForm" v-if="isShow" />
      <ExperienceForm v-if="showExperience" :type="type" @hideForm="hideForm" @addAlumniExperience="newAlumniExperience"/>
    </section>
  </div>
</template>

<script>
import AlumniProfile from "../components/Alumni/AlumniProfile.vue";
import BaseForm from '../components/Alumni/EditAlumniProfileForm.vue';
import ExperienceForm from '../components/Alumni/ExperienceForm.vue'
export default {
  components:{
    AlumniProfile,
    BaseForm,
    ExperienceForm,
  },
  data() {
    return {
      isShow: false,
      showExperience: false,
      type: "",
      alumniExperience:[]
    }
  },
  methods:{
    showForm() {
      this.isShow = true;
    },
    hideForm(status) {
      this.isShow = status;
      this.showExperience = status;
    },
    //
    showExperiences(status, type) {
      this.showExperience = status;
      this.type = type;
    },
    //=================== add new alumni experience =================
    newAlumniExperience(newPosition,newCompany,newStart_work,newEnd_work) {
      this.alumniExperience.push({position:newPosition,company:newCompany,start_year:newStart_work,end_year:newEnd_work});
      console.log(this.alumniExperience);
    }
  }

}
</script>

<style>

</style>