<template>
  <Layout title="Ремонт">
    <GroupList />
  </Layout>
</template>

<script>
import Layout from '@/components/Layout/Layout';
import GroupList from '@/components/GroupList/GroupList';

export default {
  name: 'GroupsPage',
  components: {
    Layout,
    GroupList,
  }
}
</script>
