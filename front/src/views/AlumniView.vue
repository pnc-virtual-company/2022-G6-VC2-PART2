<template>
  <div>
    <AlumniProfile @edit="showForm"/>
    <section v-if="isShow" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full"> 
      <BaseForm @hideForm="hideForm"></BaseForm>
    </section>
  </div>
</template>

<script>
import AlumniProfile from "../components/Alumni/AlumniProfile.vue";
import BaseForm from '../components/Alumni/EditAlumniProfileForm.vue';
export default {
  components:{
    AlumniProfile,
    BaseForm,
  },
  data() {
    return {
      isShow: false,
    }
  },
  methods:{
    showForm() {
      this.isShow = true;
    },
    hideForm(status) {
      this.isShow = status;
    }
  }

}
</script>

<style>

</style>