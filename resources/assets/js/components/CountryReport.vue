<template>
    <div class="form-group">
        <label class="col-md-3" ><h3>Country Report</h3></label>
        <div class="col-md-6">
            <table class="table">
                <thead>
                    <tr>
                        <th>Country</th>
                        <th>Local views</th>
                        <th>% of Fans Base</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(country, index) in data">
                        <td><input type="text" class="form-control" v-model="country.country"></td>
                        <td><input type="number" min="0" class="form-control" v-model="country.local_views"></td>
                        <td><input type="number" min="0" max="100" class="form-control" v-model="country.fans_base"></td>
                        <td><a href="#" class="btn btn-danger" @click.prevent="removeCountry(index)">remove</a></td>
                    </tr>
                </tbody>
            </table>
            <a href="#" class="btn btn-default" @click.prevent="addCountry">Add country</a>
        </div>
        <input type="hidden" :value="JSON.stringify(data)" name="country_report">
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
            addCountry () {
                this.data.push({country: '', local_views: '', fans_base: '' })
            },
            removeCountry(index) {
                this.data.splice(index, 1)
            }
        }
    }
</script>