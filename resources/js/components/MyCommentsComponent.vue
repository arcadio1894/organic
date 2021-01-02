<template>
    <div>
        <form-component v-on:new="addComment" v-bind:id_product="product_id"></form-component>
        <comment-component
            v-for="(comment, index) in comments"
            v-bind:key="comment.id"
            v-bind:comment="comment"
            v-on:delete="deleteComment(index)"
            v-on:update="updateComment(index, ...arguments)">
        </comment-component>
    </div>
</template>

<script>
    export default {
        props: ['product_id'],
        data() {
            return {
                comments: []
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
            }
        }
    }
</script>
