<template>
  <Layout title="Материалы">
    <MaterialList />
  </Layout>
</template>

<script>
import Layout from "@/components/Layout/Layout";
import MaterialList from "@/components/MaterialList/MaterialList";

export default {
  name: "MaterialPage",
  components: {
    Layout,
    MaterialList,
  },
};
</script>
