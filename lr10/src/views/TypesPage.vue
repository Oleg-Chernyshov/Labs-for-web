<template>
  <Layout title="Ремонт">
    <TypeList />
  </Layout>
</template>

<script>
import Layout from '@/components/Layout/Layout';
import TypeList from '@/components/TypeList/TypeList';

export default {
  name: 'TypesPage',
  components: {
    Layout,
    TypeList,
  }
}
</script>
