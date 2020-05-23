</div>
  </div>
</div>

<!-- BEGIN VENDOR JS-->

<script src="{{'app-assets/vendors/js/core/jquery-3.2.1.min.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/vendors/js/core/popper.min.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/vendors/js/core/bootstrap.min.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/vendors/js/perfect-scrollbar.jquery.min.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/vendors/js/prism.min.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/vendors/js/jquery.matchHeight-min.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/vendors/js/screenfull.min.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/vendors/js/pace/pace.min.js'}}" type="text/javascript"></script>
 <!-- BEGIN VENDOR JS-->
 <!-- BEGIN PAGE VENDOR JS-->
 {{-- <script src="{{'app-assets/vendors/js/chartist.min.js'}}" type="text/javascript"></script> --}}
 <!-- END PAGE VENDOR JS-->
 <!-- BEGIN APEX JS-->
 <script src="{{'app-assets/js/app-sidebar.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/js/notification-sidebar.js'}}" type="text/javascript"></script>
 <script src="{{'app-assets/js/customizer.js'}}" type="text/javascript"></script>
 <!-- END APEX JS-->
 <!-- BEGIN PAGE LEVEL JS-->
 {{-- <script src="{{'app-assets/js/dashboard1.js'}}" type="text/javascript"></script> --}}
 
<script language="javascript" type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.10.0/localization/messages_es.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>

 <script >
 $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
 </script>