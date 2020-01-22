function getColumnValue(columnName, index) {
            var column = null;
            
            $('table thead th').each(function(index, item) {
              //encontra o index da coluna em causa
              column = $(item).text() == columnName ? index : column;
            });
            return column;
}
function getColumnValueTableFatura(columnName, index) {
            var column = null;
            
            $('.tableFatura thead th').each(function(index, item) {
              //encontra o index da coluna em causa
              column = $(item).text() == columnName ? index : column;
            });
            return column;
}