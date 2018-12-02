    <script src="admin_asset/lib/jquery/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="admin_asset/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="admin_asset/js/main.js" type="text/javascript"></script>
    <script src="admin_asset/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="admin_asset/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="admin_asset/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script src="admin_asset/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="admin_asset/datatable/datatables.min.js" type="text/javascript"></script>
    <script src="admin_asset/js/js.js" type="text/javascript" async></script>
    <script>
      tinymce.init({
        selector: "#mytextarea",theme: "modern",width: 838,height: 500,relative_urls : false,remove_script_host: false,
        plugins: [
        "advlist autolink link image lists charmap print preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
        "table contextmenu directionality emoticons paste textcolor responsivefilemanager code fullscreen"
        ],
        toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | fullscreen",
        image_caption: true,
        image_advtab: true ,

        external_filemanager_path:"{{asset('admin_asset')}}/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "{{asset('admin_asset')}}/filemanager/plugin.min.js"}
      });
    </script>
    <script>
      tinymce.init({
        selector: "#textarea",theme: "modern",width: 838,height: 500,relative_urls : false,remove_script_host: false,readonly : 1
      });
    </script>
    
    <script type="text/javascript">
      $(function () {
        $('#datetimepicker').datetimepicker({
          viewMode: 'month'
        });
      });
    </script>

    <script>
      $(document).ready(function() {
        $('.table12').DataTable({
          "language": {
            "decimal":        "",
            "emptyTable":     "Không có dữ liệu trong bảng",
            "info":           "Từ _START_ đến _END_ của _TOTAL_ mục",
            "infoEmpty":      "Hiển thị 0 đến 0 trong số 0 mục",
            "infoFiltered":   "(được lọc từ tổng số _MAX_ mục nhập)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Số lượng _MENU_",
            "loadingRecords": "Đang tải...",
            "processing":     "Đang xử lí...",
            "search":         "Tìm kiếm:",
            "zeroRecords":    "Không tìm thấy kết quả",
            "paginate": {
              "first":      "Đầu",
              "last":       "Cuối",
              "next":       "Tiếp",
              "previous":   "Lùi"
            },
            "aria": {
              "sortAscending":  ": activate to sort column ascending",
              "sortDescending": ": activate to sort column descending"
            }
          }
        });
      });
    </script>
    <script type="text/javascript">
      // $('#btndate').click
      $('#date').focus(function(){
        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
         dd = '0'+dd
       } 

       if(mm<10) {
        mm = '0'+mm
      } 

      today = mm + '/' + dd + '/' + yyyy;
      $('#date').val(today);
    })

      $(".select-student").click(function() {
        var a = $(this).parent().siblings('.idsv').children().text();
        var b = $(this).parent().siblings('.namesv').children().text();
        $(".selected-student-id").val(a);
        $(".selected-student-name").val(b);
      })
    </script>
  </body>
  </html>