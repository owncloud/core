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

namespace Google\Service\CloudDataplex;

class GoogleCloudDataplexV1Content extends \Google\Model
{
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $dataText;
  /**
   * @var string
   */
  public $description;
  /**
   * @var string[]
   */
  public $labels;
  /**
   * @var string
   */
  public $name;
  protected $notebookType = GoogleCloudDataplexV1ContentNotebook::class;
  protected $notebookDataType = '';
  /**
   * @var string
   */
  public $path;
  protected $sqlScriptType = GoogleCloudDataplexV1ContentSqlScript::class;
  protected $sqlScriptDataType = '';
  /**
   * @var string
   */
  public $uid;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setDataText($dataText)
  {
    $this->dataText = $dataText;
  }
  /**
   * @return string
   */
  public function getDataText()
  {
    return $this->dataText;
  }
  /**
   * @param string
   */
  public function setDescription($description)
  {
    $this->description = $description;
  }
  /**
   * @return string
   */
  public function getDescription()
  {
    return $this->description;
  }
  /**
   * @param string[]
   */
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  /**
   * @return string[]
   */
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param GoogleCloudDataplexV1ContentNotebook
   */
  public function setNotebook(GoogleCloudDataplexV1ContentNotebook $notebook)
  {
    $this->notebook = $notebook;
  }
  /**
   * @return GoogleCloudDataplexV1ContentNotebook
   */
  public function getNotebook()
  {
    return $this->notebook;
  }
  /**
   * @param string
   */
  public function setPath($path)
  {
    $this->path = $path;
  }
  /**
   * @return string
   */
  public function getPath()
  {
    return $this->path;
  }
  /**
   * @param GoogleCloudDataplexV1ContentSqlScript
   */
  public function setSqlScript(GoogleCloudDataplexV1ContentSqlScript $sqlScript)
  {
    $this->sqlScript = $sqlScript;
  }
  /**
   * @return GoogleCloudDataplexV1ContentSqlScript
   */
  public function getSqlScript()
  {
    return $this->sqlScript;
  }
  /**
   * @param string
   */
  public function setUid($uid)
  {
    $this->uid = $uid;
  }
  /**
   * @return string
   */
  public function getUid()
  {
    return $this->uid;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDataplexV1Content::class, 'Google_Service_CloudDataplex_GoogleCloudDataplexV1Content');
