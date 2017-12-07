<template>
    <div class="form-group">
        <label class="col-md-12"><h3>People Overview</h3></label>

        <label class="col-md-4 control-label">Gender</label>
        <div class="col-md-4">
            <input type="number" min="0" max="100" placeholder="Male" class="form-control" v-model="data.gender.male" @input="handleMaleChange(data.gender.male)">
            <small class="form-text text-muted">Choose male percentage</small>
        </div>
        <div class="col-md-4">
            <input type="number" min="0" max="100" placeholder="Female" class="form-control" v-model="data.gender.female" @input="handleFemaleChange(data.gender.female)">
            <small class="form-text text-muted">Choose female percentage</small>
        </div>
        <label class="col-md-4 control-label">Age</label>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Age Radius</th>
                        <th>Age Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(age, index) in data.ages">
                        <td><input type="text" v-model="age.age" class="form-control"></td>
                        <td><input type="number" min="0" max="100" v-model="age.percentage" class="form-control"></td>
                        <td><a href="#" class="btn btn-danger" @click="removeAge(index)">remove</a></td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="btn btn-default" @click.prevent="addAge">Add age</a>
        </div>
        <input type="hidden" :value="JSON.stringify(data)" name="people_overview">

    </div>
</template>

<script>
    export default {
        props: ['parameters'],
        data () {
            return {
                data: this.parameters
            }
        },
        methods: {
            handleMaleChange (val) {
                this.data.gender.female = 100 - val
            },
            handleFemaleChange(val) {
                this.data.gender.male = 100 - val
            },
            addAge () {
                this.data.ages.push({age: '', percentage: ''})
            },
            removeAge (index) {
                this.data.ages.splice(index, 1)
            }
        }
    }
</script>