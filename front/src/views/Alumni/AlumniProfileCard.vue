<template>
  <div>
    <div class="bg-[#fff] m-auto w-[80%] shadow-xl rounded-md mt-3 mb-[-6 px]">
      <img class="m-auto w-full h-[40vh] rounded-t-md" src="https://media-exp1.licdn.com/dms/image/C4E1BAQEL9_UKiZEjcg/company-background_10000/0/1557127841108?e=2147483647&v=beta&t=nf1vDbnDohroYpMcpm-KFnk4TMfjKG28yTNCGNbYMPM" alt="">
      <div class="w-full m-auto text-center px-8 py-8 mt-[-15vh] ml-5">
        <div>
          <div class="rounded-full w-[25vh] h-[25vh] flex items-end">
              <img class="rounded-full w-[23vh] h-[23vh] border-2 border-[#0062ff]" v-if="alumniData.profile != null" :src="alumniData.profile"/>    
              <img class="rounded-full w-[23vh] h-[23vh] border-2 border-[#0062ff]" v-if="alumniData.profile == null && alumniData.gender=='Male'" src="@/assets/boy.jpg"/>    
              <img class="rounded-full w-[23vh] h-[23vh] border-2 border-[#0062ff]" v-if="alumniData.profile == null && alumniData.gender=='Female'" src="@/assets/girl.webp"/>    
              <input type="file" @change="uploadImage($event.target.files[0])" hidden id="imageFile" accept="image/png, image/gif, image/jpeg">
              <label for="imageFile">
                <fa icon="camera-alt" class="bg-[#fff] text-[#0062ff] cursor-pointer text-xl p-2 rounded-full ml-[-3rem]"/>
              </label>
          </div>
          <div class="capitalize text-left ml-[12rem] mt-[-6rem]">
            <fa icon="pencil" class="text-[#0062ff] text-xl float-right bg-[#ddd] p-2 rounded-full cursor-pointer mt-[0.5rem]" @click="showAlumniForm"/>
            <h1 class="text-4xl font-bold mt-3 mb-3">{{alumniInfo.firstName}} {{alumniInfo.lastName}}</h1>
            <div v-for:="workExperience in workExperiences">
              <p class="text-lg font-medium">{{workExperience.position}} at {{workExperience.company}}</p>
            </div>
            <div class="flex">
              <p> <fa icon="envelope" class="text-[#0062ff]"/> <span class="normal-case">{{alumniInfo.email}} </span></p>
              <p> <fa icon="phone" class="text-[#0062ff] ml-3"/> <span class="normal-case">{{alumniData.phone}} </span></p>
              <p> <fa icon="paper-plane" class="text-[#0062ff] ml-3"/> <span class="normal-case">{{alumniData.telegram}} </span></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    alumniInfo: Object,
    alumniData: Object,
    workExperiences: Array,
  },
  emits: ['uploadImage', 'showAlumniForm'],
  methods: {
    uploadImage(profile) {
      this.$emit('uploadImage', profile);
    },
    showAlumniForm() {
      this.$emit('showAlumniForm', true);
    }
  },
};
</script>
