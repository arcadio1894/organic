<template>
    <div>
        <form-component v-on:new="addComment" v-bind:id_product="product_id"></form-component>
        <comment-component
            v-for="(comment, index) in comments"
            v-bind:key="comment.id"
            v-bind:comment="comment"
            v-on:delete="deleteComment(index)"
            v-on:update="updateComment(index, ...arguments)"
            v-on:openModal="openedModal(index, ...arguments)">
        </comment-component>
        <div id="modalEditar" class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal"
                            v-on:click="onClickCancel" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" v-model="productId">
                        <input type="text" v-model="productEdit">
                        <input type="text" v-model="descriptionEdit">
                        <input type="text" v-model="priceEdit">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" v-on:click="onClickCancel">
                            Cerrar
                        </button>
                        <button type="button" class="btn btn-primary" >
                            Guardar cambios
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['product_id'],
        data() {
            return {
                comments: [],
                /* Estos datos son de ejemplo*/
                openModal: false,
                productEdit: '',
                descriptionEdit: '',
                priceEdit: '',
                productId: '',
            }
        },
        mounted() {
            // Peticion AXIOS que devuelve todos los comentarios de ese producto
            axios.get('/posts/'+this.product_id)
                .then(
                    (response) => {
                        this.comments = {};
                        this.comments = response.data;
                    }
                )
        },
        methods: {
            addComment(comment) {
                this.comments.push(comment);
            },
            deleteComment(index) {
                this.comments.splice(index,1)
            },
            updateComment(index, comment) {
                this.comments[index] = comment;
                console.log(this.comments[index].comment)
            },

            /* Estos metodos son referidos a un ejemplo con modal */
            onClickCancel(){
                this.openModal = false;
                this.productEdit = '';
                this.descriptionEdit = '';
                this.priceEdit = '';
                this.productId = "";
                $('#modalEditar').hide();
            },
            openedModal(index, comment){
                this.openModal = true;
                this.productEdit = comment.comment;
                this.descriptionEdit = comment.comment;
                this.priceEdit = comment.comment;
                this.productId = comment.id;
                $('#modalEditar').show();
            }
        }
    }
</script>
