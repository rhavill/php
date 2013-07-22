<?php

class Zipper extends ZipArchive {
   
public function addDir($path) {
    print 'adding ' . $path . "\n";
    $this->addEmptyDir($path);
    $nodes = glob($path . '/*');
    foreach ($nodes as $node) {
        print $node . "\n";
        if (is_dir($node)) {
            $this->addDir($node);
        } else if (is_file($node))  {
            $this->addFile($node);
        }
    }
}
   
} // class Zipper

$handle = opendir(".");
if ($handle === FALSE) {
    throw new \Exception("Could not read directory $dir. Check if it exists and check directory permissions.");
}
while (FALSE !== ($file = readdir($handle))) {
    $info = pathinfo($file);
    if (is_dir($info['filename'])) {
    	print $info['filename']."\n";
		$zip = new Zipper;
		$res = $zip->open($info['filename'].'.zip', Zipper::CREATE);
		if ($res === TRUE) {
		    $zip->addDir($info['filename']);
		    $zip->close();
		    //echo 'ok';
		} else {
		    echo 'failed';
		}    	
    }
}
