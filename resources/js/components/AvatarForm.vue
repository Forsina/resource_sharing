<template>
    <div>
        <div class="level">
            <div class="col-md-3">
                <img :src="avatar"  class="avatar">
            </div>
            <div class="col-md-6 col-md-offset-3">
                <h1 style="text-align:center;" v-text="user.name"></h1>
            </div>
            
      
        </div>

        <form v-if="canUpdate" method="POST" enctype="multipart/form-data">
            <image-upload name="avatar" class="mr-1" @loaded="onLoad"></image-upload>
        </form>

    </div>
</template>

<script>
    import ImageUpload from './ImageUpload.vue';
    export default {
        props: ['user'],
        components: { ImageUpload },
        data() {
            return {
                avatar: this.user.avatar_path
            };
        },
        computed: {
            canUpdate() {
                return this.authorize(user => user.id == this.user.id);
            }
        },
        methods: {
            onLoad(avatar) {
                this.avatar = avatar.src;
                this.persist(avatar.file);
            },
            persist(avatar) {
                let data = new FormData();
                data.append('avatar', avatar);
                axios.post(`/api/users/${this.user.name}/avatar`, data)
                    .then(() => flash('Avatar uploaded!'));
            }
        }
    }
</script>