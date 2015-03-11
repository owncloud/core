<?php
/**
 * Copyright (c) 2013 Frank Karlitschek frank@owncloud.org
 * Copyright (c) 2013 Georg Ehrke georg@ownCloud.com
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 *
 * Thumbnails:
 * structure of filename:
 * /data/user/thumbnails/pathhash/x-y.png
 *
 */
namespace OC;

use OC\Preview\Provider;
use OCP\Files\FileInfo;
use OCP\Files\NotFoundException;

class Preview {
	//the thumbnail folder
	const THUMBNAILS_FOLDER = 'thumbnails';

	//config
	private $maxScaleFactor;
	private $configMaxX;
	private $configMaxY;

	//fileview object
	private $fileView = null;
	private $userView = null;

	//vars
	private $file;
	private $maxX;
	private $maxY;
	private $scalingUp;
	private $mimeType;
	private $keepAspect = false;

	//filemapper used for deleting previews
	// index is path, value is fileinfo
	static public $deleteFileMapper = array();
	static public $deleteChildrenMapper = array();

	/**
	 * preview images object
	 *
	 * @var \OC_Image
	 */
	private $preview;

	//preview providers
	static private $providers = array();
	static private $registeredProviders = array();
	static private $enabledProviders = array();

	/**
	 * @var \OCP\Files\FileInfo
	 */
	protected $info;

	/**
	 * check if thumbnail or bigger version of thumbnail of file is cached
	 * @param string $user userid - if no user is given, OC_User::getUser will be used
	 * @param string $root path of root
	 * @param string $file The path to the file where you want a thumbnail from
	 * @param int $maxX The maximum X size of the thumbnail. It can be smaller depending on the shape of the image
	 * @param int $maxY The maximum Y size of the thumbnail. It can be smaller depending on the shape of the image
	 * @param bool $scalingUp Disable/Enable upscaling of previews
	 * @throws \Exception
	 * @return mixed (bool / string)
	 *                    false if thumbnail does not exist
	 *                    path to thumbnail if thumbnail exists
	 */
	public function __construct($user = '', $root = '/', $file = '', $maxX = 1, $maxY = 1, $scalingUp = true) {
		//init fileviews
		if ($user === '') {
			$user = \OC_User::getUser();
		}
		$this->fileView = new \OC\Files\View('/' . $user . '/' . $root);
		$this->userView = new \OC\Files\View('/' . $user);

		//set config
		$this->configMaxX = \OC::$server->getConfig()->getSystemValue('preview_max_x', 2048);
		$this->configMaxY = \OC::$server->getConfig()->getSystemValue('preview_max_y', 2048);
		$this->maxScaleFactor = \OC::$server->getConfig()->getSystemValue('preview_max_scale_factor', 2);

		//save parameters
		$this->setFile($file);
		$this->setMaxX($maxX);
		$this->setMaxY($maxY);
		$this->setScalingUp($scalingUp);

		$this->preview = null;

		//check if there are preview backends
		if (empty(self::$providers)) {
			self::initProviders();
		}

		if (empty(self::$providers) && \OC::$server->getConfig()->getSystemValue('enable_previews', true)) {
			\OCP\Util::writeLog('core', 'No preview providers exist', \OCP\Util::ERROR);
			throw new \Exception('No preview providers');
		}
	}

	/**
	 * returns the path of the file you want a thumbnail from
	 * @return string
	 */
	public function getFile() {
		return $this->file;
	}

	/**
	 * returns the max width of the preview
	 * @return integer
	 */
	public function getMaxX() {
		return $this->maxX;
	}

	/**
	 * returns the max height of the preview
	 * @return integer
	 */
	public function getMaxY() {
		return $this->maxY;
	}

	/**
	 * returns whether or not scalingup is enabled
	 * @return bool
	 */
	public function getScalingUp() {
		return $this->scalingUp;
	}

	/**
	 * returns the name of the thumbnailfolder
	 * @return string
	 */
	public function getThumbnailsFolder() {
		return self::THUMBNAILS_FOLDER;
	}

