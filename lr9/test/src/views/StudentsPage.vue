<template>
  <Layout title="Работы">
    <StudentList />
  </Layout>
</template>

<script>
import Layout from '@/components/Layout/Layout';
import StudentList from '@/components/StudentList/StudentList';

export default {
  name: 'Students',
  components: {
    Layout,
    StudentList,
  }
}
</script>
