
  </div>
  <!-- End of Main Content -->
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
        	<p class="text-danger">Delete User? This action is irreversible.</p>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-danger" id="confirm">Confirm Delete</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  <script type="text/javascript" src="js/datatables.min.js"></script>
  <script src="js/toastr.min.js"></script>

<?php if ($title == "Attendance"): ?>
  <link rel="stylesheet" type="text/css" href="vendor/select/css/select2.min.css">
  <script type="text/javascript" src="vendor/select/js/select2.min.js"></script>
  <script type="text/javascript" src="js/attendance.js"></script>
<?php endif ?>


<?php if ($title == "History"): ?>
  <link rel="stylesheet" type="text/css" href="vendor/select/css/select2.min.css">
  <script type="text/javascript" src="vendor/select/js/select2.min.js"></script>
  <script type="text/javascript" src="js/history.js"></script>
<?php endif ?>

</body>

</html>
