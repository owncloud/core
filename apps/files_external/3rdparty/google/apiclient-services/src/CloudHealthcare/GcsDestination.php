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

namespace Google\Service\CloudHealthcare;

class GcsDestination extends \Google\Model
{
  /**
   * @var string
   */
  public $contentStructure;
  /**
   * @var string
   */
  public $messageView;
  /**
   * @var string
   */
  public $uriPrefix;

  /**
   * @param string
   */
  public function setContentStructure($contentStructure)
  {
    $this->contentStructure = $contentStructure;
  }
  /**
   * @return string
   */
  public function getContentStructure()
  {
    return $this->contentStructure;
  }
  /**
   * @param string
   */
  public function setMessageView($messageView)
  {
    $this->messageView = $messageView;
  }
  /**
   * @return string
   */
  public function getMessageView()
  {
    return $this->messageView;
  }
  /**
   * @param string
   */
  public function setUriPrefix($uriPrefix)
  {
    $this->uriPrefix = $uriPrefix;
  }
  /**
   * @return string
   */
  public function getUriPrefix()
  {
    return $this->uriPrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GcsDestination::class, 'Google_Service_CloudHealthcare_GcsDestination');
