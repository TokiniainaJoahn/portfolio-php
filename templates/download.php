<?php
header('content-disposition: attachement ; filename="mon_cv.pdf');
readfile('mon_cv/mon_cv.pdf');
exit;
?>