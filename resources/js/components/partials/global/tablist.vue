<template>
    <div>
        <div class="wrapper d-block d-sm-flex align-items-center justify-content-between">
            <h4 class="card-title mb-0">Details</h4>
            <ul class="nav nav-tabs tab-solid tab-solid-primary mb-0" id="myTab" role="tablist">
                <li class="nav-item"
                    v-for="tab in tabs"
                    :key="tab"
                    v-on:click="switchTab(tab);">
                    <a v-bind:class="['nav-link', {
                            'active': activeTab === tab
                        }]"
                       data-toggle="tab"
                       role="tab">
                        <slot :name="tabHeadSlotName(tab)">
                            {{ tab }}
                        </slot>
                    </a>
                </li>
            </ul>
        </div>
        <div class="wrapper">
            <hr>
            <div class="tab-content border-0" id="myTabContent">
                <div class="tab-pane fade show active" role="tabpanel">
                    <slot :name="tabPanelSlotName"> </slot>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "tablist",
        props: {
            initialTab: String,
            tabs: Array
        },
        data() {
            return {
                activeTab: this.initialTab
            };
        },
        computed: {
            tabPanelSlotName() {
                return `tab-panel-${this.activeTab}`;
            }
        },
        methods: {
            tabHeadSlotName(tabName) {
                return `tab-head-${tabName}`;
            },

            switchTab(tabName) {
                this.activeTab = tabName;
            }
        }
    }
</script>

<style scoped>

</style>
