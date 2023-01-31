import axios from "axios"
import VueCookies from 'vue-cookies'
const config = {
    headers: {
        Authorization: `Bearer ${ VueCookies.get("ltoken")}`,
    }
}
export default {
    async getData({ commit, getters }, payload) {
        await axios.get(`/api/${getters.getResource}?page=${payload.page}`)
            .then((response) => {
                commit('SET_TAGS', response.data.data)
            })
    },

    async destroyData({ getters, dispatch }, payload) {
        await axios.delete(`/api/${getters.getResource}/${payload.id}`, config)
        dispatch(`getData`, { page: payload.page })
    },

    async updateStatus({ getters, dispatch }, payload) {
        payload.status == 1 ? (payload.status = 0) : (payload.status = 1);
        await axios.put(`/api/${getters.getResource}/${payload.id}/update`, { status: payload.status }, config);
        dispatch(`getData`, { page: payload.page })
    },

    async getDataLabel({ commit, getters }) {
        await axios.get(`/api/get-col-name/${getters.getResource}`, config)
            .then((response) => {
                commit('SET_LABEL', response.data)
            })
    }
}
