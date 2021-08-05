<script src="{{ URL::asset('assets-light/scripts/jquery-2.2.3.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/scripts/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/scripts/modernizr.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/plugin/nprogress/nprogress.js') }}"></script>
<script src="{{ URL::asset('assets-light/plugin/sweet-alert/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/plugin/waves/waves.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/plugin/moment/moment.js') }}"></script>
<!-- Full Screen Plugin -->
<script src="{{ URL::asset('assets-light/plugin/fullscreen/jquery.fullscreen-min.js') }}"></script>

<script src="{{ URL::asset('assets-light/scripts/main.min.js') }}"></script>
<script src="{{ URL::asset('assets-light/color-switcher/color-switcher.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.waves-effect').on('click', function(e) {
            // alert("1");
        })
    });

    jQuery(function($) { // DOM ready

        $('.menu').each(function() {

            var $tab = $(this).find(".waves-effect");

            $tab.on("click", function() {

                var tabId = this.id.replace(/\D/g, '');

                $tab.not(this).removeClass('current');
                $(this).addClass('current');

                // $(".tabContent").removeClass("current");
                // $("#tabs-"+tabId).addClass("current");

            });
        });

    });
</script>

<script src="{{ URL::asset('editor/DataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('editor/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('editor/Editor-1.9.2/js/dataTables.editor.min.js') }}"></script>
<script src="{{ URL::asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ URL::asset('editor/Buttons-1.6.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('editor/KeyTable-2.5.1/js/dataTables.keyTable.min.js ') }}"></script>
<script src="{{ URL::asset('editor/Select-1.3.1/js/dataTables.select.min.js') }}"></script>
