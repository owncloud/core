<?php
/**
 * Copyright (c) 2014 Andreas Fischer <bantu@owncloud.com>
 * This file is licensed under the Affero General Public License version 3 or
 * later.
 * See the COPYING-README file.
 */

namespace OC;

/**
* Proxies data from PHP stream notifications to browser via EventSource.
*/
class StreamNotificationToEventSourceProxy {
	/** @var \OC_EventSource */
	protected $eventSource;
	/** @var number */
	protected $filesize = 0;
	/** @var int */
	protected $progress = 0;

	/**
	* Constructor.
	*
	* @param \OC_EventSource $eventSource The event source notifications should
	*                                     be proxied to.
	*/
	public function __construct(\OC_EventSource $eventSource) {
		$this->eventSource = $eventSource;
	}

	/**
	* This method receives notifications from the stream framework and
	* basically sends them along to a browser using an EventSource.
	*
	* This method implements the stream_notification_callback function as
	* on http://www.php.net/manual/en/function.stream-notification-callback.php
	*/
	public function notify($notification_code, $severity, $message,
                           $message_code, $bytes_transferred, $bytes_max) {
		switch ($notification_code) {
			case STREAM_NOTIFY_FILE_SIZE_IS:
				$this->filesize = $bytes_max;
				break;

			case STREAM_NOTIFY_PROGRESS:
				if ($bytes_transferred > 0 && $this->filesize) {
					$progress = (int) (($bytes_transferred / $this->filesize) * 100);
					if ($progress > $this->progress) {
						$this->progress = $progress;
						$this->eventSource->send('progress', $this->progress);
					}
				}
				break;
		}
	}

	/**
	* @return callable Callable that should be passed as the stream context
	*                  parameter array value for array key 'notification'.
	*/
	public function getCallback() {
		return array($this, 'notify');
	}

	/**
	* @return int Total file size.
	*/
	public function getFilesize() {
		return $this->filesize;
	}

	/**
	* @return int Progress in percent.
	*/
	public function getProgress() {
		return $this->progress;
	}
}
