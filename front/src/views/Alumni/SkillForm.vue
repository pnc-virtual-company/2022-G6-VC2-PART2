<template>   
    <BaseForm class="relative top-10 mx-auto p-0 border w-90 shadow-lg rounded-lg bg-white ">
        <template v-slot:header >
            <span>Add your skill</span>
        </template>        
        <template v-slot:form>
            <div class="relative z-0 mb-6 w-full group">
                <!-- <input type="text" placeholder=" " class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer" v-model="skill_title"> -->
                 <!-- combobox -->
                <Combobox v-model="skill_title">
                    <div class="relative mt-1">
                        <div
                        class="relative w-full cursor-default overflow-hidden rounded-lg text-left focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75 focus-visible:ring-offset-2 focus-visible:ring-offset-teal-300 sm:text-sm"
                        >
                        <ComboboxInput
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-black dark:border-gray-400 dark:focus:border-sky-500 focus:outline-none focus:ring-0 focus:border-sky-600 peer"
                            :displayValue="(person) => person.name"
                            @change="query"
                        />
                        <ComboboxButton
                            class="absolute inset-y-0 right-0 flex items-center pr-2"
                        >
                            <ChevronUpDownIcon
                            class="h-5 w-5 text-gray-400"
                            aria-hidden="true"
                            />
                        </ComboboxButton>
                        </div>
                        <TransitionRoot
                        leave="transition ease-in duration-100"
                        leaveFrom="opacity-100"
                        leaveTo="opacity-0"
                        @after-leave="query = ''"
                        >
                        <ComboboxOptions
                            class="absolute mt-1 max-h-60 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm"
                        >
                            <div
                            v-if="filteredPeople.length === 0 && query !== ''"
                            class="relative cursor-default select-none py-2 px-4 text-gray-700"
                            >
                            Nothing found.
                            </div>

                            <ComboboxOption
                            v-for="(person,index) in filteredPeople"
                            as="template"
                            :key="index"
                            :value="person"
                            v-slot="{ selected, active }"
                            >
                            <li
                                class="relative cursor-default select-none py-2 pl-10 pr-4"
                                :class="{'bg-teal-600 text-white': active,'text-gray-900': !active,
                                }"
                            >
                                <span
                                class="block truncate"
                                :class="{ 'font-medium': selected, 'font-normal': !selected }"
                                >
                                {{person}}
                                </span>
                                <span
                                v-if="selected"
                                class="absolute inset-y-0 left-0 flex items-center pl-3"
                                :class="{ 'text-white': active, 'text-teal-600': !active }"
                                >
                                <CheckIcon class="h-5 w-5" aria-hidden="true" />
                                </span>
                            </li>
                            </ComboboxOption>
                        </ComboboxOptions>
                        </TransitionRoot>
                    </div>
                    </Combobox>
                <BaseLabel for="floating_address"><fa icon="user-cog" class="text-2xl capitalize mr-3 text-[#6d7a83]" /> Skill</BaseLabel>
            </div>
            <div class="p-2 text-center">
                <BaseButton type="submit" class="bg-[#1da1f2] sm:w-auto ">
                    <span @click="addSkill">Add</span>
                </BaseButton>
                <BaseButton @click="hidSkillform" class="bg-red-500 mr-2 mb-2 m-4">Cancel</BaseButton>
            </div>
        </template>
    </BaseForm>
</template>
<script>
    import {
        Combobox,
        ComboboxInput,
        ComboboxButton,
        ComboboxOptions,
        ComboboxOption,
        TransitionRoot,
    } from '@headlessui/vue'
import { CheckIcon, ChevronUpDownIcon } from '@heroicons/vue/20/solid'
import BaseForm from '../../components/widget/BaseForm.vue'
import BaseButton from '../../components/widget/BaseButton.vue'
import BaseLabel from '../../components/widget/BaseSpanLabel.vue'
export default {
    components: {
        BaseForm,
        BaseButton,
        BaseLabel,
        Combobox,
        ComboboxInput,
        ComboboxOptions,
        ComboboxOption,
        ComboboxButton,
        TransitionRoot,
        CheckIcon,
        ChevronUpDownIcon,
    },
    data(){
        return{
            skill_title:'',
            people : [
                         'html',
                        'css' ,
                         'javascript' ,
                         'php' ,
                         'oop' ,
                         'Nodejs',
                        'Vuejs',
                         'c++',
                        'reach',
                ],
            selectedPerson:'',
            filteredPeople:''
        }
    },
    computed:{
       
    },
    methods: {
        hidSkillform(){
            this.$emit('hidFormSkill',false)
        },
        addSkill(){
            console.log(this.skill_title['name'])
            console.log(this.skill_title)
            this.$emit('addSkill', this.skill_title);
        },
        query(event){
            this.skill_title=event.target.value
            return this.filteredPeople=this.people.filter(person=>person.toLowerCase().includes(event.target.value.toLowerCase()))
        }
    },
}
</script>