<template>
  <b-col class="m-0 p-0">
    <b-row class="m-0 p-0">
      <b-col
        cols="12"
        md="4"
        class="m-0 p-0"
        v-for="(noticia, index) in noticiasjson.articles"
        :key="index"
      >
        <b-card
          :img-src="checkImg(noticia.urlToImage)"
          img-height="250"
          class="m-0 p-0"
        >
          <a :href="noticia.url" target="_blank">
            <b-card-title>
              {{ noticia.title }}
            </b-card-title>
            <b-card-sub-title>
              {{ noticia.description }}
            </b-card-sub-title>
          </a>
        </b-card>
      </b-col>
    </b-row>
  </b-col>
</template>
<script>
import { mapState, mapActions } from "vuex";
export default {
  beforeMount() {
    this.setNoticias();
  },
  computed: {
    ...mapState("NoticiasModule", ["noticiasjson"]),
  },
  methods: {
    checkImg(img) {
      return img === null
        ? "https://i0.wp.com/elfutbolito.mx/wp-content/uploads/2019/04/image-not-found.png?ssl=1"
        : img;
    },
    ...mapActions("NoticiasModule", ["setNoticias"]),
  },
};
</script>