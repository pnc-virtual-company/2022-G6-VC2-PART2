<template>
  <div>
    <AlumniProfile 
      @edit="showForm" 
      @showExperience="showExperiences" 
      @deleteExperience="deleteExperience"
      :alumniData="alumniData"
      :alumniExperiences="alumniExperiences"
      :alumniInfo="alumniInfo"
    />
    <section v-if="isShow || showExperience" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> 
      <EditAlumniProfileForm @hideForm="hideForm" v-if="isShow" />
      <ExperienceForm :experience="experience" v-if="showExperience" type="edit" @hideForm="hideForm" @edit="editExperience"/>
    </section>
  </div>
</template>
<script>
import axios from "axios"
import AlumniProfile from "../Alumni/AlumniProfile.vue";
import EditAlumniProfileForm from '../Alumni/EditAlumniProfileForm.vue';
import ExperienceForm from '../Alumni/ExperienceForm.vue'
export default {
  components:{
    AlumniProfile,
    EditAlumniProfileForm,
    ExperienceForm,
  },
  data() {
    return {
      url: 'http://127.0.0.1:8000/api/',
      isShow: false,
      showExperience: false,
      experience: {},      
      profile:"" ,
      alumniData: {},
      alumniInfo: {}, 
      alumniExperiences: []
    }
  },

  methods:{
    showForm(status) {
      this.isShow = status;
    },
    hideForm(status) {
      this.isShow = status;
      this.showExperience = status;
    },
    showExperiences(status, experience) {
      this.showExperience = status;
      this.experience = experience;
      console.log('hello world');
      console.log(experience);
    },
    editExperience(data) {
      axios.put(this.url+'alumniWork/'+data.id, data)
      .then((response) => {
        console.log(response.data);
      })
      console.log('hi i am edit experience------------------------');
      console.log(data);
    },
    deleteExperience(id) {
      axios.delete(this.url+'alumniWork/'+id)
      .then((response) => {
        console.log(response.data);
        this.getData();
      })
    },
    getData() {
      axios.get(this.url+"alumni/1").then((res) => {
        this.alumniData = res.data;
        this.alumniInfo=res.data.user
        this.alumniExperiences=res.data.work_experience
        console.log(this.alumniExperiences)
      });
    },
  },
  created() {
    this.getData();
  },
}
</script>

<style>

</style>