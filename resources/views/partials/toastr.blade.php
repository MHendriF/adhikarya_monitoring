<script type="text/javascript">
  @if(Session::has('create'))
     $.toast({
      heading: 'Create Success',
      text: '{{ Session::get('create') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'success',
      hideAfter: 3500,
      stack: 6
    });
  @elseif(Session::has('update'))
    $.toast({
      heading: 'Update Success',
      text: '{{ Session::get('update') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'success',
      hideAfter: 3500,
      stack: 6
    });
  @elseif(Session::has('delete'))
    $.toast({
      heading: 'Delete Success',
      text: '{{ Session::get('delete') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'success',
      hideAfter: 3500,
      stack: 6
    });
    @elseif(Session::has('restore'))
    $.toast({
      heading: 'Restore Success',
      text: '{{ Session::get('restore') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'success',
      hideAfter: 3500,
      stack: 6
    });
    @elseif(Session::has('error'))
    $.toast({
      heading: 'Opps! something went wrong',
      text: '{{ Session::get('error') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'error',
      hideAfter: 3500,
      stack: 6
    });
    @elseif(Session::has('error401'))
    $.toast({
      heading: 'Access Denied',
      text: '{{ Session::get('error401') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'error',
      hideAfter: 3500,
      stack: 6
    });
    @elseif(Session::has('error405'))
    $.toast({
      heading: 'Not Allowed',
      text: '{{ Session::get('error405') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'error',
      hideAfter: 3500,
      stack: 6
    });
    @elseif(Session::has('berhasil'))
    $.toast({
      heading: 'Delete Success',
      text: '{{ Session::get('berhasil') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'success',
      hideAfter: 3500,
      stack: 6
    });
    @elseif(Session::has('gagal'))
    $.toast({
      heading: 'Delete Failed',
      text: '{{ Session::get('gagal') }}',
      position: 'bottom-right',
      loaderBg:'#e69a2a',
      icon: 'error',
      hideAfter: 3500,
      stack: 6
    });
  @endif
</script>