	/**
	 * returns the max scale factor
	 * @return string
	 */
	public function getMaxScaleFactor() {
		return $this->maxScaleFactor;
	}

	/**
	 * returns the max width set in ownCloud's config
	 * @return string
	 */
	public function getConfigMaxX() {
		return $this->configMaxX;
	}

	/**
	 * returns the max height set in ownCloud's config
	 * @return string
	 */
	public function getConfigMaxY() {
		return $this->configMaxY;
	}

	/**
	 * @return false|Files\FileInfo|\OCP\Files\FileInfo
	 */
	protected function getFileInfo() {
		$absPath = $this->fileView->getAbsolutePath($this->file);
		$absPath = Files\Filesystem::normalizePath($absPath);
		if(array_key_exists($absPath, self::$deleteFileMapper)) {
			$this->info = self::$deleteFileMapper[$absPath];
		} else if (!$this->info) {
			$this->info = $this->fileView->getFileInfo($this->file);
		}
		return $this->info;
	}


	/**
	 * @return array|null
	 */
	private function getChildren() {
		$absPath = $this->fileView->getAbsolutePath($this->file);
		$absPath = Files\Filesystem::normalizePath($absPath);

		if (array_key_exists($absPath, self::$deleteChildrenMapper)) {
			return self::$deleteChildrenMapper[$absPath];
		}

		return null;
	}

	/**
	 * set the path of the file you want a thumbnail from
	 * @param string $file
	 * @return $this
	 */
	public function setFile($file) {
		$this->file = $file;
		$this->info = null;

		if ($file !== '') {
			$this->getFileInfo();
			if($this->info instanceof \OCP\Files\FileInfo) {
				$this->mimeType = $this->info->getMimetype();
			}
		}
		return $this;
	}

	/**
	 * set mime type explicitly
	 * @param string $mimeType
	 */
	public function setMimetype($mimeType) {
		$this->mimeType = $mimeType;
	}

	/**
	 * set the the max width of the preview
	 * @param int $maxX
	 * @throws \Exception
	 * @return \OC\Preview $this
	 */
	public function setMaxX($maxX = 1) {
		if ($maxX <= 0) {
			throw new \Exception('Cannot set width of 0 or smaller!');
		}
		$configMaxX = $this->getConfigMaxX();
		if (!is_null($configMaxX)) {
			if ($maxX > $configMaxX) {
				\OCP\Util::writeLog('core', 'maxX reduced from ' . $maxX . ' to ' . $configMaxX, \OCP\Util::DEBUG);
				$maxX = $configMaxX;
			}
		}
		$this->maxX = $maxX;
		return $this;
	}

	/**
	 * set the the max height of the preview
	 * @param int $maxY
	 * @throws \Exception
	 * @return \OC\Preview $this
	 */
	public function setMaxY($maxY = 1) {
		if ($maxY <= 0) {
			throw new \Exception('Cannot set height of 0 or smaller!');
		}
		$configMaxY = $this->getConfigMaxY();
		if (!is_null($configMaxY)) {
			if ($maxY > $configMaxY) {
				\OCP\Util::writeLog('core', 'maxX reduced from ' . $maxY . ' to ' . $configMaxY, \OCP\Util::DEBUG);
				$maxY = $configMaxY;
			}
		}
		$this->maxY = $maxY;
		return $this;
	}

	/**
	 * set whether or not scalingup is enabled
	 * @param bool $scalingUp
	 * @return \OC\Preview $this
	 */
	public function setScalingup($scalingUp) {
		if ($this->getMaxScaleFactor() === 1) {
			$scalingUp = false;
		}
		$this->scalingUp = $scalingUp;
		return $this;
	}

	/**
	 * @param bool $keepAspect
	 * @return $this
	 */
	public function setKeepAspect($keepAspect) {
		$this->keepAspect = $keepAspect;
		return $this;
	}

