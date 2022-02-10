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

class LiveStream extends \Google\Model
{
  protected $cdnType = CdnSettings::class;
  protected $cdnDataType = '';
  protected $contentDetailsType = LiveStreamContentDetails::class;
  protected $contentDetailsDataType = '';
  /**
   * @var string
   */
  public $etag;
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $kind;
  protected $snippetType = LiveStreamSnippet::class;
  protected $snippetDataType = '';
  protected $statusType = LiveStreamStatus::class;
  protected $statusDataType = '';

  /**
   * @param CdnSettings
   */
  public function setCdn(CdnSettings $cdn)
  {
    $this->cdn = $cdn;
  }
  /**
   * @return CdnSettings
   */
  public function getCdn()
  {
    return $this->cdn;
  }
  /**
   * @param LiveStreamContentDetails
   */
  public function setContentDetails(LiveStreamContentDetails $contentDetails)
  {
    $this->contentDetails = $contentDetails;
  }
  /**
   * @return LiveStreamContentDetails
   */
  public function getContentDetails()
  {
    return $this->contentDetails;
  }
  /**
   * @param string
   */
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  /**
   * @return string
   */
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string
   */
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  /**
   * @return string
   */
  public function getKind()
  {
    return $this->kind;
  }
  /**
   * @param LiveStreamSnippet
   */
  public function setSnippet(LiveStreamSnippet $snippet)
  {
    $this->snippet = $snippet;
  }
  /**
   * @return LiveStreamSnippet
   */
  public function getSnippet()
  {
    return $this->snippet;
  }
  /**
   * @param LiveStreamStatus
   */
  public function setStatus(LiveStreamStatus $status)
  {
    $this->status = $status;
  }
  /**
   * @return LiveStreamStatus
   */
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(LiveStream::class, 'Google_Service_YouTube_LiveStream');
