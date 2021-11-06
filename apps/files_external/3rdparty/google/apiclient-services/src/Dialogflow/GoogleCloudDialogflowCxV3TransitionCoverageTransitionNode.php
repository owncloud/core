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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode extends \Google\Model
{
  protected $flowType = GoogleCloudDialogflowCxV3Flow::class;
  protected $flowDataType = '';
  protected $pageType = GoogleCloudDialogflowCxV3Page::class;
  protected $pageDataType = '';

  /**
   * @param GoogleCloudDialogflowCxV3Flow
   */
  public function setFlow(GoogleCloudDialogflowCxV3Flow $flow)
  {
    $this->flow = $flow;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Flow
   */
  public function getFlow()
  {
    return $this->flow;
  }
  /**
   * @param GoogleCloudDialogflowCxV3Page
   */
  public function setPage(GoogleCloudDialogflowCxV3Page $page)
  {
    $this->page = $page;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Page
   */
  public function getPage()
  {
    return $this->page;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3TransitionCoverageTransitionNode');