	/**
	 * check if all parameters are valid
	 * @return bool
	 */
	public function isFileValid() {
		$file = $this->getFile();
		if ($file === '') {
			\OCP\Util::writeLog('core', 'No filename passed', \OCP\Util::DEBUG);
			return false;
		}

		if (!$this->fileView->file_exists($file)) {
			\OCP\Util::writeLog('core', 'File:"' . $file . '" not found', \OCP\Util::DEBUG);
			return false;
		}

		return true;
	}

	/**
	 * deletes previews of a file with specific x and y
	 * @return bool
	 */
	public function deletePreview() {
		$file = $this->getFile();

		$fileInfo = $this->getFileInfo($file);
		if($fileInfo !== null && $fileInfo !== false) {
			$fileId = $fileInfo->getId();

			$previewPath = $this->buildCachePath($fileId);
			return $this->userView->unlink($previewPath);
		}
		return false;
	}

	/**
	 * deletes all previews of a file
	 */
	public function deleteAllPreviews() {
		$toDelete = $this->getChildren();
		$toDelete[] = $this->getFileInfo();

		foreach ($toDelete as $delete) {
			if ($delete instanceof FileInfo) {
				/** @var \OCP\Files\FileInfo $delete */
				$fileId = $delete->getId();

				// getId() might return null, e.g. when the file is a
				// .ocTransferId*.part file from chunked file upload.
				if (!empty($fileId)) {
					$previewPath = $this->getPreviewPath($fileId);
					$this->userView->deleteAll($previewPath);
					$this->userView->rmdir($previewPath);
				}
			}
		}
	}

	/**
	 * Checks if thumbnail or bigger version of thumbnail of file is already cached
	 *
	 * @param int $fileId fileId of the original image
	 * @return string|false path to thumbnail if it exists or false
	 */
	public function isCached($fileId) {
		if (is_null($fileId)) {
			return false;
		}

		// This gives us a calculated path to a preview of asked dimensions
		// thumbnailFolder/fileId/my_image-<maxX>-<maxY>.png
		$preview = $this->buildCachePath($fileId);

		// This checks if a preview exists at that location
		if ($this->userView->file_exists($preview)) {
			return $preview;
		}

		return $this->isCachedBigger($fileId);
	}

	/**
	 * Checks if a bigger version of a file preview is cached and if not
	 * return the preview of max allowed dimensions
	 *
	 * @param int $fileId fileId of the original image
	 *
	 * @return string|false path to bigger thumbnail if it exists or false
	 */
	private function isCachedBigger($fileId) {

		if (is_null($fileId)) {
			return false;
		}

		$maxX = $this->getMaxX();

		//array for usable cached thumbnails
		// FIXME: Checking only the width could lead to issues
		$possibleThumbnails = $this->getPossibleThumbnails($fileId);

		foreach ($possibleThumbnails as $width => $path) {
			if ($width < $maxX) {
				continue;
			} else {
				return $path;
			}
		}

		// At this stage, we didn't find a preview, so if the folder is not empty,
		// we return the max preview we generated on the first run
		if ($possibleThumbnails) {
			return $possibleThumbnails['max'];
		}

		return false;
	}

	/**
	 * get possible bigger thumbnails of the given image
	 * @param int $fileId fileId of the original image
	 * @return array an array of paths to bigger thumbnails
	*/
	private function getPossibleThumbnails($fileId) {

		if (is_null($fileId)) {
			return array();
		}

		$previewPath = $this->getPreviewPath($fileId);

		$wantedAspectRatio = (float)($this->getMaxX() / $this->getMaxY());

		//array for usable cached thumbnails
		$possibleThumbnails = array();

		$allThumbnails = $this->userView->getDirectoryContent($previewPath);
		foreach ($allThumbnails as $thumbnail) {
			$name = rtrim($thumbnail['name'], '.png');
			// Always add the max preview to the array
			if (strpos($name, 'max')) {
				$possibleThumbnails['max'] = $thumbnail['path'];
				continue;
			}
			list($x, $y, $aspectRatio) = $this->getDimensionsFromFilename($name);

			if (abs($aspectRatio - $wantedAspectRatio) >= 0.000001
				|| $this->unscalable($x, $y)
			) {
				continue;
			}
			$possibleThumbnails[$x] = $thumbnail['path'];
		}

		ksort($possibleThumbnails);

		return $possibleThumbnails;
	}

