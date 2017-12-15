<template>
      <div class="form-group">
          <label class="col-md-6"><h3>Actions Overview</h3></label>
          <table class="table">
              <thead>
              <tr>
                  <th>Resources</th>
                  <th>People Reached (plan)</th>
                  <th>People Reached (fact)</th>
                  <th>Views (plan)</th>
                  <th>Views (Fact)</th>
                  <th>Engagements</th>
                  <th>VTR</th>
                  <th>CTR</th>
                  <th>CPV</th>
                  <th>Total Spend</th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="(resource, index) in data">
                  <td>{{resource.name}}</td>
                  <td><input type="number" class="form-control" v-model="resource.pr_plan"/></td>
                  <td><input type="number" class="form-control" v-model="resource.pr_fact"/></td>
                  <td><input type="number" class="form-control" v-model="resource.views_plan"/></td>
                  <td><input type="number" class="form-control" v-model="resource.views_fact"/></td>
                  <td>{{parseInt(resource.views_fact*0.08)}}</td>
                  <td>{{Math.round((resource.views_fact / resource.pr_fact) * 1000) / 10}}%</td>
                  <td>{{Math.round(((resource.views_fact * 0.08) / resource.pr_fact) * 1000) / 10}}%</td>
                  <td><input type="number" step="0.01" min="0" class="form-control" v-model="resource.cpv"/></td>
                  <td>{{Math.round((resource.views_fact * resource.cpv) * 100) / 100}} тг</td>
                  <td><a href="#" class="btn btn-danger" @click="removeResource(index, resource.name)">remove</a></td>
              </tr>
              <tr v-if="data.length > 0">
                  <td>TOTAL</td>
                  <td>{{peopleReachedPlanTotal}}</td>
                  <td>{{peopleReachedFactTotal}}</td>
                  <td>{{viewsPlanTotal}}</td>
                  <td>{{viewsFactTotal}}</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td>SUB</td>
                  <td>{{Math.round(spendTotal*100)/100}}</td>
              </tr>
              </tbody>
          </table>
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
          <input type="hidden" :value="JSON.stringify(data)" name="actions_overview">
      </div>
</template>

<script>
    export default {
        props: ['parameters'],
        data () {
            return {
                resources: ['Display', 'Pre-Roll','Facebook','Instagram','Youtube','VK','Odnoklassniki'],
                data: this.parameters
            }
        },
        methods: {
            addResource(index, resource) {
                this.resources.splice(index, 1)
                this.data.push({name: resource, pr_plan: '', pr_fact: '', views_plan: '', views_fact: '', cpv: ''})
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
            peopleReachedPlanTotal () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.pr_plan)
                });
                return total
            },
            peopleReachedFactTotal () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.pr_fact)
                });
                return total
            },
            viewsPlanTotal () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.views_plan)
                });
                return total
            },
            viewsFactTotal () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.views_fact)
                });
                return total
            },
            spendTotal () {
                let total = 0;
                this.data.forEach(function(item) {
                    total += parseInt(item.views_fact) * parseFloat(item.cpv)
                });
                return total
            }
        }
    }
</script>

<style>
    table {
        table-layout: auto;
        border-collapse: collapse;
        width: 100%;
    }
    table td {
        border: 1px solid #ccc;
    }
    table .absorbing-column {
        width: 100%;
    }
</style>