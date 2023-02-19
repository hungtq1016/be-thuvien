
export default {
    SET_RESOURCE : function (state,resource) {
        state.resource = resource
    },

    SET_LIMIT : function (state,limit) {
        state.limit = limit
    },

    SET_DATA_TABLE : function (state,dataTable) {
        state.dataTable = dataTable
    },
    SET_LINKS : function (state,links) {
        state.links = links
    },
    SET_ROW : function (state,clickedRow) {
        state.clickedRow = clickedRow
    },

    OPEN_MODAL : function (state) {
        state.openModal = true
    },

    CLOSE_MODAL : function (state) {
        state.openModal = false
    },

    SET_META : function (state,meta) {
        state.meta = meta
    },

    SET_IS_UPDATE : function (state,isUpdate) {
        state.isUpdate = isUpdate
    },

    SET_UPDATE_DATA : function (state,updateData) {
        state.updateData = updateData
    },
}
