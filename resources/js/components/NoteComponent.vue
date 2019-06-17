<template>
    <div class="card mt-3">
        <div class="card-header">Publicado en {{ note.created_at }} - Última actualización: {{ note.updated_at }}</div>

        <div class="card-body">

            <input v-if="editMode" type="text" class="form-control" v-model="note.content">
            <p v-else>{{ note.content }}</p>

        </div>

        <div class="card-footer">
            <button v-if="editMode" class="btn btn-success" v-on:click="onClickUpdate()">
                Guardar cambios
            </button>
            <button v-else class="btn btn-secondary" v-on:click="onClickEdit()">
                Editar
            </button>
            <button class="btn btn-danger" v-on:click="onClickDelete()">
                Eliminar
            </button>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['note'],
        data() {
            return {
                editMode: false
            };
        },
        mounted() {
            console.log('Componente montado.')
        },
        methods: {
            onClickDelete() {
                axios.delete('/notes/' + this.note._id).then(() => {
                    this.$emit('delete');
                });
            },
            onClickEdit() {
                this.editMode = true;
            },
            onClickUpdate() {
                const params = {
                    content: this.note.content
                };
                axios.put('/notes/${this.note.id}', params).then((response) => {
                    this.editMode = false;
                    const note = response.data;
                    this.$emit('update', note);
                });
            }
        }
    }
</script>
