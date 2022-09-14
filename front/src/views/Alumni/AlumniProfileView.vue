<template>
  <div>
    <AlumniProfile 
      @edit="showForm" 
      @showExperience="showExperiences" 
      @deleteExperience="deleteExperience"
      :alumniData="alumniData"
      :alumniExperiences="alumniExperiences"
      :alumniInfo="alumniInfo"
      :alumniSkill="alumniSkill"
      @showSkillForm="toShowSkillForm"
    />
    <section v-if="isShow || showExperience" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> 
      <EditAlumniProfileForm 
      @hideForm="hideForm" 
      v-if="isShow" 
      :alumniData="alumniData"
      :alumniInfo="alumniInfo"
      @updateAlumni='updateDataAlumni'
      />
      <ExperienceForm 
        :experience="experience" 
        v-if="showExperience" 
        :type="type" 
        @hideForm="hideForm" 
        @edit="editExperience"
        @addAlumniExperience="newAlumniExperience"
      />
    </section>
    <section v-if="showSkillForm" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
    <SkillForm @hidFormSkill="formHiden" @addSkill="newSkill"/>
  </section>
  </div>
</template>
<script>
  import axios from "axios"
  import AlumniProfile from "../Alumni/AlumniProfile.vue";
  import EditAlumniProfileForm from '../Alumni/EditAlumniProfileForm.vue';
  import ExperienceForm from '../Alumni/ExperienceForm.vue';
  import SkillForm from "./SkillForm.vue"
  export default {
    components:{
      AlumniProfile,
      EditAlumniProfileForm,
      ExperienceForm,
      SkillForm,
      
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
        alumniSkill:{},
        type: "",
        showSkillForm:false,
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
      showExperiences(status, type, experience) {
        this.showExperience = status;
        this.experience = experience;
        this.type = type;
      },
      //=================== add new experience ===================
      newAlumniExperience(newPosition,newCompany,newStart_work,newEnd_work,company_link) {
        let alumniExperience={position:newPosition,company:newCompany,start_year:newStart_work,end_year:newEnd_work,alumni_id: 1,company_link:company_link};
        console.log(alumniExperience);
        axios.post('http://127.0.0.1:8000/api/alumniWork',alumniExperience)
        .then((response) => {
          console.log(response.data);
          this.getData();
          this.hideForm();
        })
      },
      //=================== edit alumni experience ===================
      editExperience(data) {
        axios.put(this.url+'alumniWork/'+data.id, data)
        .then((response) => {
          console.log(response.data);
          this.getData();
        })
      },
      //=================== delete alumni experience ===================
      deleteExperience(id) {
        axios.delete(this.url+'alumniWork/'+id)
        .then((response) => {
          console.log(response.data);
          this.getData();
        })
      },
      //=================== get alumni experience ===================
      getData() {
        axios.get(this.url+"alumni/1").then((res) => {
          this.alumniData = res.data;
          this.alumniInfo=res.data.user
          this.alumniExperiences=res.data.work_experience
          this.alumniSkill=res.data.skill
          console.log(this.alumniSkill)
        });
      },
      //=================== update   alumni general information ===================
      updateDataAlumni(userId,alumniId,user,alumni){
        console.log(alumni)
        axios.put(this.url+"user/"+userId,user).then(()=>{
          this.getData();
        }).catch((err)=>{
          console.log(err)
        })
        axios.put(this.url+"alumni/"+alumniId,alumni).then(()=>{
          this.getData();
        })
        this.isShow = false;
    },
    //=================== hide skill form =================
    formHiden(value){
        this.showSkillForm=value;
    },
    //=================== show skill form =================
    toShowSkillForm(value){
        this.showSkillForm=value;
    },
    //=================== add new skill =================
    newSkill(newSkill){
        let alumniSkills = {title:newSkill, alumni_id:1};
        axios.post('http://127.0.0.1:8000/api/alumniSkill',alumniSkills)
        .then(()=>{
          this.formHiden(false);
          this.getData();
        })
    }
  },
    created() {
      this.getData();
    },
  }
</script>