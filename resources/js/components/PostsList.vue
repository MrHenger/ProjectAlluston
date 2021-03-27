<template>
	<div class="table-responsive mt-5 col-11 col-sm-10 col-md-8 mx-auto">
		<table class="table table-sm">
			<thead class="thead-dark">
				<tr class="text-center">
					<th scope="col">ID</th>
					<th scope="col">Miniatura</th>
					<th scope="col">Title</th>
					<th scope="col"></th>
				</tr>
			</thead>

			<tr v-for="(post, index) in posts" :key="index" class="text-center" >
				<td class="align-middle">{{ post.id }}</td>
				<td class="align-middle">
					<img :src="raiz + '/' + post.miniature.route_miniature" width="60" height="30"/>
				</td>
				<td class="align-middle text-left">
					<a :href="'http://alluston.test/post/' + post.slug">{{ post.title }}</a>
				</td>
				<td class="align-middle">
					<div class="row">

						<div class="col-6 mx-auto">
							<button class="btn btn-danger" type="button" title="Eliminar" @click="deletePost(post, paginate.current_page)">
								<i class="icon ion-md-close"></i>
							</button>
						</div>                                        
					
						<div class="col-6 mx-auto">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop" @click="editModefunction(post)">
								<i class="icon ion-md-create"></i>
							</button>
						</div>
					</div>
				</td>
				
				
			</tr>
			<postedit @reset="resetPage(paginate.current_page)" :post="datos"></postedit>
		</table>

		<nav>
			<ul class="pagination">
				<li
					class="page-item"
					:class="[
						paginate.current_page <= 1
							? 'paga-item disabled'
							: 'page-item',
					]"
				>
					<a
						class="page-link"
						href="#"
						@click.prevent="
							changePages(paginate.current_page - 1)
						"
					>
						<span>&laquo;</span>
					</a>
				</li>

				<li
					class="page-item"
					v-for="page in pagesNumber"
					:key="page"
					:class="[page == isActive ? 'active' : '']"
				>
					<a
						class="page-link"
						href="#"
						@click.prevent="changePages(page)"
					>
						{{ page }}
					</a>
				</li>

				<li
					class="page-item"
					:class="[
						paginate.current_page >= paginate.last_page
							? 'paga-item disabled'
							: 'page-item',
					]"
				>
					<a
						class="page-link"
						href="#"
						@click.prevent="
							changePages(paginate.current_page + 1)
						"
					>
						<span>&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import PostEdit from "./PostEdit";
import postedit from "./PostEdit.vue";
export default {
	props: ["raiz"],
	data() {
		return {
			editMode: false,
			datos: {
				video: {},
				miniature: {},
			},
		};
	},
	components: {
		postedit,
	},
	computed: {
		...mapState(["posts", "paginate"]),

		isActive: function () {
			return this.paginate.current_page;
		},
		pagesNumber: function () {
			if (!this.paginate.to) {
				return [];
			}

			var from = this.paginate.current_page - 2;
			if (from < 1) {
				from = 1;
			}

			var to = from + 2 * 2;
			if (to >= this.paginate.last_page) {
				to = this.paginate.last_page;
			}

			var pagesArray = [];
			while (from <= to) {
				pagesArray.push(from);
				from++;
			}

			return pagesArray;
		},
	},
	methods: {
		...mapActions(["getAllPosts", "destroyePost"]),

		changePages: function (page) {
			this.paginate.current_page = page;
			this.getAllPosts(page);
		},
		editModefunction: function (post) {
			this.datos = post;
			/* this.editMode = true; */
		},
		deletePost: function (post, page) {
			let confirmation = confirm(
				"Estas seguro que quieres eliminar esta publicaión?"
			);
			if (confirmation) {
				this.destroyePost({ post, page });
			}
		},
		resetPage: function (page) {
			this.getAllPosts(page);
		},
	},
	created() {
		this.getAllPosts();
	},
};
</script>
