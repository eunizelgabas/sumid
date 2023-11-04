<template>

    <div class="rounded-lg p-4 border-2 border-gray-400 bg-white shadow flex hover:bg-blue-100">
        <div class="cursor-pointer flex flex-1" @click="open(client)">
           <img :src="client.picUrl" alt="Profile pic" class="aspect-square w-[200px] object-cover mb-4">
            <div class="ml-4 flex-1">
                <h3 class="font-bold">
                    Client Details
                </h3>
                <hr>
                <div class="text-2xl">{{ client.last_name }}, {{ client.first_name }}</div>
                <div class="italic">{{ client.address }}</div>
                <div class="italic">{{ client.phone }}</div>
                <div class="mt-2">{{ client.formattedBDate }}</div>

            </div>

        </div>
        <div class="flex justify-between">
            <div>&nbsp;</div>
            <label  :for="'status- '+ client.id" class="switch">
                <input type="checkbox" :id="'status- '+client.id" :checked="client.active" @change="toogleEnabled(client)">
                <span class="slider"></span>
              </label>
        </div>
    </div>

</template>

<script setup>
import { router } from '@inertiajs/vue3';


const props = defineProps({
    client: Object
})

function open(client) {
    router.visit('/clients/' + props.client.id)
}

function toogleEnabled(client){
    router.visit('/clients/toggle/' +client.id , {
        method:'post',
        preserveScroll:true
    })
}

</script>
<style scoped>
/* The switch - the box around the slider */
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 34px;
  }

  /* Hide default HTML checkbox */
  .switch input {
    opacity: 0;
    width: 0;
    height: 0;
  }

  /* The slider */
  .slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #eebdbd;
    -webkit-transition: .4s;
    transition: .4s;
  }

  .slider:before {
    position: absolute;
    content: "";
    height: 26px;
    width: 26px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
  }

  input:checked + .slider {
    background-color: #2196F3;
  }

  input:focus + .slider {
    box-shadow: 0 0 1px #2196F3;
  }

  input:checked + .slider:before {
    -webkit-transform: translateX(26px);
    -ms-transform: translateX(26px);
    transform: translateX(26px);
  }

  /* Rounded sliders */
  .slider.round {
    border-radius: 34px;
  }

  .slider.round:before {
    border-radius: 50%;
  }
</style>
