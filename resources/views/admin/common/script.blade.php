<!-- Vendor JS -->
<script src="{{asset('backend/js/vendors.min.js')}}"></script>
<script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('../assets/vendor_components/easypiechart/dist/jquery.easypiechart.js')}}"></script>
<script src="{{asset('../assets/vendor_components/apexcharts-bundle/irregular-data-series.js')}}"></script>
<script src="{{asset('../assets/vendor_components/apexcharts-bundle/dist/apexcharts.js')}}"></script>

<!-- Sunny Admin App -->
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/pages/dashboard.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  @if(Session::has('message'))
  let type = "{{Session::get('alert-type', 'info')}}"
  switch (type) {
    case 'info':
      toastr.info("{{Session::get('message')}}")
      break
    case 'success':
      toastr.success("{{Session::get('message')}}")
      break
    case 'warning':
      toastr.warning("{{Session::get('message')}}")
      break
    case 'error':
      toastr.error("{{Session::get('message')}}")
      break
  }
  @endif
</script>