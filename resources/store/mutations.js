
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

    SET_META : function (state,meta) {
        state.meta = meta
    },

    SET_DATA_SINGLE : function (state,dataSingle) {
        state.dataSingle = dataSingle
    },
}
