<template>
    <div>
        <app-layout>
            <template #header>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Create Relation
                </h2>
            </template>
            <template #main>
                <form @submit.prevent="submit">
                    <label for="Person_A">Person A</label><br/>
                    <select @change="userSelected" class="form-control" style="width: 25%" id="Person_A" v-model="form.user_id" >
                        <option v-for="(user,index) in users_a" :value="JSON.stringify({id:user.id,index:index})">{{user.name}}</option>
                    </select>
                    <br/>
                    <label for="Person_B">Person B</label><br/>
                    <select  class="form-control" style="width: 25%" id="Person_B" v-model="form.user2_id" >
                        <option v-for="user in users_b" :value="user.id">{{user.name}}</option>
                    </select>
                    <br/>
                    <label for="relation">Relation:</label><br/>
                    <select class="form-control" id="relation" v-model="form.relation" >
                        <option value="parent">Parent</option>
                        <option value="sibling">Sibling</option>
                        <option value="child">Child</option>
                    </select><br/>
                    <label for="information">Information:</label><br/>
                    <textarea class="form-control" id="information" v-model="form.information" ></textarea><br/>
                    <button class="btn btn-primary" type="submit">Submit</button><br/>
                </form>
            </template>
        </app-layout>
    </div>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
export default {
    name: "create",
    components:{
        AppLayout,
    },
    props: ['users'],
    data(){
        return {
            users_a: this.users,
            users_b: this.users,
        }
    },
    mounted() {
    },
    setup () {
        const form = reactive({
            user_id: null,
            user2_id: null,
            relation: null,
            information: null,
        })

        function submit() {
            Inertia.post('/create', form);
        }

        return { form, submit }
    },
    methods: {
        userSelected(event){
            let value = JSON.parse(event.target.value);
            let temp = [...this.users];
            temp.splice(value.index,1);
            this.users_b = [...temp];
        }
    }
}
</script>

<style scoped>

</style>
