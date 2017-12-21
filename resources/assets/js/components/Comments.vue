<template>
    <div class="form-group">
        <label class="col-md-4 control-label">
            Comments
        </label>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Author</th>
                        <th>Comment</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(comment, index) in comments" :key="index">
                        <td width="30%"><input type="text" class="form-control" placeholder="Author" v-model="comment.author"></td>
                        <td width="65%"><textarea class="form-control" placeholder="Text of comments" v-model="comment.comment"></textarea></td>
                        <td width="5%"><a href="#" class="btn btn-danger" @click.prevent="removeComment(index)">remove</a></td>
                    </tr>
                </tbody>
            </table>

            <button class="btn btn-default" @click.prevent="addComment">Add comment</button>
            <input type="hidden" name="comments" :value="JSON.stringify(comments)">
        </div>
    </div>
</template>

<script>
export default {
    props: ['data'],
    data () {
        return {
            comments: this.data       
        } 
    },
    methods: {
        addComment () {
            this.comments.push({
                author: '',
                comment: ''
            })
        },
        removeComment (index) {
            this.comments.splice(index, 1)
        }
    }
}
</script>
    