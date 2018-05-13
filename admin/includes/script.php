

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/Buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/Buttons/js/buttons.bootstrap.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/Buttons/js/buttons.print.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/Buttons/js/buttons.flash.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/Buttons/js/buttons.html5.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/AutoFill/js/dataTables.autoFill.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/RowReorder/js/dataTables.rowReorder.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>plugins/DataTables/extensions/Select/js/dataTables.select.min.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>js/table-manage-combine.demo.min.js"></script>

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?php echo PUBLIC_URL; ?>plugins/parsley/dist/parsley.js"></script>
	<script src="<?php echo PUBLIC_URL; ?>js/apps.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	
	<script>
		$(document).ready(function() {
			App.init();
			TableManageCombine.init();
		});
	</script>