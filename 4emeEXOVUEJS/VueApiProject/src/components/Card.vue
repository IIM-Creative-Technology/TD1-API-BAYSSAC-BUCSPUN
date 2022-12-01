<script>
export default {
    data() {
        return {
            posts: [],
        };
    },

    methods: {
        async getData() {
            try {
                let response = await fetch("http://127.0.0.1:8000/api/cours");
                this.posts = await response.json();
                console.log(this.posts)
            } catch (error) {
                console.log(error);
            }
        },
    },

    created() {
        this.getData();
    },
};
</script>

<template>

<div class="flex justify-center item-center">
    <div class="flex gap-8">
        <ul class="flex flex-col w-[300px]" id="container" v-for="post in posts" v-bind:key="post.id">
            <img class="h-[175px]" :src="post.image_url"/>
            <div class="bd mt-4">
                <h1 class="text-xl font-bold px-8 pb-3">Cours: {{post.name}}</h1>
                <p class="flex justify-center mx-8 font-medium mb-4">{{post.description}}</p>
            </div>
            <p class="px-8 py-3.5 font-medium bd">Programme : {{post.programme}}</p>
            <p class="px-8 py-3.5 font-medium bd">Année : {{post.year}}</p>
            <p class="px-8 py-3.5 font-medium">{{post.date_debut}} - {{post.date_fin}}</p>
        </ul>
    </div>
</div>


</template>

<style scoped>

#container {
    border: solid 1px rgba(128, 128, 128, 0.6);
}

.bd {
    border-bottom: solid 1px rgba(128, 128, 128, 0.5);
}

.bdr {
    border-right: solid 1px rgba(128, 128, 128, 0.5);
}

</style>
