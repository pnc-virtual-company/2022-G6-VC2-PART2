<template>
  <div>
    <div class=" w-[60%] m-auto shadow-2xl mt-[4%] bg-[rgba(245, 245, 245, 0.67)] border-[1px] border-slate-200 bg-[#ffffffaf] rounded-md" >
      <div class="text-end w-[99%]">
        <fa 
        :icon="['fas', 'user-pen']" 
        class="text-[1.5rem] text-sky-500 m-2 shadow-lg shadow-indigo-500/40 p-[5px] rounded-full p-3 cursor-pointer"
        @click="isShow"
      />
    </div>
      <div class="home flex justify-center border-green-300 w-[90%]">
        <div class="image w-[35vh] h-[45vh] text-center">
          <img
            v-if="alumniData.profile !== null"
            class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4"
            :src="alumniData.profile"
            alt=""
          />
          <div class="bg-[#fcfcfc60] w-[9%] flex justify-center absolute z-1 ml-[29px] mt-[-50px] p-[3px] text-bold">
            <label for="imageFile">
              <i class="fa fa-camera cursor-pointer text-xl text-[#34B3F1]"></i>
            </label>
          </div>
          <input type="file" @change="onFileSelected" hidden id="imageFile">
          <strong class="text-[1.3rem]">{{alumniInfo.firstName + ' '+alumniInfo.lastName}}</strong>
        </div>
        <div class="detail flex justify-between mt-5 text-start w-[70%]">
          <div>
            <div class="major p-[0.5rem] text-[1.2rem]">
              <p><strong>Gender:</strong> {{alumniData.gender}}</p>
            </div>
            <div class="generation p-[0.5rem] text-[1.2rem]">
              <p><strong>Major: </strong>{{alumniData.major}}</p>
            </div>
            <div class="position p-[0.5rem] text-[1.2rem]">
              <p> <strong>Address: </strong>{{alumniData.address}}</p>
            </div>
          </div>
          <div>
            <div class="company p-[0.5rem] text-[1.2rem]">
              <p> <strong>Bacth: </strong> {{alumniData.batch}}</p>
            </div>
            <div class="place p-[0.5rem] text-[1.2rem]">
              <p><strong>Place of birth: </strong>{{alumniData.placeOfBirth}} </p>
            </div>
            <div class="date p-[0.5rem] text-[1.2rem]">
              <p> <strong>Date of birth: </strong>{{alumniData.dateOfBirth}}</p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="socail flex justify-evenly items-center ml-[0%] bg-teal-200 w-[100%] h-[10vh] rounded-b-lg">
        <div>
          <p> <fa icon="phone" class="text-[#34B3F1] text-2xl" />  {{alumniData.phone}}</p>
        </div>
        <div>
          <p> <fa :icon="['fas', 'envelope']" class="text-[#34B3F1] text-2xl" />  {{alumniInfo.email}}</p>
        </div>
      </div>
    </div>
    <h1 class=" font-bold text-center m-[20px] underline text-[1.5rem] text-[#0062ff]">WORK EXPERIENCE</h1>
    <WorkExperienceVue 
      :workExperiences="alumniExperiences"
      @show="showExperiences"
      @deleteExperience="deleteExperience"
    />
  </div>
</template>

<script>
import axios from "axios";
import WorkExperienceVue from "./WorkExperience.vue";
export default {
  components: {
    WorkExperienceVue,
  },
  props: {
    alumniInfo: Object,
    alumniExperiences: [],      
    alumniData: Object,
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
    uploadImage(profile){
      const AlumniProfile = new FormData();
      AlumniProfile.append('profile', profile)
      AlumniProfile.append('_method', 'PUT');
        console.log(AlumniProfile);
        axios.post(this.url+'profile/1', AlumniProfile).then((response)=>{
          console.log(response.data);
          window.location.reload();
        });
    },
    isShow() {
      this.$emit('edit', true);
    },
    showExperiences(status, type, experience) {
      this.$emit('showExperience', status, type, experience);
    },
    deleteExperience(alumniId){
      this.$emit('deleteExperience', alumniId);
    },
  },
};
</script>
