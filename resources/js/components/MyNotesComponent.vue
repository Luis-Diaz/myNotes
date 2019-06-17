<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <form-component @new="addNote"></form-component>

            <note-component
                v-for="(note, index) in notes"
                :key="note.id"
                :note="note"
                @update="updateNote(index, ...arguments)"
                @delete="deleteNote(index)">
            </note-component>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                notes: []
            }
        },
        mounted() {
            axios.get('/notes').then((response) => {
                this.notes = response.data;
            });
        },
        methods: {
            addNote(note) {
                this.notes.push(note);
            },
            updateNotes(index, note) {
                this.notes[index] = note;
            },
            deleteNote(index) {
                console.log(index);
                this.notes.splice(index, 1);
            }
        }
    }
</script>
