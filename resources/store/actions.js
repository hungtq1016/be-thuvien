import axios from "axios"
import VueCookies from 'vue-cookies'
const config = {
    headers: {
        Authorization: `Bearer ${ VueCookies.get("ltoken")}`,
    }
}
export default {
    async getDataTable({ commit,getters}, payload) {
        await axios.get(`/api/${payload.resource}?page=${payload.page}&limit=${getters.getLimit}`)
            .then((response) => {
                commit('SET_DATA_TABLE', response.data.data)
                commit('SET_LINKS', response.data.links)
                commit('SET_META', response.data.meta)
            })
    },

    async getDataTableByLink({ commit,getters }, payload) {
        await axios.get(`${payload.link}&limit=${getters.getLimit}`)
            .then((response) => {
                commit('SET_DATA_TABLE', response.data.data)
                commit('SET_LINKS', response.data.links)
                commit('SET_META', response.data.meta)
            })
    },

    async destroyData({ getters, dispatch }, payload) {
        await axios.delete(`/api/${payload.resource}/${payload.id}`, config)
        dispatch(`getDataTable`, {resource:payload.resource, page: getters.getMeta.current_page})
    },

    async updateStatus({ getters, dispatch }, payload) {
        await axios.put(`/api/${payload.resource}/${payload.id}/update`, { status: payload.status }, config);
        dispatch(`getDataTable`, {resource:payload.resource, page: getters.getMeta.current_page})
    },
}
