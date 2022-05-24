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

namespace Google\Service\Spanner;

class BatchCreateSessionsRequest extends \Google\Model
{
  /**
   * @var int
   */
  public $sessionCount;
  protected $sessionTemplateType = Session::class;
  protected $sessionTemplateDataType = '';

  /**
   * @param int
   */
  public function setSessionCount($sessionCount)
  {
    $this->sessionCount = $sessionCount;
  }
  /**
   * @return int
   */
  public function getSessionCount()
  {
    return $this->sessionCount;
  }
  /**
   * @param Session
   */
  public function setSessionTemplate(Session $sessionTemplate)
  {
    $this->sessionTemplate = $sessionTemplate;
  }
  /**
   * @return Session
   */
  public function getSessionTemplate()
  {
    return $this->sessionTemplate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BatchCreateSessionsRequest::class, 'Google_Service_Spanner_BatchCreateSessionsRequest');
