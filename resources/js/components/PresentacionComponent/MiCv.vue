<template>
    <b-row align-h="center" class="bg-dark border-top border-light">
        <b-col cols="12" md="4" class="my-md-3 py-3 bg-light rounded-left">
            <b-row>
                <b-col cols="12">
                    <h3>
                        <b-icon-person-circle
                            variant="primary"
                            scale="1"
                            class="mr-1"
                        ></b-icon-person-circle
                        >
                        {{me.fullName}}
                    </h3>
                    <img
                        src="../../../assets/img/Perfil2.jpg"
                        alt="Foto de Perfil"
                        width="250"
                        height="250"
                        class="d-block mx-auto rounded-circle"
                    />
                </b-col>
                <b-col cols="12" class="my-3">
                    <h3 class="border-bottom border-primary rounded-sm">
                        Sobre Mí
                    </h3>
                    <p>
                        <b-icon-geo-alt-fill
                            variant="secondary"
                            scale="2"
                            class="ml-2 mr-4"
                        ></b-icon-geo-alt-fill
                        >{{ me.address }}
                    </p>
                    <p>
                        <b-icon-calendar2-date
                            variant="primary"
                            scale="2"
                            class="ml-2 mr-4"
                        ></b-icon-calendar2-date
                        >{{ me.age }}
                    </p>
                    <p>
                        <b-icon-calendar3
                            variant="primary"
                            scale="2"
                            class="ml-2 mr-4"
                        ></b-icon-calendar3
                        >{{ me.birthday }}
                    </p>
                    <p>
                        <b-icon-envelope
                            variant="secondary"
                            scale="2"
                            class="ml-2 mr-4"
                        ></b-icon-envelope
                        >{{ me.email }}
                    </p>
                </b-col>
            </b-row>
        </b-col>
        <b-col cols="12" md="4" class="my-md-3 py-3 bg-light rounded-right">
            <b-row>
                <b-col cols="12">
                    <h3
                        class="text-dark border-bottom border-primary rounded-sm"
                    >
                        Desarrollador Web
                    </h3>
                    <ul style="list-style-type:none" class="p-0">
                        <li
                            v-for="(skill, index) of me.skills"
                            :key="index"
                            class="my-3"
                        >
                            <b-icon-check-circle-fill
                                variant="secondary"
                                class="mr-3"
                                scale="2"
                            ></b-icon-check-circle-fill>
                            {{ skill }}
                        </li>
                    </ul>
                </b-col>
                <b-col cols="12">
                    <h3 class="text-dark border-bottom border-primary rounded-sm">
                        Formación
                    </h3>
                    <ul style="list-style-type:none" class="p-0">
                        <li class="my-3">
                            <b-icon-check-circle-fill
                                variant="secondary"
                                class="mr-3"
                                scale="2"
                            ></b-icon-check-circle-fill>
                            Educacion IT - Desarrollador web full stack PHP
                        </li>
                        <li class="my-3">
                            <b-icon-check-circle-fill
                                variant="secondary"
                                class="mr-3"
                                scale="2"
                            ></b-icon-check-circle-fill>
                            Seniority: Junior
                        </li>
                    </ul>
                </b-col>
                <b-col cols="12">
                    <h3 class="text-dark border-bottom border-primary rounded-sm">
                        Otros Conocimientos
                    </h3>
                    <b-badge variant="secondary" pill class="mx-1" v-for="(value , index) of me.others" :key="index">{{value}}</b-badge>
                </b-col>
                <b-col cols="12">
                   <h3 class="text-dark border-bottom border-primary rounded-sm">
                        Idiomas
                    </h3>
                    <ul style="list-style-type:none" class="p-0">
                       <li class="my-3">
                            <b-icon-check-circle-fill
                                variant="secondary"
                                class="mr-3"
                                scale="2"
                            ></b-icon-check-circle-fill>
                            Inglés oral : Básico
                        </li>
                        <li class="my-3">
                            <b-icon-check-circle-fill
                                variant="secondary"
                                class="mr-3"
                                scale="2"
                            ></b-icon-check-circle-fill>
                            Inglés escrito : Intermedio
                        </li>
                    </ul>
                </b-col>
                <b-col cols="12">
                   <h3 class="text-dark border-bottom border-primary rounded-sm">
                        Aptitudes
                    </h3>
                    <b-badge variant="secondary" pill class="mx-1" v-for="(value , index) of me.aptitude" :key="index">{{value}}</b-badge>
                </b-col>
            </b-row>
        </b-col>
    </b-row>
</template>
<script>
export default {
    data() {
        return {
            me: {
                fullName: "Sebastian Daniel Lovisolo",
                skills: [
                    "PHP",
                    "Javascript",
                    "Laravel",
                    "Vue js / Vuex / Vue Router / Vuelidate",
                    "BootstrapVue / Bootstrap 4",
                    "Css3",
                    "HTML5"
                ],
                email: "sebalovi12@gmail.com",
                address: "Balvanera - Capital Federal",
                age: "30 años",
                birthday: "26/04/1990",
                smartphone: "3364310167",
                others:[
                    'Produccion y edición musical',
                    'Ableton Live 10',
                    'Cubase 5',
                    'Nuendo',
                    'Pro Tools',
                    'Sony Sound Forge',
                    'Sony Acid Pro',
                    'Reason 5',
                    'Fl Studio 9',
                    'Sony Vegas 13'
                ],
                aptitude:[
                    'Flexibilidad',
                    'Buenas relaciones interpersonales',
                    'Autocrítico',
                    'Trabajo en equipo',
                    'Competencia sana',
                    'Automotivación',
                    'Mucha perseverancia',
                    'Compromiso',
                    'Responsabilidad'
                ],

            }
        };
    },
};
</script>
