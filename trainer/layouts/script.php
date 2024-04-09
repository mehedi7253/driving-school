<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/18/2020
 * Time: 7:22 PM
 */
?>
<script src="../assets/js/jquery.min.js"></script>
<!--<script src="front/assets/js/vendor/jquery-2.1.4.min.js"></script>-->
<script src="front/assets/js/popper.min.js"></script>
<script src="front/assets/js/plugins.js"></script>
<script src="front/assets/js/main.js"></script>


<script src="front/assets/js/lib/data-table/datatables.min.js"></script>
<script src="front/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="front/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="front/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="front/assets/js/lib/data-table/jszip.min.js"></script>
<script src="front/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="front/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="front/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="front/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="front/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="front/assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table-export').DataTable();
    } );
</script>



<script>
    ( function ( $ ) {
        "use strict";

        jQuery( '#vmap' ).vectorMap( {
            map: 'world_en',
            backgroundColor: null,
            color: '#ffffff',
            hoverOpacity: 0.7,
            selectedColor: '#1de9b6',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: [ '#1de9b6', '#03a9f5' ],
            normalizeFunction: 'polynomial'
        } );
    } )( jQuery );
</script>

<script>
    CKEDITOR.replace('application',
        {
            height:300,
            resize_enabled:true,
            wordcount: {
                showParagraphs: false,
                showWordCount: true,
                showCharCount: true,
                countSpacesAsChars: true,
                countHTML: false,

                maxCharCount: 20}
        });
</script>

<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","getuser.php?q="+str,true);
            xmlhttp.send();
        }
    }
</script>