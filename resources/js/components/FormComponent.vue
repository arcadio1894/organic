<template>
    <div class="col-xs-12 col-md-6 contact-form">
        <form v-on:submit.prevent="newComment">
            <div class="row">
                <div class="col-md-12">
                    <h3>Compártenos tu opinión</h3><br>

                    <textarea v-model="message" placeholder="Tu comentario"></textarea>

                    <button type="submit" class="btn btn-success"><i class="fa fa-comment"></i>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        props: ['id_product'],
        data() {
            return {
                message: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            newComment() {
                const params = {
                    message: this.message,
                    id_product: this.id_product,
                };

                this.message = '';

                // Peticion AXIOS y emision de un metodo para avisar al padre
                // que se ha creado un nuevo commentario
                axios.post('/post', params)
                    .then(
                        (response) => {
                            const comment = response.data;
                            this.$emit('new', comment);
                        }
                    )

            }
        }
    }
</script>
