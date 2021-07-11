<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>
        <template #main>
            <div>
            <h1>Tree</h1>
            <VueFamilyTree
                :tree="tree"
                @card-click="cardClick"
            />
            </div>
        </template>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import VueFamilyTree from '@/Pages/VueFamilyTree'

    export default {
        components: {
            AppLayout,
            Welcome,
            VueFamilyTree,
        },
        data () {
            return {
                tree: [{
                    children: [{
                        firstPerson: {
                            name: 'Katia'
                        },
                        secondPerson: {
                            name: 'Oleg'
                        },
                        children: [{
                            firstPerson: {
                                name: 'Gleb'
                            },
                            secondPerson: {
                                name: 'Viktoriya'
                            },
                            children: [{
                                firstPerson: {
                                    name: 'Rim'
                                },
                                secondPerson: {
                                    name: 'Natasha'
                                }
                            },
                                {
                                    firstPerson: {
                                        name: 'Leonid'
                                    }
                                }]
                        },
                            {
                                firstPerson: {
                                    name: 'Olga'
                                },
                                secondPerson: {
                                    name: 'Nikita'
                                }
                            }]
                    },
                        {
                            firstPerson: {
                                name: 'Vitia'
                            },
                            secondPerson: {
                                name: 'Dasha'
                            }
                        },
                        {
                            firstPerson: {
                                name: 'Antonio Wild',
                                image: 'https://picsum.photos/300/300?random=3'
                            },
                            secondPerson: {
                                name: 'Olivia Olson'
                            },
                            children: [{
                                firstPerson: {
                                    name: 'Kristina Wild'
                                }
                            },
                                {
                                    firstPerson: {
                                        name: 'Alexey Wild'
                                    }
                                },
                                {
                                    firstPerson: {
                                        name: 'Viktor Wild'
                                    }
                                }]
                        }]
                }],
                count:0,
            }
        },
        methods: {
            cardClick (item) {
                console.log(this.count++);
                let name = item.name;
                console.log(name);
            }
        }
    }
</script>
