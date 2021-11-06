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

namespace Google\Service\SQLAdmin;

class InstancesTruncateLogRequest extends \Google\Model
{
  protected $truncateLogContextType = TruncateLogContext::class;
  protected $truncateLogContextDataType = '';

  /**
   * @param TruncateLogContext
   */
  public function setTruncateLogContext(TruncateLogContext $truncateLogContext)
  {
    $this->truncateLogContext = $truncateLogContext;
  }
  /**
   * @return TruncateLogContext
   */
  public function getTruncateLogContext()
  {
    return $this->truncateLogContext;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(InstancesTruncateLogRequest::class, 'Google_Service_SQLAdmin_InstancesTruncateLogRequest');
