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

namespace Google\Service\CloudDebugger;

class ExtendedSourceContext extends \Google\Model
{
  protected $contextType = SourceContext::class;
  protected $contextDataType = '';
  public $labels;

  /**
   * @param SourceContext
   */
  public function setContext(SourceContext $context)
  {
    $this->context = $context;
  }
  /**
   * @return SourceContext
   */
  public function getContext()
  {
    return $this->context;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ExtendedSourceContext::class, 'Google_Service_CloudDebugger_ExtendedSourceContext');