	/**
	 * @param string $name
	 * @return array
	 */
	private function getDimensionsFromFilename($name) {
			$size = explode('-', $name);
			$x = (int) $size[0];
			$y = (int) $size[1];
			$aspectRatio = (float) ($x / $y);
			return array($x, $y, $aspectRatio);
	}

	/**
	 * @param int $x
	 * @param int $y
	 * @return bool
	 */
	private function unscalable($x, $y) {

		$maxX = $this->getMaxX();
		$maxY = $this->getMaxY();
		$scalingUp = $this->getScalingUp();
		$maxScaleFactor = $this->getMaxScaleFactor();

		if ($x < $maxX || $y < $maxY) {
			if ($scalingUp) {
				$scalefactor = $maxX / $x;
				if ($scalefactor > $maxScaleFactor) {
					return true;
				}
			} else {
				return true;
			}
		}
		return false;
	}

	/**
	 * Returns a preview of a file
	 *
	 * The cache is searched first and if nothing usable was found then a preview is
	 * generated by one of the providers
	 *
	 * @return \OC_Image
	 */
	public function getPreview() {
		if (!is_null($this->preview) && $this->preview->valid()) {
			return $this->preview;
		}

		$this->preview = null;
		$file = $this->getFile();

		$fileInfo = $this->getFileInfo($file);
		if ($fileInfo === null || $fileInfo === false) {
			return new \OC_Image();
		}

		$fileId = $fileInfo->getId();
		$cached = $this->isCached($fileId);
		if ($cached) {
			$this->getCachedPreview($fileId, $cached);
		}

		if (is_null($this->preview)) {
			$this->generatePreview($fileId);
		}

		// We still don't have a preview, so we generate an empty object which can't be displayed
		if (is_null($this->preview)) {
			$this->preview = new \OC_Image();
		}

		return $this->preview;
	}

	/**
	 * @param null|string $mimeType
	 * @throws NotFoundException
	 */
	public function showPreview($mimeType = null) {
		// Check if file is valid
		if($this->isFileValid() === false) {
			throw new NotFoundException('File not found.');
		}

		\OCP\Response::enableCaching(3600 * 24); // 24 hours
		if (is_null($this->preview)) {
			$this->getPreview();
		}
		if ($this->preview instanceof \OC_Image) {
			$this->preview->show($mimeType);
		}
	}

	/**
	 * Retrieves the preview from the cache and resizes it if necessary
	 *
	 * @param int $fileId fileId of the original image
	 * @param string $cached the path to the cached preview
	 */
	private function getCachedPreview($fileId, $cached) {
		$stream = $this->userView->fopen($cached, 'r');
		$this->preview = null;
		if ($stream) {
			$image = new \OC_Image();
			$image->loadFromFileHandle($stream);

			$this->preview = $image->valid() ? $image : null;

			$maxX = (int)$this->getMaxX();
			$maxY = (int)$this->getMaxY();
			$previewX = (int)$this->preview->width();
			$previewY = (int)$this->preview->height();

			if ($previewX !== $maxX && $previewY !== $maxY) {
				$this->resizeAndStore($fileId);
			}

			fclose($stream);
		}
	}

	/**
	 * Resizes, crops, fixes orientation and stores in the cache
	 *
	 * @param int $fileId fileId of the original image
	 */
	private function resizeAndStore($fileId) {
		// Resize and store
		$this->resizeAndCrop();
		// We save a copy in the cache to speed up future calls
		$cachePath = $this->buildCachePath($fileId);
		$this->userView->file_put_contents($cachePath, $this->preview->data());
	}

