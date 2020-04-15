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

class Google_Service_Dialogflow_GoogleCloudDialogflowV2beta1AnnotatedConversationDataset extends Google_Model
{
  public $completedExampleCount;
  public $createTime;
  public $description;
  public $displayName;
  public $exampleCount;
  public $name;
  public $questionTypeName;

  public function setCompletedExampleCount($completedExampleCount)
  {
    $this->completedExampleCount = $completedExampleCount;
  }
  public function getCompletedExampleCount()
  {
    return $this->completedExampleCount;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setExampleCount($exampleCount)
  {
    $this->exampleCount = $exampleCount;
  }
  public function getExampleCount()
  {
    return $this->exampleCount;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setQuestionTypeName($questionTypeName)
  {
    $this->questionTypeName = $questionTypeName;
  }
  public function getQuestionTypeName()
  {
    return $this->questionTypeName;
  }
}
