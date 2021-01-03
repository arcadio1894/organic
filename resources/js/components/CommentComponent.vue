<template>
    <div class="row">
        <div class="col-xs-3 col-md-2">
            <div class="blog__details__author">
                <div class="blog__details__author__pic">
                    <img src="https://i.pinimg.com/originals/51/f6/fb/51f6fb256629fc755b8870c801092942.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-xs-9 col-md-10 ">
            <div class="blog__details__widget">
                <section class="comment-list">
                    <article class="row">
                        <div class="col-md-10 col-sm-10">
                            <div class="panel panel-default arrow left">
                                <div class="panel-body">
                                    <header class="text-left">
                                        <div class="comment-user"><i class="fa fa-user"></i> {{ myComment.customer.name }} </div>
                                        <time class="comment-date" ><i class="fa fa-clock-o"></i> Publicado el {{ myComment.created_at | formatDateCreated }} </time>
                                        <br>
                                        <time class="comment-date" ><i class="fa fa-pencil-square"></i> Modificado {{ myComment.updated_at | formatDateUpdated }} </time>

                                    </header>
                                    <div class="comment-post">
                                        <div v-if="editMode">
                                            <textarea name="message" cols="10" rows="3" class="form-control"
                                                v-model="comment.comment"></textarea>
                                        </div>
                                        <p v-else>
                                            {{ myComment.comment }}
                                        </p>
                                    </div>
                                    <p v-if="editMode" class="text-right">
                                        <br>
                                        <button v-on:click="onClickUpdate" class="btn btn-success btn-sm"><i class="fa fa-save"></i> Guardar</button>
                                        <button v-on:click="onClickCancel" class="btn btn-danger btn-sm"><i class="fa fa-close"></i> Cancelar</button>
                                    </p>

                                    <p v-else class="text-right">
                                        <button v-on:click="onClickModal" class="btn btn-primary btn-sm"><i class="fa fa-envelope-open"></i> Abrir modal</button>
                                        <button v-on:click="onClickEdit" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i> Editar</button>
                                        <button v-on:click="onClickDelete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</button>
                                    </p>

                                </div>
                            </div>
                        </div>
                    </article>
                </section>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['comment'],
        data() {
            return {
                myComment: this.comment,
                editMode: false,
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        filters: {
            formatDateCreated: function (value) {
                if (value) {
                    moment.locale('es');
                    return moment(String(value)).format('LLLL');
                }
            },
            formatDateUpdated: function (value) {
                if (value) {
                    moment.locale('es');
                    return moment(String(value)).fromNow();
                }
            }
        },
        methods: {
            onClickEdit() {
                this.editMode = true;
            },
            onClickCancel() {
                this.editMode = false;
            },
            onClickUpdate() {
                const params = {
                    message: this.comment.comment,
                };

                axios.put('/post/'+this.comment.id, params)
                    .then(
                        (response) => {
                            this.editMode = false;
                            const comentario = response.data;
                            this.myComment = comentario;
                            this.$emit('update', comentario);
                        }
                    )

            },
            onClickDelete() {
                axios.delete('/post/'+this.comment.id)
                    .then(
                        () => {
                            this.$emit('delete');
                        }
                    )
            },
            /* Estos metodos son del modal */
            onClickModal() {
                this.$emit('openModal', this.comment);
            }
        }
    }
</script>