	/**
	 * resize, crop and fix orientation
	 * @return void
	 */
	private function resizeAndCrop() {
		$image = $this->preview;
		$x = $this->getMaxX();
		$y = $this->getMaxY();
		$scalingUp = $this->getScalingUp();
		$maxScaleFactor = $this->getMaxScaleFactor();

		if (!($image instanceof \OC_Image)) {
			\OCP\Util::writeLog('core', '$this->preview is not an instance of OC_Image', \OCP\Util::DEBUG);
			return;
		}

		$realX = (int)$image->width();
		$realY = (int)$image->height();

		// compute $maxY and $maxX using the aspect of the generated preview
		if ($this->keepAspect) {
			$ratio = $realX / $realY;
			if($x / $ratio < $y) {
				// width restricted
				$y = $x / $ratio;
			} else {
				$x = $y * $ratio;
			}
		}

		// The preview already has the asked dimensions
		if ($x === $realX && $y === $realY) {
			$this->preview = $image;
			return;
		}

		$factorX = $x / $realX;
		$factorY = $y / $realY;

		if ($factorX >= $factorY) {
			$factor = $factorX;
		} else {
			$factor = $factorY;
		}

		if ($scalingUp === false) {
			if ($factor > 1) {
				$factor = 1;
			}
		}

		if (!is_null($maxScaleFactor)) {
			if ($factor > $maxScaleFactor) {
				\OCP\Util::writeLog('core', 'scale factor reduced from ' . $factor . ' to ' . $maxScaleFactor, \OCP\Util::DEBUG);
				$factor = $maxScaleFactor;
			}
		}

		$newXSize = (int)($realX * $factor);
		$newYSize = (int)($realY * $factor);

		$image->preciseResize($newXSize, $newYSize);

		// The preview has been upscaled and now has the asked dimensions
		if ($newXSize === $x && $newYSize === $y) {
			$this->preview = $image;
			return;
		}

		// One dimension of the upscaled preview is too big
		if ($newXSize >= $x && $newYSize >= $y) {
			$cropX = floor(abs($x - $newXSize) * 0.5);
			//don't crop previews on the Y axis, this sucks if it's a document.
			//$cropY = floor(abs($y - $newYsize) * 0.5);
			$cropY = 0;

			$image->crop($cropX, $cropY, $x, $y);

			$this->preview = $image;
			return;
		}

		// One dimension of the upscaled preview is too small and we're allowed to scale up
		if (($newXSize < $x || $newYSize < $y) && $scalingUp) {
			if ($newXSize > $x) {
				$cropX = floor(($newXSize - $x) * 0.5);
				$image->crop($cropX, 0, $x, $newYSize);
			}

			if ($newYSize > $y) {
				$cropY = floor(($newYSize - $y) * 0.5);
				$image->crop(0, $cropY, $newXSize, $y);
			}

			$newXSize = (int)$image->width();
			$newYSize = (int)$image->height();

			//create transparent background layer
			$backgroundLayer = imagecreatetruecolor($x, $y);
			$white = imagecolorallocate($backgroundLayer, 255, 255, 255);
			imagefill($backgroundLayer, 0, 0, $white);

			$image = $image->resource();

			$mergeX = floor(abs($x - $newXSize) * 0.5);
			$mergeY = floor(abs($y - $newYSize) * 0.5);

			imagecopy($backgroundLayer, $image, $mergeX, $mergeY, 0, 0, $newXSize, $newYSize);

			//$black = imagecolorallocate(0,0,0);
			//imagecolortransparent($transparentlayer, $black);

			$image = new \OC_Image($backgroundLayer);

			$this->preview = $image;

			return;
		}
	}

	/**
	 * Returns the path to a preview based on its dimensions and aspect
	 *
	 * @param int $fileId
	 *
	 * @return string
	 */
	private function buildCachePath($fileId) {
		$maxX = $this->getMaxX();
		$maxY = $this->getMaxY();

		$previewPath = $this->getPreviewPath($fileId);
		$previewPath = $previewPath . strval($maxX) . '-' . strval($maxY);
		if ($this->keepAspect) {
			$previewPath .= '-with-aspect';
		}
		$previewPath .= '.png';

		return $previewPath;
	}

