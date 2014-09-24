<?php

	for($i = 1; $i <= 100000; $i++){

		$content = "Loop-Run #$i\n";

		file_put_contents("/daemons/logs/mydeamon.log", $content, FILE_APPEND | LOCK_EX);

		sleep(5);

	}

?>
