<template>
  <div>
    <div class=" w-[75%] m-auto shadow-2xl mt-[4%] bg-[rgba(245, 245, 245, 0.67)] border-[1px] border-slate-200 bg-[#ffffffaf] rounded-t-lg" >
      <div class="text-end w-[99%]">
        <fa 
        :icon="['fas', 'user-pen']" 
        class="text-[2rem] text-sky-500 m-2 shadow-lg shadow-indigo-500/40 p-[5px] cursor-pointer"
        @click="isShow"
      />
    </div>
      <div class="home flex justify-center border-green-300 w-[90%]">
        <div class="image w-[24%] h-[45vh] text-center">
          <img
            v-if="alumniData.profile !== null"
            class="w-[70%] h-[60%] m-auto mb-[20px] shadow-2xl border-cyan-400 border-4"
            :src="alumniData.profile"
            alt=""
          />
          <div class="bg-[#fcfcfc60] w-[9%] flex justify-center absolute z-1 ml-[29px] mt-[-50px] p-[3px] text-bold">
            <label for="imageFile">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
              </svg>
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
          <p> <fa icon="phone" class="text-sky-500 text-2xl" /> {{alumniData.phone}}</p>
        </div>
        <div>
          <p> <fa :icon="['fas', 'envelope']" class="text-sky-500 text-2xl" /> heakheng06@gmail.com</p>
        </div>
        <div>
          <p> <fa :icon="['fab', 'linkedin']" class="text-sky-500 text-2xl" /> hengheak@gmail.com</p>
        </div>
        <div>
          <p> <fa :icon="['fab', 'telegram']" class="text-sky-500 text-2xl" /> heak heng</p>
        </div>
      </div>
    </div>
    <h1 class=" font-bold text-center m-[20px] underline text-[1.5rem] text-[#0062ff]">WORK EXPERIENCE</h1>
    <WorkExperienceVue
      :workExperience = "alumniExperience"
    />
  </div>
</template>

<script>
import axios from "axios";
import WorkExperienceVue from "@/components/Alumni/WorkExperience.vue";
export default {
  components: {
    WorkExperienceVue
  },
  data() {
    return {
      url: "http://127.0.0.1:8000/api/",
      alumniData: {},
      previewImage:null,  
      profile:"" ,
      alumniInfo:{},
      alumniExperience:{},
    };
  },
  // emits: ['edit'],
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
          console.log(response);
          this.getData();
        });
    },
    getData() {
      axios.get(this.url+"alumni/1").then((res) => {
        this.alumniData = res.data;
        this.alumniInfo=res.data.user
        this.alumniExperience=res.data.work_experience
        console.log(this.alumniExperience)
      });
    },
    isShow() {
      this.$emit('edit', true);
    }
  },
  
 
  created() {
    this.getData();
  },
};
</script>
