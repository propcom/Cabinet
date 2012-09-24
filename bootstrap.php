<?php

Autoloader::add_classes(array(
	'DotsUnited\Cabinet\MimeType\Detector\FileinfoDetector' => __DIR__.'/src/DotsUnited/Cabinet/MimeType/Detector/FileinfoDetector.php',
	'DotsUnited\Cabinet\MimeType\Detector\DetectorInterface' => __DIR__.'/src/DotsUnited/Cabinet/MimeType/Detector/DetectorInterface.php',
	'DotsUnited\Cabinet\Adapter\AdapterInterface' => __DIR__.'/src/DotsUnited/Cabinet/Adapter/AdapterInterface.php',
	'DotsUnited\Cabinet\Adapter\StreamAdapter' => __DIR__.'/src/DotsUnited/Cabinet/Adapter/StreamAdapter.php',
	'DotsUnited\Cabinet\Adapter\AmazonS3Adapter' => __DIR__.'/src/DotsUnited/Cabinet/Adapter/AmazonS3Adapter.php',
	'DotsUnited\Cabinet\Cabinet' => __DIR__.'/src/DotsUnited/Cabinet/Cabinet.php',
	'DotsUnited\Cabinet\Filter\FilterInterface' => __DIR__.'/src/DotsUnited/Cabinet/Filter/FilterInterface.php',
	'DotsUnited\Cabinet\Filter\FilterChain' => __DIR__.'/src/DotsUnited/Cabinet/Filter/FilterChain.php',
	'DotsUnited\Cabinet\Filter\CallbackFilter' => __DIR__.'/src/DotsUnited/Cabinet/Filter/CallbackFilter.php',
	'DotsUnited\Cabinet\Filter\HashedSubpathFilter' => __DIR__.'/src/DotsUnited/Cabinet/Filter/HashedSubpathFilter.php',
));
