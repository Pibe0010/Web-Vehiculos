
</main>
<footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script>
        $(document).ready(function(){
            $('table').dataTable({
                pageLength:100,
    legthMenu: [
        [10, 50, 100, 500],
    ],
    columnDef: [{
        searchable: false,
        target: [0, 1, 2, 3, 5]
        },
        
    ],
    searching: true,
    searchBuilder: true,
    responsive: true,
    "language": {
        "url": "https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
    },
    dom: "<Bf<tl>ip>",
    buttons: [{
            extend: "excelHtml5",
            text: "<i class='fa fa-file-csv' ></i>",
            titleAttr: 'Exportar a Excel',
            className: 'btn btn-success',
        },
        {
            extend: "pdfHtml5",
            text: "<i class='fa fa-file-pdf' ></i>",
            titleAttr: 'Exportar en PDF',
            className: 'btn btn-danger',
        },
        {
            extend: "print",
            text: "<i class='fa fa-print' ></i>",
            titleAttr: 'Imprimir',
            className: 'btn btn-primary',
        },

            ],
        });
    });
    </script>
</body>

</html>