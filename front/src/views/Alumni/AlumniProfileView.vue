<template>
  <div>
    <AlumniProfile 
      @edit="showForm" 
      :alumniData="alumniData"
      :alumniInfo="alumniInfo"
      @uploadImage="uploadImage"
      @showAlumniForm="showForm"
      :workExperiences="getCurrentWork"
    />
    <section v-if="showFormAlumni || showExperience || showSkillForm || showStudyBackground" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> 
      <!-- form for alumni general profile -->
      <EditAlumniProfileForm 
        @hideForm="hideForm" 
        v-if="showFormAlumni" 
        :alumniData="alumniData"
        :alumniInfo="alumniInfo"
        @showAlumniForm='updateDataAlumni'
        @updateAlumni="updateDataAlumni"
      />
      <!-- form for experience alumni profile -->
      <ExperienceForm 
        :experience="experience" 
        v-if="showExperience" 
        :type="type" 
        @hideForm="hideForm" 
        @edit="editExperience"
        @addAlumniExperience="newAlumniExperience"
      />
      <!-- form for skills alumni -->
      <SkillForm v-if="showSkillForm" @hidFormSkill="formHiden" @addSkill="newSkill"/>
      <StudyBackgroundForm 
        v-if="showStudyBackground" 
        @showForm='showStudyBackgroundForm'
        :alumni_key ="alumniData.id"
        @createStudy='newStudyBackground'
      />
    </section>
      <div class="w-[80%] flex items-start m-auto">
        <div class="mr-3 w-[35%]">
          <!-- GeneralInformationCard -->
          <GeneralInformationCard :alumniData="alumniData"/>
          <!-- study background card -->
          <div class="m-auto w-[100%] bg-[#fff] mt-3 p-3 rounded-md">
            <div class="flex justify-between">
              <h1 class="font-bold text-left text-[#0062ff] text-2xl">Study Background</h1>
              <!--================== option content create form ============= -->
              <fa icon="plus" class="text-[1rem] text-black bg-[#ddd] p-2 rounded-full cursor-pointer" @click="showStudyBackgroundForm"/>
            </div>
            <StudyBackground
              v-for:="studyBackground of studyBackgrounds"
              :studyBackground="studyBackground"
              class="mt-3"
              :studyBackgrounds='studyBackgrounds'
              @showForm="showStudyBackgroundForm"
              @deleteStudyBackground = "removeStudyBackground"
            />
          </div>
        </div>
        <div class="flex flex-col	w-[65%]">
          <!-- skill card -->
          <AlumniSkill 
            class=" mb-3"
            :skills="alumniSkill"
            @toShowSkillForm="toShowSkillForm"
            @deleteAlumniSkill = "removeAlumniSkill"
          />
          <div class="bg-[#fff] p-3 rounded-md">
            <h1 class="font-bold text-left text-[#0062ff] text-2xl">WORK EXPERIENCE</h1>
            <div class="m-auto w-[100%] flex justify-end">
              <!--================== option content create form ============= -->
              <fa icon="plus" class="text-[1.2rem] mt-[-2.3rem] text-black bg-[#ddd] p-2 rounded-full cursor-pointer" @click="showExperiences(true, 'create')"/>
            </div>
            <!-- experience card -->
            <WorkExperience 
              v-for:="workExperience in alumniExperiences.slice().reverse()" 
              :workExperience="workExperience"
              @show="showExperiences"
              @deleteExperience="deleteExperience"
              @uploadImage="uploadCompanyProfile"
            />
          </div>
        </div>
      </div>
    </div>