	/**
	 * @param int $fileId
	 *
	 * @return string
	 */
	private function getPreviewPath($fileId) {
		return $this->getThumbnailsFolder() . '/' . $fileId . '/';
	}

	/**
	 * Asks the provider to send a preview of the file of maximum dimensions
	 * and after saving it in the cache, it is then resized to the asked dimensions
	 *
	 * This is only called once in order to generate a large PNG of dimensions defined in the
	 * configuration file. We'll be able to quickly resize it later on.
	 * We never upscale the original conversion as this will be done later by the resizing operation
	 *
	 * @param int $fileId fileId of the original image
	 */
	private function generatePreview($fileId) {
		$file = $this->getFile();
		$preview = null;

		foreach (self::$providers as $supportedMimeType => $provider) {
			if (!preg_match($supportedMimeType, $this->mimeType)) {
				continue;
			}

			\OCP\Util::writeLog(
				'core', 'Generating preview for "' . $file . '" with "' . get_class($provider)
						. '"', \OCP\Util::DEBUG
			);

			// TODO Bitmap previews have to also be limited in order to maximise the benefits
			/** @var $provider Provider */
			$preview = $provider->getThumbnail(
				$file, $this->configMaxX, $this->configMaxY, $scalingUp = false, $this->fileView
			);

			if (!($preview instanceof \OC_Image)) {
				continue;
			}

			$this->preview = $preview;
			$previewPath = $this->getPreviewPath($fileId);

			if ($this->userView->is_dir($this->getThumbnailsFolder() . '/') === false) {
				$this->userView->mkdir($this->getThumbnailsFolder() . '/');
			}

			if ($this->userView->is_dir($previewPath) === false) {
				$this->userView->mkdir($previewPath);
			}

			// This stores our large preview so that it can be used in subsequent resizing requests
			$this->storeMaxPreview($previewPath);

			break;
		}

		// The providers have been kind enough to give us a preview
		if ($preview) {
			$this->resizeAndStore($fileId);
		}
	}

	/**
	 * Stores the max preview in the cache
	 *
	 * @param string $previewPath path to the preview
	 */
	private function storeMaxPreview($previewPath) {
		$maxPreview = false;
		$preview = $this->preview;

		$allThumbnails = $this->userView->getDirectoryContent($previewPath);
		// This is so that the cache doesn't need emptying when upgrading
		// Can be replaced by an upgrade script...
		foreach ($allThumbnails as $thumbnail) {
			$name = rtrim($thumbnail['name'], '.png');
			if (strpos($name, 'max')) {
				$maxPreview = true;
				break;
			}
		}
		// We haven't found the max preview, so we create it
		if (!$maxPreview) {
			$maxX = $preview->width();
			$maxY = $preview->height();
			$previewPath = $previewPath . strval($maxX) . '-' . strval($maxY);
			$previewPath .= '-max.png';
			$this->userView->file_put_contents($previewPath, $preview->data());
		}
	}

