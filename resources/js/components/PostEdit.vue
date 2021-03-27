<template>
    <div>
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg mx-auto">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title ">
                            Editar Publicacion
                        </h5>
                        <button
                            type="button"
                            class="close"
                            
                            aria-label="Close"
                            @click="cancelEdit"
                        >
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="mb-3 mx-3 text-left">
                            <form enctype="multipart/form-data">
                    
                                <div class="mt-3 row">
                                    <img class="col-10 mx-auto preview" :src="'http://alluston.test/images/miniatures/'+post.miniature.route_miniature">
                                    <!-- <div>
                                        <input type="file" name="route_miniature" @change="getNameImage">
                                    </div> -->
                                </div>
                    
                                <div class="mt-3">
                                    <label for="title">Titulo:</label>
                                    <div>
                                        <input class="form-control" type="text" name="title" 
                                        v-model="post.title" @change="madeChanges">
                                    </div>
                                </div>
                    
                                <div class="mt-3">
                                    <label for="slug">Slug:</label>
                                    <div>
                                        <input class="form-control" type="text" name="slug" 
                                        v-model="post.slug" @change="madeChanges">
                                    </div>
                                </div>
                    
                                <div class="mt-3">
                                    <label for="content">Descripcion:</label>
                                    <div>
                                        <textarea class="form-control" name="content" cols="30" rows="10" v-model="post.content" @change="madeChanges"></textarea>
                                    </div>
                                </div>
                    
                                <div class="mt-3">
                                    <label for="route_video">Link del video:</label>
                                    <div>
                                        <input class="form-control" type="text" name="route_video" v-model="post.video.route_video" @change="madeChanges" placeholder="Ejemplo: https://www.youtube.com/embed/ZCsS1GGPrWU">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button
                                        type="button"
                                        class="btn btn-secondary"
                                        @click="cancelEdit"
                                    >
                                        Atras
                                    </button>
                                    <button type="submit" class="btn btn-primary" data-dismiss="modal" @click.prevent="postEdit(post)">
                                        Actualizar
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from "vuex";
export default {
	data() {
		return {
			changes: false,
		};
	},
	props: ["post"],
	name: "PostEdit",
	methods: {
		...mapActions(["savePost"]),

		postEdit(datos) {
			this.savePost(datos);
		},

		cancelEdit() {
			if (this.changes) {
				if (confirm("Estas seguro que quiere descartar los cambios?")) {
					this.$emit("reset");
					$("#staticBackdrop").modal("hide");
					this.changes = false;
				}
			} else {
				$("#staticBackdrop").modal("hide");
			}
		},
		madeChanges() {
			this.changes = true;
		},
	},
};
</script>
