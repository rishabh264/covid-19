<template>
  <div>
    <h1 class="mb-8 font-bold text-3xl">Home page</h1>
    <p class="mb-4 leading-normal">
      Update:
      <b class="font-bold">{{configs.auto_update == 1? 'Automatic': 'Manual'}}</b>
    </p>
    <p class="mb-4 leading-normal">
      Updated at:
      <b class="font-bold">{{date}}</b>
    </p>
    <p class="mb-4 leading-normal">
      Confirmed cases:
      <b class="font-bold">{{general.confirmed}}</b>
    </p>
    <p class="mb-4 leading-normal">
      Active cases:
      <b class="font-bold">{{general.active}}</b>
    </p>
    <p class="mb-4 leading-normal">
      Recovered:
      <b class="font-bold">{{general.recovered}}</b>
    </p>
    <p class="mb-4 leading-normal">
      Suspected cases:
      <b class="font-bold">{{general.suspects}}</b>
    </p>
    <p class="mb-4 leading-normal">
      Deaths:
      <b class="font-bold">{{general.deaths}}</b>
    </p>
  </div>
</template>

<script>
import Layout from "@/admin/Shared/Layout";

export default {
  metaInfo: { title: "Home" },
  props: {
    general: Object,
    configs: Object,
    date: String
  },
  layout: Layout
};
</script>
