



        <!-- BEGIN : Footer-->
        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2019 <a href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">PIXINVENT </a>, All rights reserved. </span></p>
        </footer>
        <!-- End : Footer-->

      </div>
    </div>
 <!-- BEGIN VENDOR JS-->

 <script src="{{'/app-assets/vendors/js/core/jquery-3.2.1.min.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/vendors/js/core/popper.min.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/vendors/js/core/bootstrap.min.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/vendors/js/perfect-scrollbar.jquery.min.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/vendors/js/prism.min.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/vendors/js/jquery.matchHeight-min.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/vendors/js/screenfull.min.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/vendors/js/pace/pace.min.js'}}" type="text/javascript"></script>
 <!-- BEGIN VENDOR JS-->
 <!-- BEGIN PAGE VENDOR JS-->
 <script src="{{'/app-assets/vendors/js/jqBootstrapValidation.js'}}" type="text/javascript"></script>
 {{-- <script src="{{'/app-assets/vendors/js/chartist.min.js'}}" type="text/javascript"></script> --}}
 <!-- END PAGE VENDOR JS-->
 <!-- BEGIN APEX JS-->
 <script src="{{'/app-assets/js/app-sidebar.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/js/notification-sidebar.js'}}" type="text/javascript"></script>
 <script src="{{'/app-assets/js/customizer.js'}}" type="text/javascript"></script>
 <!-- END APEX JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 <script src="{{'/app-assets/js/form-validation.js'}}" type="text/javascript"></script>
 {{-- <script src="{{'/app-assets/js/dashboard1.js'}}" type="text/javascript"></script> --}}

 <script >
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>

 <!-- END PAGE LEVEL JS-->


</body>
<!-- END : Body-->
</html>
