<template>
    <div class="col-lg-12 my-5">
        <div class="row">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>Action</th>
                        <th>Name</th>
                        <th>PDFs</th>
                        <th>Order</th>
                    </tr>
                </thead>

                <draggable
                    :list="programData"
                    :options="{ animation: 200, handle: '.my-handle' }"
                    :element="'tbody'"
                    @change="update"
                >
                    <tr v-for="program in programData" :key="program.id">
                        <td>
                            <i
                                class="fas fa-arrows-alt my-handle"
                                style="cursor: move"
                            ></i>
                        </td>
                        <td>{{ program.name }}</td>

                        <td>
                            <iframe
                                v-bind:src="'/pdf_files/' + program.pdf"
                                height="60"
                                width="100vh"
                            ></iframe>
                        </td>
                        <td>{{ program.list }}</td>
                    </tr>
                </draggable>

                <tfoot class="thead-light"></tfoot>
            </table>
        </div>
    </div>
</template>

<style></style>

<script>
import axios from "axios";
import draggable from "vuedraggable";
export default {
    components: {
        draggable,
    },
    props: ["programdocuments"],
    data() {
        return {
            programData: this.programdocuments,
        };
    },
    methods: {
        update() {
            this.programData.map((program, index) => {
                program.list = index + 1;
            });

            axios
                .post("programs_sort", {
                    programdocuments: this.programData,
                })
                .then((response) => {
                    //success message
                });
        },
    },
    mounted() {
        console.log(this.programdocuments);
        //(this.name = this.programData.name), (this.pdf = this.programData.pdf);
    },
};
</script>
