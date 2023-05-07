<template>
  <Layout title="Работы">
    <WorkList />
  </Layout>
</template>

<script>
import Layout from '@/components/Layout/Layout';
import WorkList from '@/components/WorkList/WorkList';
import Btn from '@/components/Btn/Btn.vue';

export default {
  name: 'Works',
  components: {
    Layout,
    WorkList,
    Btn
  },
}
</script>
