 $(document).ready(function () {
            $("#jqGrid").jqGrid({
                url: 'http://localhost:9090/nicolas/assets/js/data.json',
                datatype: "json",
                colModel: [
                    { label: 'Category Name', name: 'CategoryName', width: 75 },
                    { label: 'Product Name', name: 'ProductName', width: 90 },
                    { label: 'Country', name: 'Country', width: 100 },
                    { label: 'Price', name: 'Price', width: 80, sorttype:'number' },
                    { label: 'Quantity', name: 'Quantity', width: 120, sorttype:'integer' }                   
                ],
                loadonce: true,
                width: 970,
                height: 400,
                rowNum: 100,
                viewrecords: true,
                pager: "#jqGridPager",
                caption: "Amounts of each product category"
            });
        });
