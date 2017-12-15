<template>
    <div class="form-group">
        <label><h3>SMM Overview</h3></label>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>Resources</th>
                    <th>Total Fans (plan)</th>
                    <th>Total Fans (fact)</th>
                    <th>Page Posts (plan)</th>
                    <th>Page Posts (Fact)</th>
                    <th>Total Interactions</th>
                    <th>Reactions</th>
                    <th>Comments</th>
                    <th>Shares</th>
                    <th>Relative Change in Fans Spend</th>
                    <th>CPV</th>
                    <th>Total Spend</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(resource, index) in data">
                    <td>{{resource.name}}</td>
                    <td><input type="number" class="form-control" v-model="resource.tf_plan"/></td>
                    <td><input type="number" class="form-control" v-model="resource.tf_fact"/></td>
                    <td><input type="number" class="form-control" v-model="resource.pp_plan"/></td>
                    <td><input type="number" class="form-control" v-model="resource.pp_fact"/></td>
                    <td>{{parseInt(resource.reactions) + parseInt(resource.comments) + parseInt(resource.shares)}}</td>
                    <td><input type="number" min="0" class="form-control" v-model="resource.reactions"></td>
                    <td><input type="number" min="0" class="form-control" v-model="resource.comments"></td>
                    <td><input type="number" min="0" class="form-control" v-model="resource.shares"></td>
                    <td>{{Math.round((resource.tf_fact / resource.tf_plan) * 10000) / 100}} %</td>
                    <td><input type="number" step="0.01" min="0" class="form-control" v-model="resource.cpv"></td>
                    <td>{{Math.round((resource.pp_fact * resource.cpv) * 100) / 100}}</td>
                    <td><a href="#" class="btn btn-danger" @click="removeResource(index, resource.name)">remove</a></td>
                </tr>
                <tr v-if="data.length > 0">
                    <td>TOTAL</td>
                    <td>{{totalFansPlan}}</td>
                    <td>{{totalFansFact}}</td>
                    <td>{{pagePostsPlan}}</td>
                    <td>{{pagePostsFact}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>SUB</td>
                    <td>{{Math.round(totalSpend * 100) / 100}}</td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="btn-group" v-if="resources.length > 0">
            <button type="button" class="btn btn-default">Add Resource</button>
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu">
                <li v-for="(resource, index) in resources"><a href="#" @click="addResource(index, resource)">{{resource}}</a></li>
            </ul>
        </div>
        <input type="hidden" :value="JSON.stringify(data)" name="smm_overview">
    </div>
</template>

<script>
    export default {
        props: ['parameters'],
        data () {
            return {
                data: this.parameters,
                resources: ['Display', 'Pre-Roll','Facebook','Instagram','Youtube','VK','Odnoklassniki']
            }
        },
        methods: {
            addResource(index, resource) {
                this.resources.splice(index, 1)
                this.data.push({name: resource, tf_plan: '', tf_fact: '', pp_plan: '', pp_fact: '', reactions: 0, comments: 0, shares: 0, cpv: ''})
            },
            removeResource(index, resource) {
                this.data.splice(index, 1)
                this.resources.push(resource)
            }
        },
        mounted () {
            if(this.parameters.length > 0) {
                let self = this
                self.parameters.forEach(function (item) {
                    if(self.resources.includes(item.name)) {
                        let index = self.resources.indexOf(item.name)
                        self.resources.splice(index, 1)
                    }
                })
            }
        },
        computed: {
            totalFansPlan () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.tf_plan)
                });
                return total
            },
            totalFansFact () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.tf_fact)
                });
                return total
            },
            pagePostsPlan () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.pp_plan)
                });
                return total
            },
            pagePostsFact () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.pp_fact)
                });
                return total
            },
            totalSpend () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.pp_fact) * parseFloat(item.cpv)
                });
                return total
            }
        }
    }
</script>