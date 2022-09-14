<template>
<div>

  <div class="bg-[#fff] m-auto w-[60%] shadow-xl rounded-md mt-6">
    <img class="m-auto w-full h-[40vh] rounded-t-md" src="https://images.template.net/wp-content/uploads/2014/11/Natural-Facebook-Cover-Photo.jpg" alt="">
    <div class="w-full m-auto text-center px-5 py-5 mt-[-20vh]">
        <div>
            <div class="rounded-full w-[25vh] h-[25vh]">
                <img class="w-full rounded-full  h-[25vh] border-2 border-[#000]" :src="alumniData.profile"/>    
                <input type="file" @change="onFileSelected" hidden id="imageFile">
                <label for="imageFile">
                  <fa icon="camera" class="bg-[#fff] cursor-pointer absolute  text-xl p-2 rounded-full mt-[-2rem] ml-[2rem]"/>
                </label>
            </div>
            <fa icon="pencil" class="text-[#0062ff] text-xl float-right bg-[#ddd] p-3 rounded-full cursor-pointer mt-[-2rem]" @click="isShow"/>
            <div class="text-left px-5 flex justify-between">
                <div class="capitalize">
                    <h1 class="text-3xl font-medium mt-3 mb-3">{{alumniInfo.firstName}} {{alumniInfo.lastName}}</h1>
                    <p class="m-1 flex items-center"><img src="@/assets/pnc-logo.jpg" class="text-[#34B3F1] text-2xl mr-3 w-[1.8rem] "/>{{alumniData.batch}} {{alumniData.major}}</p>
                    <p class="flex items-end"><img src="@/assets/location.png" class="text-[#34B3F1] text-base ml-2 mr-4 mt-3 w-[1.3rem] " alt="">{{alumniData.address}}</p>
                    <p class="mt-5 ml-2 flex"><img src="@/assets/telegram.png" class="text-[#34B3F1] text-2xl mr-3 w-[1.6rem] "/>{{alumniData.telegram}}</p>
                    <p class="mt-5 ml-2 flex lowercase"><img src="@/assets/mail.jpg" class="text-[#34B3F1] text-2xl mr-3 w-[1.8rem] "/>{{alumniInfo.email}}</p>
                    <p class="mt-5 ml-2"><fa icon="phone" class="text-[#0062ff] text-lg capitalize mr-3" />{{alumniData.phone}}</p>
                </div>
                <div class="w-[50%] box-border mt-[-0.7rem] mr-[-5rem]">
                    <h3 class="text-xl font-medium mb-3 mt-7 text-[#0062ff]">Current Work </h3>
                    <p class="mt-4"><fa icon="user-cog" class="text-2xl capitalize mr-3" />Front end developer</p>
                    <p class="mt-5"><fa icon="briefcase" class="text-2xl capitalize mr-3" />Surcemax Asia</p>
                </div>
            </div>
        </div>
    </div>
  </div>
  <AlumniSkil 
  :skills="alumniSkill"
  @toShowSkillForm="showSkillForm"
  />
  <div class="py-5">
    <WorkExperience 
      :workExperiences="alumniExperiences"
      @show="showExperiences"
      @deleteExperience="deleteExperience"
    />
  </div>
</div>
</template>

<script>
import axios from "axios";
import WorkExperience from "./WorkExperience.vue";
import AlumniSkil from "./AlumniSkill.vue";
export default {
  components: {
    WorkExperience,
    AlumniSkil,
  },
  //================= porps data from WorkExperience =================
  props: {
    alumniInfo: Object,
    alumniExperiences: Array,      
    alumniData: Object,
    alumniSkill:Array,
  },
  data() {
    return {
      url: "http://127.0.0.1:8000/api/",
      previewImage:null,  
    };
  },
  emits: ['showExperience', 'deleteExperience'],
  methods: {
    async onFileSelected(event){
      this.uploadImage(event.target.files[0]);
    },
    //===================== upload alumni profile ===================
    uploadImage(profile){
      const AlumniProfile = new FormData();
      AlumniProfile.append('profile', profile)
      AlumniProfile.append('_method', 'PUT');
        axios.post(this.url+'profile/1', AlumniProfile).then(()=>{
          window.location.reload();
        });
    },
    isShow() {
      this.$emit('edit', true);
    },
    //===================== show alumni experience emit =================
    showExperiences(status, type, experience) {
      this.$emit('showExperience', status, type, experience);
    },
    //===================== delete alumni experience emit =================
    deleteExperience(alumniId){
      this.$emit('deleteExperience', alumniId);
    },
    showSkillForm(value){
      this.$emit('showSkillForm', value);
    }
  },
};
</script>
