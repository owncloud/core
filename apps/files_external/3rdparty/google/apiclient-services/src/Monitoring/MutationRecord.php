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

namespace Google\Service\Monitoring;

class MutationRecord extends \Google\Model
{
  /**
   * @var string
   */
  public $mutateTime;
  /**
   * @var string
   */
  public $mutatedBy;

  /**
   * @param string
   */
  public function setMutateTime($mutateTime)
  {
    $this->mutateTime = $mutateTime;
  }
  /**
   * @return string
   */
  public function getMutateTime()
  {
    return $this->mutateTime;
  }
  /**
   * @param string
   */
  public function setMutatedBy($mutatedBy)
  {
    $this->mutatedBy = $mutatedBy;
  }
  /**
   * @return string
   */
  public function getMutatedBy()
  {
    return $this->mutatedBy;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MutationRecord::class, 'Google_Service_Monitoring_MutationRecord');