</template>
<script>
  import axios from "axios"
  import AlumniProfile from "../Alumni/AlumniProfileCard.vue";
  import EditAlumniProfileForm from '../Alumni/EditAlumniProfileForm.vue';
  import ExperienceForm from '../Alumni/ExperienceForm.vue';
  import SkillForm from "./SkillForm.vue";
  import StudyBackground from "./StudyBackgroundView.vue";
  import AlumniSkill from './AlumniSkill.vue';
  import WorkExperience from "./WorkExperience.vue";
  import StudyBackgroundForm from './StudyBackgroundForm.vue'
  import GeneralInformationCard from './GeneralInformationCard.vue'
  export default {
    components:{
      AlumniProfile,
      EditAlumniProfileForm,
      ExperienceForm,
      SkillForm,
      StudyBackground,
      StudyBackgroundForm,
      AlumniSkill,
      WorkExperience,
      GeneralInformationCard
    },
    data() {
      return {
        url: process.env.VUE_APP_API_URL,
        showFormAlumni: false,
        showExperience: false,
        showStudyBackground: false,
        experience: {},      
        profile:"" ,
        alumniData: {},
        alumniInfo: {}, 
        alumniSkill:{},
        type: "",
        showSkillForm:false,
        currentWork: [],
        studyBackgrounds:[],
        alumniExperiences: [],
      }
    },
    emits: ['showExperience', 'deleteExperience'],
    methods:{
      showForm(status) {
        this.showFormAlumni = status;
      },
      hideForm(status) {
        this.showFormAlumni = status;
        this.showExperience = status;
      },
      showExperiences(status, type, experience) {
        this.showExperience = status;
        this.experience = experience;
        this.type = type;
      },
      showStudyBackgroundForm(status) {
        this.showStudyBackground = status;
      },
      //=================== add new experience ===================
      newAlumniExperience(newPosition,newCompany,newStart_work,newEnd_work,company_link,duration) {
        let alumniExperience={position:newPosition,company:newCompany,start_year:newStart_work,end_year:newEnd_work,alumni_id: 1,company_link:company_link,duration:duration};
        console.log(alumniExperience);
        axios.post(this.url+'alumniWork',alumniExperience)
        .then((response) => {
          console.log(response.data);
          this.getData();
          this.hideForm();
        })
      },
      //=================== edit alumni experience ===================
      editExperience(data) {
        console.log(data);
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
          this.alumniInfo = res.data.user;
          this.alumniExperiences = res.data.work_experience;
          this.alumniSkill = res.data.skill;
          this.studyBackgrounds = res.data.study_background;
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
        this.showFormAlumni = false;
      },
      //=================== hide skill form =================
      formHiden(value){
          this.showSkillForm = value;
      },
      //=================== show skill form =================
      toShowSkillForm(value){
          this.showSkillForm=value;
      },
      //=================== add new skill =================
      newSkill(newSkill){
          let alumniSkills = {title:newSkill, alumni_id:1};
          axios.post(this.url+'alumniSkill',alumniSkills)
          .then(()=>{
            this.formHiden(false);
            this.getData();
          })
      },
      //=================== upload profile for company ============================
      uploadCompanyProfile(profile, id){
        const CompanyProfile =  new FormData();
        CompanyProfile.append('profile',profile);
        CompanyProfile.append('_method','PUT');
        axios.post(this.url+'companyProfile/'+id,CompanyProfile)
        .then(() => {
          this.getData();
        })
    },
    //=================== add new study background =================
    newStudyBackground(study){
      axios.post(this.url+"studyBackground",study).then(()=>{
        this.showStudyBackgroundForm(false)
        this.getData();
      })
    },
    //=================== upload profile for an alumni ==========================
      uploadImage(profile){
        const AlumniProfile = new FormData();
        AlumniProfile.append('profile', profile)
        AlumniProfile.append('_method', 'PUT');
          axios.post(this.url+'profile/1', AlumniProfile).then(()=>{
            this.getData();
          });
      },
    //=================== remove alumni skill ====================================
      removeAlumniSkill(id){
        axios.delete(this.url+'alumniSkill/' + id)
        .then(()=>{
          this.getData();
        })
      },
    //=============================== remove studyBackground  =======================
      removeStudyBackground(id){
        axios.delete(this.url+'studyBackground/'+ id)
        .then(()=>{
          this.getData();
        })
      },
    },
    created() {
      this.getData();
    },
    computed: {
      // get current work of alumni
      getCurrentWork() {
        console.log(this.alumniExperiences.filter(work => (work.end_year == null)));
        return this.alumniExperiences.filter(work => (work.end_year == null));
      }
    }
  }
</script>