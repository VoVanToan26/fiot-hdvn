<?php

/**
 * 
 */
class Controller
{
	protected $folder;

	function render($file, $data = array(), $title = null, $admin = null)
	{
		$file_path = "projects/qc/views/" . $this->folder . "/" . $file . ".php";
		if (file_exists($file_path)) {

			ob_start(); //start output buffering
			require_once($file_path);
			$content = ob_get_clean(); // gui toan bo code len server va luu vao bien content
			if ($admin == null && $file != "autopopup" && $file != "sign") {
				$active_page_main = "qc";
				$active_page_sub = $file . 'qc';
				require_once 'projects/common/views/layouts/application.php';
				require_once 'projects/common/views/layouts/event_qc.php';
				// require_once 'projects/common/views/layouts/event_qc2.php';
				// echo $active_page_sub;
			}
			 else {
				require_once 'projects/common/views/layouts/admin.php';
			}
		} else {
			echo "Khong tim thay view";
			echo "<br>" . $file_path;
		}
	}
}
