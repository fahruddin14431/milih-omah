        </div>
    </main>
    <script charset="utf-8" src="<?= base_url() ?>assets/js/vendors.min.js"></script>

    <!-- data table -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>    
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.material.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>    
    <script src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>

    <!-- data table utils  -->
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>

    <!-- validation -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>





    <script>
        $(document).ready( function () {
            
            // datatable
            $('#example').DataTable({
                responsive:true
            });

            $('#export').DataTable({                
                dom: 'Bfrtip',
                responsive:true,
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            
            // routing class active on click
            $("a").filter(function() {
                return this.href === document.location.href;
            }).addClass("active-add active");
        });
        </script>
    <script charset="utf-8" src="<?= base_url() ?>assets/js/app.min.js"></script>
</body>