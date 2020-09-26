<template>
    <div :id="'reply-'+id" class="card mb-3">
        <div class="card-header" :class="isBest ? 'bg-info': ''">
            <div class="level">
                <h6 class="flex">
                    <a :href="'/profiles/'+reply.owner.name" v-text="reply.owner.name"></a> 
                    кажа <span v-text="ago"></span>
                </h6>

                    <div v-if="authorize('owns', reply) || authorize('owns', reply.thread)">
                        <div v-if="authorize('owns', reply)">
                            <button class="btn btn-xs btn-default ml-a" title="Best Reply?" style="color:#FFC433; padding-right: 0px;" @click="markBestReply" v-if="authorize('owns', reply.thread)"><i class="fas fa-star"></i></button>
                        </div>
                    </div>               
                    <div v-if="signedIn">
                        <favorite :reply="reply"></favorite>
                    </div>
            </div>  
        </div>

        <div class="card-body">
            <div v-if="editing">
                <form @submit.prevent="update">
                    <div class="form-group">
                        <!--<textarea class="form-control" v-model="body"></textarea>-->
                        <wysiwyg v-model="body"></wysiwyg>
                    </div>
                        <button class="btn btn-primary btn-xs" @click="update">Update</button>
                        <button class="btn btn-link btn-xs" @click="editing = false">Cancel</button>
                </form>
            </div>
            <div v-else v-text="body">
                
            </div>
        </div>

        <div class="card-footer level" v-if="authorize('owns', reply) || authorize('owns', reply.thread)">
            <div v-if="authorize('owns', reply)">
                <button class="btn btn-xs mr-1" @click="editing = true" v-if="! editing"><span><i class="fas fa-code"></i></span></button>
                <!--<button class="btn btn-xs" title="Edit?" @click="editing = true"><span><i class="fas fa-code"></i></span></button>-->
                <button type="submit" class="btn btn-xs" title="Delete?" @click="destroy"><span><i class="fas fa-trash-alt"></i></span></button> 

            </div>
        </div>


    </div>
</template>

<script>

import Favorite from './Favorite.vue';
import moment from 'moment';
import 'moment/locale/mk';

    export default {
        props: ['reply'],

        components: { Favorite },

        data() {
            return {
                editing: false,
                id: this.reply.id,
                body: this.reply.body,
                isBest: this.reply.isBest,
            };
        },

        computed: {
            ago() {
                return moment(this.reply.created_at).fromNow() + '.. .';
            }
        },

        created () {
            window.events.$on('best-reply-selected', id => {
                this.isBest = (id == this.id);
            });
        },

        methods: {
            update() {
                axios.patch('/replies/' + this.id, {
                    body: this.body
                })

                .catch(error => {
                    flash(error.response.data, 'danger');
                });

                this.editing = false;
                flash('Updated!');
            },
            destroy() {
                axios.delete('/replies/' + this.id);
                
                this.$emit('deleted', this.id);
                
                //$(this.$el).fadeOut(300, () => {
                //    flash('Your reply has been deleted.');
                //});
            },

            markBestReply() {
                
                axios.post('/replies/' + this.id + '/best');
                window.events.$emit('best-reply-selected', this.id);
            }
        }
    }
</script>