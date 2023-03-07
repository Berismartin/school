<script src="js/jquery/jquery3.6.3.js" charset="utf-8"></script>

<script src="assets/bootstrap4.6.2/js/bootstrap.js" charset="utf-8"></script>
<script src="assets/bootstrap4.6.2/js/bootstrap.min.js" charset="utf-8"></script>
<script src="assets/bootstrap4.6.2/js/bootstrap.bundle.js" charset="utf-8"></script>

<!-- order of the jquery matters for datatables -->
<script src="js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="js/dataTables.bootstrap.min.js" charset="utf-8"></script>
<script src="js/boot.js" charset="utf-8"></script>

<script src="js/tooltip-viewport.js"></script>

<script src="js/multiple-subject-forms.js"></script>
<script src="js/streams.js"></script>
<script src="js/sidebar.js"></script>

<script src="js/alerts.js"></script>
<script src="js/funcs.js"></script>


 <script type="text/javascript" src="js/modal-check-form.js"></script>
<script src="js/feather.js" charset="utf-8"></script>





<!-- inializa datatables -->
<script>

  $(document).ready(function () {
    $('.beristable').DataTable({
      "retrieve": true,
      "processing": true,
      language: {
        searchPlaceholder: '--Search data--'
      }
    });
    feather.replace();
  });

</script>
