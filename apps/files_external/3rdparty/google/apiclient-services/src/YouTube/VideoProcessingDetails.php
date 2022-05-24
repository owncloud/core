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

class VideoProcessingDetails extends \Google\Model
{
  /**
   * @var string
   */
  public $editorSuggestionsAvailability;
  /**
   * @var string
   */
  public $fileDetailsAvailability;
  /**
   * @var string
   */
  public $processingFailureReason;
  /**
   * @var string
   */
  public $processingIssuesAvailability;
  protected $processingProgressType = VideoProcessingDetailsProcessingProgress::class;
  protected $processingProgressDataType = '';
  /**
   * @var string
   */
  public $processingStatus;
  /**
   * @var string
   */
  public $tagSuggestionsAvailability;
  /**
   * @var string
   */
  public $thumbnailsAvailability;

  /**
   * @param string
   */
  public function setEditorSuggestionsAvailability($editorSuggestionsAvailability)
  {
    $this->editorSuggestionsAvailability = $editorSuggestionsAvailability;
  }
  /**
   * @return string
   */
  public function getEditorSuggestionsAvailability()
  {
    return $this->editorSuggestionsAvailability;
  }
  /**
   * @param string
   */
  public function setFileDetailsAvailability($fileDetailsAvailability)
  {
    $this->fileDetailsAvailability = $fileDetailsAvailability;
  }
  /**
   * @return string
   */
  public function getFileDetailsAvailability()
  {
    return $this->fileDetailsAvailability;
  }
  /**
   * @param string
   */
  public function setProcessingFailureReason($processingFailureReason)
  {
    $this->processingFailureReason = $processingFailureReason;
  }
  /**
   * @return string
   */
  public function getProcessingFailureReason()
  {
    return $this->processingFailureReason;
  }
  /**
   * @param string
   */
  public function setProcessingIssuesAvailability($processingIssuesAvailability)
  {
    $this->processingIssuesAvailability = $processingIssuesAvailability;
  }
  /**
   * @return string
   */
  public function getProcessingIssuesAvailability()
  {
    return $this->processingIssuesAvailability;
  }
  /**
   * @param VideoProcessingDetailsProcessingProgress
   */
  public function setProcessingProgress(VideoProcessingDetailsProcessingProgress $processingProgress)
  {
    $this->processingProgress = $processingProgress;
  }
  /**
   * @return VideoProcessingDetailsProcessingProgress
   */
  public function getProcessingProgress()
  {
    return $this->processingProgress;
  }
  /**
   * @param string
   */
  public function setProcessingStatus($processingStatus)
  {
    $this->processingStatus = $processingStatus;
  }
  /**
   * @return string
   */
  public function getProcessingStatus()
  {
    return $this->processingStatus;
  }
  /**
   * @param string
   */
  public function setTagSuggestionsAvailability($tagSuggestionsAvailability)
  {
    $this->tagSuggestionsAvailability = $tagSuggestionsAvailability;
  }
  /**
   * @return string
   */
  public function getTagSuggestionsAvailability()
  {
    return $this->tagSuggestionsAvailability;
  }
  /**
   * @param string
   */
  public function setThumbnailsAvailability($thumbnailsAvailability)
  {
    $this->thumbnailsAvailability = $thumbnailsAvailability;
  }
  /**
   * @return string
   */
  public function getThumbnailsAvailability()
  {
    return $this->thumbnailsAvailability;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(VideoProcessingDetails::class, 'Google_Service_YouTube_VideoProcessingDetails');
