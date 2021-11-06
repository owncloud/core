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

namespace Google\Service\AndroidPublisher;

class DeveloperComment extends \Google\Model
{
  protected $lastModifiedType = Timestamp::class;
  protected $lastModifiedDataType = '';
  public $text;

  /**
   * @param Timestamp
   */
  public function setLastModified(Timestamp $lastModified)
  {
    $this->lastModified = $lastModified;
  }
  /**
   * @return Timestamp
   */
  public function getLastModified()
  {
    return $this->lastModified;
  }
  public function setText($text)
  {
    $this->text = $text;
  }
  public function getText()
  {
    return $this->text;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DeveloperComment::class, 'Google_Service_AndroidPublisher_DeveloperComment');
