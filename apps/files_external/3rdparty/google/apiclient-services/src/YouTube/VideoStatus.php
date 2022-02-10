<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\YouTube;

class VideoStatus extends \Google\Model
{
  /**
   * @var bool
   */
  public $embeddable;
  /**
   * @var string
   */
  public $failureReason;
  /**
   * @var string
   */
  public $license;
  /**
   * @var bool
   */
  public $madeForKids;
  /**
   * @var string
   */
  public $privacyStatus;
  /**
   * @var bool
   */
  public $publicStatsViewable;
  /**
   * @var string
   */
  public $publishAt;
  /**
   * @var string
   */
  public $rejectionReason;
  /**
   * @var bool
   */
  public $selfDeclaredMadeForKids;
  /**
   * @var string
   */
  public $uploadStatus;

  /**
   * @param bool
   */
  public function setEmbeddable($embeddable)
  {
    $this->embeddable = $embeddable;
  }
  /**
   * @return bool
   */
  public function getEmbeddable()
  {
    return $this->embeddable;
  }
  /**
   * @param string
   */
  public function setFailureReason($failureReason)
  {
    $this->failureReason = $failureReason;
  }
  /**
   * @return string
   */
  public function getFailureReason()
  {
    return $this->failureReason;
  }
  /**
   * @param string
   */
  public function setLicense($license)
  {
    $this->license = $license;
  }
  /**
   * @return string
   */
  public function getLicense()
  {
    return $this->license;
  }
  /**
   * @param bool
   */
  public function setMadeForKids($madeForKids)
  {
    $this->madeForKids = $madeForKids;
  }
  /**
   * @return bool
   */
  public function getMadeForKids()
  {
    return $this->madeForKids;
  }
  /**
   * @param string
   */
  public function setPrivacyStatus($privacyStatus)
  {
    $this->privacyStatus = $privacyStatus;
  }
  /**
   * @return string
   */
  public function getPrivacyStatus()
  {
    return $this->privacyStatus;
  }
  /**
   * @param bool
   */
  public function setPublicStatsViewable($publicStatsViewable)
  {
    $this->publicStatsViewable = $publicStatsViewable;
  }
  /**
   * @return bool
   */
  public function getPublicStatsViewable()
  {
    return $this->publicStatsViewable;
  }
  /**
   * @param string
   */
  public function setPublishAt($publishAt)
  {
    $this->publishAt = $publishAt;
  }
  /**
   * @return string
   */
  public function getPublishAt()
  {
    return $this->publishAt;
  }
  /**
   * @param string
   */
  public function setRejectionReason($rejectionReason)
  {
    $this->rejectionReason = $rejectionReason;
  }
  /**
   * @return string
   */
  public function getRejectionReason()
  {
    return $this->rejectionReason;
  }
  /**
   * @param bool
   */
  public function setSelfDeclaredMadeForKids($selfDeclaredMadeForKids)
  {
    $this->selfDeclaredMadeForKids = $selfDeclaredMadeForKids;
  }
  /**
   * @return bool
   */
  public function getSelfDeclaredMadeForKids()
  {
    return $this->selfDeclaredMadeForKids;
  }
  /**
   * @param string
   */
  public function setUploadStatus($uploadStatus)
  {
    $this->uploadStatus = $uploadStatus;
  }
  /**
   * @return string
   */
  public function getUploadStatus()
  {
    return $this->uploadStatus;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoStatus::class, 'Google_Service_YouTube_VideoStatus');
