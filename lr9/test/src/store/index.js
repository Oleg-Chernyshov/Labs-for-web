import { createStore } from 'vuex'
import students from './students';
import groups from './groups';
export default createStore({
  modules: {
    students,
    groups,
  },
  state: {},
  mutations: {},
  actions: {},
})
