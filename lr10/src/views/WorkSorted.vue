<template>
    <Layout title="Работы">
      <WorkSortedList />
    </Layout>
  </template>
  
  <script>
  import Layout from '@/components/Layout/Layout';
  import WorkSortedList from '@/components/WorkSortedList/WorkSortedList';
  import Btn from '@/components/Btn/Btn.vue';
  
  export default {
    name: 'Works',
    components: {
      Layout,
      WorkSortedList,
      Btn
    },
  }
  </script>
  
  