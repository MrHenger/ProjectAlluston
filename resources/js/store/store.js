import axios from "axios";
import { forEach, forIn, get } from "lodash";
import vue from "vue";
import vuex from "vuex";

vue.use(vuex);

export const store = new vuex.Store({
    state: {
        posts: [],
        paginate: {
            total: 0,
            current_page: 0,
            per_page: 0,
            last_page: 0,
            from: 0,
            to: 0
        }
    },
    mutations: {
        getPosts(state, data) {
            state.posts = data.posts.data;
            state.paginate = data.paginate;

            state.posts.forEach(post => {
                /* Si no existe video hay que crearla y asignarle un cadena vacia,
                 esto para que no de error en el componente PostEdit ya que dicho
                 componente requiere esta propiedad*/
                if (post.video == null) {
                    let emptyVideo = {
                        route_video: ""
                    };
                    post.video = emptyVideo;
                }
            });
        },
        updatedPost(state, data) {
            //actualiza los datos del state
            let index = state.posts.findIndex(key => key.id === data.id);
            state.posts[index] = data;
        }
    },
    actions: {
        getAllPosts(contex, page) {
            // Solicita un lista de publicaciones segun la paginacion
            axios
                .get("http://alluston.test/post/list?page=" + page)
                .then(res => {
                    contex.commit("getPosts", res.data);
                });
        },
        savePost(contex, post) {
            // Envia una peticion para actualizar un registro
            axios
                .put(`http://alluston.test/post/${post.slug}`, post)
                .then(res => {
                    contex.commit("updatedPost", res.data);
                });
        },
        destroyePost(contex, { post, page }) {
            /* Envia una peticion para eliminar un registro y soliciata un nuevo 
            listado de publicaciones en la pagina donde se emitio la solicitud*/
            axios.delete(`http://alluston.test/post/${post.slug}`).then(() => {
                axios
                    .get("http://alluston.test/post/list?page=" + page)
                    .then(res => {
                        contex.commit("getPosts", res.data);
                    });
            });
        }
    }
});
