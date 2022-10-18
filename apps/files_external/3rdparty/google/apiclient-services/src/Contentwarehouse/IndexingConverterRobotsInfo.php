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

namespace Google\Service\Contentwarehouse;

class IndexingConverterRobotsInfo extends \Google\Model
{
  /**
   * @var int
   */
  public $contentExpiry;
  /**
   * @var string
   */
  public $convertToRobotedReason;
  /**
   * @var int
   */
  public $disallowedReason;
  /**
   * @var int
   */
  public $indexifembeddedReason;
  /**
   * @var string
   */
  public $maxImagePreview;
  /**
   * @var string
   */
  public $maxSnippetLength;
  /**
   * @var int
   */
  public $noarchiveReason;
  /**
   * @var int
   */
  public $nofollowReason;
  /**
   * @var int
   */
  public $noimageframeoverlayReason;
  /**
   * @var int
   */
  public $noimageindexReason;
  /**
   * @var int
   */
  public $noindexReason;
  /**
   * @var int
   */
  public $nopreviewReason;
  /**
   * @var int
   */
  public $nosnippetReason;
  /**
   * @var int
   */
  public $notranslateReason;

  /**
   * @param int
   */
  public function setContentExpiry($contentExpiry)
  {
    $this->contentExpiry = $contentExpiry;
  }
  /**
   * @return int
   */
  public function getContentExpiry()
  {
    return $this->contentExpiry;
  }
  /**
   * @param string
   */
  public function setConvertToRobotedReason($convertToRobotedReason)
  {
    $this->convertToRobotedReason = $convertToRobotedReason;
  }
  /**
   * @return string
   */
  public function getConvertToRobotedReason()
  {
    return $this->convertToRobotedReason;
  }
  /**
   * @param int
   */
  public function setDisallowedReason($disallowedReason)
  {
    $this->disallowedReason = $disallowedReason;
  }
  /**
   * @return int
   */
  public function getDisallowedReason()
  {
    return $this->disallowedReason;
  }
  /**
   * @param int
   */
  public function setIndexifembeddedReason($indexifembeddedReason)
  {
    $this->indexifembeddedReason = $indexifembeddedReason;
  }
  /**
   * @return int
   */
  public function getIndexifembeddedReason()
  {
    return $this->indexifembeddedReason;
  }
  /**
   * @param string
   */
  public function setMaxImagePreview($maxImagePreview)
  {
    $this->maxImagePreview = $maxImagePreview;
  }
  /**
   * @return string
   */
  public function getMaxImagePreview()
  {
    return $this->maxImagePreview;
  }
  /**
   * @param string
   */
  public function setMaxSnippetLength($maxSnippetLength)
  {
    $this->maxSnippetLength = $maxSnippetLength;
  }
  /**
   * @return string
   */
  public function getMaxSnippetLength()
  {
    return $this->maxSnippetLength;
  }
  /**
   * @param int
   */
  public function setNoarchiveReason($noarchiveReason)
  {
    $this->noarchiveReason = $noarchiveReason;
  }
  /**
   * @return int
   */
  public function getNoarchiveReason()
  {
    return $this->noarchiveReason;
  }
  /**
   * @param int
   */
  public function setNofollowReason($nofollowReason)
  {
    $this->nofollowReason = $nofollowReason;
  }
  /**
   * @return int
   */
  public function getNofollowReason()
  {
    return $this->nofollowReason;
  }
  /**
   * @param int
   */
  public function setNoimageframeoverlayReason($noimageframeoverlayReason)
  {
    $this->noimageframeoverlayReason = $noimageframeoverlayReason;
  }
  /**
   * @return int
   */
  public function getNoimageframeoverlayReason()
  {
    return $this->noimageframeoverlayReason;
  }
  /**
   * @param int
   */
  public function setNoimageindexReason($noimageindexReason)
  {
    $this->noimageindexReason = $noimageindexReason;
  }
  /**
   * @return int
   */
  public function getNoimageindexReason()
  {
    return $this->noimageindexReason;
  }
  /**
   * @param int
   */
  public function setNoindexReason($noindexReason)
  {
    $this->noindexReason = $noindexReason;
  }
  /**
   * @return int
   */
  public function getNoindexReason()
  {
    return $this->noindexReason;
  }
  /**
   * @param int
   */
  public function setNopreviewReason($nopreviewReason)
  {
    $this->nopreviewReason = $nopreviewReason;
  }
  /**
   * @return int
   */
  public function getNopreviewReason()
  {
    return $this->nopreviewReason;
  }
  /**
   * @param int
   */
  public function setNosnippetReason($nosnippetReason)
  {
    $this->nosnippetReason = $nosnippetReason;
  }
  /**
   * @return int
   */
  public function getNosnippetReason()
  {
    return $this->nosnippetReason;
  }
  /**
   * @param int
   */
  public function setNotranslateReason($notranslateReason)
  {
    $this->notranslateReason = $notranslateReason;
  }
  /**
   * @return int
   */
  public function getNotranslateReason()
  {
    return $this->notranslateReason;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(IndexingConverterRobotsInfo::class, 'Google_Service_Contentwarehouse_IndexingConverterRobotsInfo');
