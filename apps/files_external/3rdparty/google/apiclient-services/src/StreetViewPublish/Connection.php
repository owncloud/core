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

namespace Google\Service\StreetViewPublish;

class Connection extends \Google\Model
{
  protected $targetType = PhotoId::class;
  protected $targetDataType = '';

  /**
   * @param PhotoId
   */
  public function setTarget(PhotoId $target)
  {
    $this->target = $target;
  }
  /**
   * @return PhotoId
   */
  public function getTarget()
  {
    return $this->target;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Connection::class, 'Google_Service_StreetViewPublish_Connection');