	/**
	 * register a new preview provider to be used
	 * @param string $class
	 * @param array $options
	 */
	public static function registerProvider($class, $options = array()) {
		/**
		 * Only register providers that have been explicitly enabled
		 *
		 * The following providers are enabled by default:
		 *  - OC\Preview\Image
		 *  - OC\Preview\MP3
		 *  - OC\Preview\TXT
		 *  - OC\Preview\MarkDown
		 *
		 * The following providers are disabled by default due to performance or privacy concerns:
		 *  - OC\Preview\MSOfficeDoc
		 *  - OC\Preview\MSOffice2003
		 *  - OC\Preview\MSOffice2007
		 *  - OC\Preview\OpenDocument
		 *  - OC\Preview\StarOffice
 		 *  - OC\Preview\SVG
		 *  - OC\Preview\Movie
		 *  - OC\Preview\PDF
		 *  - OC\Preview\TIFF
		 *  - OC\Preview\Illustrator
		 *  - OC\Preview\Postscript
		 *  - OC\Preview\Photoshop
		 *  - OC\Preview\Font
		 */
		if(empty(self::$enabledProviders)) {
			self::$enabledProviders = \OC::$server->getConfig()->getSystemValue('enabledPreviewProviders', array(
				'OC\Preview\Image',
				'OC\Preview\MP3',
				'OC\Preview\TXT',
				'OC\Preview\MarkDown',
			));
		}

		if(in_array($class, self::$enabledProviders)) {
			self::$registeredProviders[] = array('class' => $class, 'options' => $options);
		}
	}

	/**
	 * create instances of all the registered preview providers
	 * @return void
	 */
	private static function initProviders() {
		if (!\OC::$server->getConfig()->getSystemValue('enable_previews', true)) {
			self::$providers = array();
			return;
		}

		if (!empty(self::$providers)) {
			return;
		}

		self::registerCoreProviders();
		foreach (self::$registeredProviders as $provider) {
			$class = $provider['class'];
			$options = $provider['options'];

			/** @var $object Provider */
			$object = new $class($options);
			self::$providers[$object->getMimeType()] = $object;
		}

		$keys = array_map('strlen', array_keys(self::$providers));
		array_multisort($keys, SORT_DESC, self::$providers);
	}

	protected static function registerCoreProviders() {
		self::registerProvider('OC\Preview\TXT');
		self::registerProvider('OC\Preview\MarkDown');
		self::registerProvider('OC\Preview\Image');
		self::registerProvider('OC\Preview\MP3');

		// SVG, Office and Bitmap require imagick
		if (extension_loaded('imagick')) {
			$checkImagick = new \Imagick();

			$imagickProviders = array(
				'SVG'	=> 'OC\Preview\SVG',
				'TIFF'	=> 'OC\Preview\TIFF',
				'PDF'	=> 'OC\Preview\PDF',
				'AI'	=> 'OC\Preview\Illustrator',
				'PSD'	=> 'OC\Preview\Photoshop',
				'EPS'	=> 'OC\Preview\Postscript',
				'TTF'	=> 'OC\Preview\Font',
			);

			foreach ($imagickProviders as $queryFormat => $provider) {
				if (count($checkImagick->queryFormats($queryFormat)) === 1) {
					self::registerProvider($provider);
				}
			}

			if (count($checkImagick->queryFormats('PDF')) === 1) {
				// Office previews are currently not supported on Windows
				if (!\OC_Util::runningOnWindows() && \OC_Helper::is_function_enabled('shell_exec')) {
					$officeFound = is_string(\OC::$server->getConfig()->getSystemValue('preview_libreoffice_path', null));

					if (!$officeFound) {
						//let's see if there is libreoffice or openoffice on this machine
						$whichLibreOffice = shell_exec('command -v libreoffice');
						$officeFound = !empty($whichLibreOffice);
						if (!$officeFound) {
							$whichOpenOffice = shell_exec('command -v openoffice');
							$officeFound = !empty($whichOpenOffice);
						}
					}

					if ($officeFound) {
						self::registerProvider('OC\Preview\MSOfficeDoc');
						self::registerProvider('OC\Preview\MSOffice2003');
						self::registerProvider('OC\Preview\MSOffice2007');
						self::registerProvider('OC\Preview\OpenDocument');
						self::registerProvider('OC\Preview\StarOffice');
					}
				}
			}
		}

		// Video requires avconv or ffmpeg and is therefor
		// currently not supported on Windows.
		if (!\OC_Util::runningOnWindows()) {
			$avconvBinary = \OC_Helper::findBinaryPath('avconv');
			$ffmpegBinary = ($avconvBinary) ? null : \OC_Helper::findBinaryPath('ffmpeg');

			if ($avconvBinary || $ffmpegBinary) {
				// FIXME // a bit hacky but didn't want to use subclasses
				\OC\Preview\Movie::$avconvBinary = $avconvBinary;
				\OC\Preview\Movie::$ffmpegBinary = $ffmpegBinary;

				self::registerProvider('OC\Preview\Movie');
			}
		}
	}

