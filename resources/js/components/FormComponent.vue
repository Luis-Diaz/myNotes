<template>
    <div class="card mt-3">
        <div class="card-header">Crear una nueva nota</div>

        <div class="card-body">
            <form action="" v-on:submit.prevent="newNote()">
                <div class="form-group">
                    <label for="note">Contenido:</label>
                    <input type="text" class="form-control" name="note" v-model="content">
                </div>
                <button type="submit" class="btn btn-primary">
                    Crear Nota
                </button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                content: ''
            }
        },
        mounted() {
            console.log('Nota creada.')
        },
        methods: {
            newNote() {
                const params = {
                    content: this.content
                };
                this.content = '';
                axios.post('/notes', params)
                    .then((response) => {
                        const note = response.data;
                        this.$emit('new', note);
                    });
            }
        }
    }
</script>
