

window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});

let dataTable;
let dataTableInitialized = false

let dataTableOption =  {
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


}

$(function() {
    $('table').dataTable(dataTableOption);
});