	/**
	 * @param array $args
	 */
	public static function post_write($args) {
		self::post_delete($args, 'files/');
	}

	/**
	 * @param array $args
	 */
	public static function prepare_delete_files($args) {
		self::prepare_delete($args, 'files/');
	}

	/**
	 * @param array $args
	 * @param string $prefix
	 */
	public static function prepare_delete($args, $prefix='') {
		$path = $args['path'];
		if (substr($path, 0, 1) === '/') {
			$path = substr($path, 1);
		}

		$view = new \OC\Files\View('/' . \OC_User::getUser() . '/' . $prefix);

		$absPath = Files\Filesystem::normalizePath($view->getAbsolutePath($path));
		self::addPathToDeleteFileMapper($absPath, $view->getFileInfo($path));
		if ($view->is_dir($path)) {
			$children = self::getAllChildren($view, $path);
			self::$deleteChildrenMapper[$absPath] = $children;
		}
	}

	/**
	 * @param string $absolutePath
	 * @param \OCP\Files\FileInfo $info
	 */
	private static function addPathToDeleteFileMapper($absolutePath, $info) {
		self::$deleteFileMapper[$absolutePath] = $info;
	}

	/**
	 * @param \OC\Files\View $view
	 * @param string $path
	 * @return array
	 */
	private static function getAllChildren($view, $path) {
		$children = $view->getDirectoryContent($path);
		$childrensFiles = array();

		$fakeRootLength = strlen($view->getRoot());

		for ($i = 0; $i < count($children); $i++) {
			$child = $children[$i];

			$childsPath = substr($child->getPath(), $fakeRootLength);

			if ($view->is_dir($childsPath)) {
				$children = array_merge(
					$children,
					$view->getDirectoryContent($childsPath)
				);
			} else {
				$childrensFiles[] = $child;
			}
		}

		return $childrensFiles;
	}

	/**
	 * @param array $args
	 */
	public static function post_delete_files($args) {
		self::post_delete($args, 'files/');
	}

	/**
	 * @param array $args
	 * @param string $prefix
	 */
	public static function post_delete($args, $prefix='') {
		$path = Files\Filesystem::normalizePath($args['path']);

		$preview = new Preview(\OC_User::getUser(), $prefix, $path);
		$preview->deleteAllPreviews();
	}

	/**
	 * Check if a preview can be generated for a file
	 *
	 * @param \OC\Files\FileInfo $file
	 * @return bool
	 */
	public static function isAvailable(\OC\Files\FileInfo $file) {
		if (!\OC::$server->getConfig()->getSystemValue('enable_previews', true)) {
			return false;
		}

		$mount = $file->getMountPoint();
		if ($mount and !$mount->getOption('previews', true)){
			return false;
		}

		//check if there are preview backends
		if (empty(self::$providers)) {
			self::initProviders();
		}

		foreach (self::$providers as $supportedMimeType => $provider) {
			/**
			 * @var \OC\Preview\Provider $provider
			 */
			if (preg_match($supportedMimeType, $file->getMimetype())) {
				return $provider->isAvailable($file);
			}
		}
		return false;
	}

	/**
	 * @param string $mimeType
	 * @return bool
	 */
	public static function isMimeSupported($mimeType) {
		if (!\OC::$server->getConfig()->getSystemValue('enable_previews', true)) {
			return false;
		}

		//check if there are preview backends
		if (empty(self::$providers)) {
			self::initProviders();
		}

		foreach(self::$providers as $supportedMimetype => $provider) {
			if(preg_match($supportedMimetype, $mimeType)) {
				return true;
			}
		}
		return false;
	}

}
