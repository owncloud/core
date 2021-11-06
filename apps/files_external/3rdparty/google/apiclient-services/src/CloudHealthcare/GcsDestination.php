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
  public $contentStructure;
  public $messageView;
  public $uriPrefix;

  public function setContentStructure($contentStructure)
  {
    $this->contentStructure = $contentStructure;
  }
  public function getContentStructure()
  {
    return $this->contentStructure;
  }
  public function setMessageView($messageView)
  {
    $this->messageView = $messageView;
  }
  public function getMessageView()
  {
    return $this->messageView;
  }
  public function setUriPrefix($uriPrefix)
  {
    $this->uriPrefix = $uriPrefix;
  }
  public function getUriPrefix()
  {
    return $this->uriPrefix;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GcsDestination::class, 'Google_Service_CloudHealthcare_GcsDestination');
