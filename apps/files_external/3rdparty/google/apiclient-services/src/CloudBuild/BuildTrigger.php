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

namespace Google\Service\CloudBuild;

class BuildTrigger extends \Google\Collection
{
  protected $collection_key = 'tags';
  protected $approvalConfigType = ApprovalConfig::class;
  protected $approvalConfigDataType = '';
  /**
   * @var bool
   */
  public $autodetect;
  protected $bitbucketServerTriggerConfigType = BitbucketServerTriggerConfig::class;
  protected $bitbucketServerTriggerConfigDataType = '';
  protected $buildType = Build::class;
  protected $buildDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $description;
  /**
   * @var bool
   */
  public $disabled;
  /**
   * @var string
   */
  public $eventType;
  /**
   * @var string
   */
  public $filename;
  /**
   * @var string
   */
  public $filter;
  protected $gitFileSourceType = GitFileSource::class;
  protected $gitFileSourceDataType = '';
  protected $githubType = GitHubEventsConfig::class;
  protected $githubDataType = '';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string[]
   */
  public $ignoredFiles;
  /**
   * @var string
   */
  public $includeBuildLogs;
  /**
   * @var string[]
   */
  public $includedFiles;
  /**
   * @var string
   */
  public $name;
  protected $pubsubConfigType = PubsubConfig::class;
  protected $pubsubConfigDataType = '';
  /**
   * @var string
   */
  public $resourceName;
  /**
   * @var string
   */
  public $serviceAccount;
  protected $sourceToBuildType = GitRepoSource::class;
  protected $sourceToBuildDataType = '';
  /**
   * @var string[]
   */
  public $substitutions;
  /**
   * @var string[]
   */
  public $tags;
  protected $triggerTemplateType = RepoSource::class;
  protected $triggerTemplateDataType = '';
  protected $webhookConfigType = WebhookConfig::class;
  protected $webhookConfigDataType = '';

  /**
   * @param ApprovalConfig
   */
  public function setApprovalConfig(ApprovalConfig $approvalConfig)
  {
    $this->approvalConfig = $approvalConfig;
  }
  /**
   * @return ApprovalConfig
   */
  public function getApprovalConfig()
  {
    return $this->approvalConfig;
  }
  /**
   * @param bool
   */
  public function setAutodetect($autodetect)
  {
    $this->autodetect = $autodetect;
  }
  /**
   * @return bool
   */
  public function getAutodetect()
  {
    return $this->autodetect;
  }
  /**
   * @param BitbucketServerTriggerConfig
   */
  public function setBitbucketServerTriggerConfig(BitbucketServerTriggerConfig $bitbucketServerTriggerConfig)
  {
    $this->bitbucketServerTriggerConfig = $bitbucketServerTriggerConfig;
  }
  /**
   * @return BitbucketServerTriggerConfig
   */
  public function getBitbucketServerTriggerConfig()
  {
    return $this->bitbucketServerTriggerConfig;
  }
  /**
   * @param Build
   */
  public function setBuild(Build $build)
  {
    $this->build = $build;
  }
  /**
   * @return Build
   */
  public function getBuild()
  {
    return $this->build;
  }
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
   * @param bool
   */
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  /**
   * @return bool
   */
  public function getDisabled()
  {
    return $this->disabled;
  }
  /**
   * @param string
   */
  public function setEventType($eventType)
  {
    $this->eventType = $eventType;
  }
  /**
   * @return string
   */
  public function getEventType()
  {
    return $this->eventType;
  }
  /**
   * @param string
   */
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  /**
   * @return string
   */
  public function getFilename()
  {
    return $this->filename;
  }
  /**
   * @param string
   */
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
  /**
   * @return string
   */
  public function getFilter()
  {
    return $this->filter;
  }
  /**
   * @param GitFileSource
   */
  public function setGitFileSource(GitFileSource $gitFileSource)
  {
    $this->gitFileSource = $gitFileSource;
  }
  /**
   * @return GitFileSource
   */
  public function getGitFileSource()
  {
    return $this->gitFileSource;
  }
  /**
   * @param GitHubEventsConfig
   */
  public function setGithub(GitHubEventsConfig $github)
  {
    $this->github = $github;
  }
  /**
   * @return GitHubEventsConfig
   */
  public function getGithub()
  {
    return $this->github;
  }
  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
  }
  /**
   * @param string[]
   */
  public function setIgnoredFiles($ignoredFiles)
  {
    $this->ignoredFiles = $ignoredFiles;
  }
  /**
   * @return string[]
   */
  public function getIgnoredFiles()
  {
    return $this->ignoredFiles;
  }
  /**
   * @param string
   */
  public function setIncludeBuildLogs($includeBuildLogs)
  {
    $this->includeBuildLogs = $includeBuildLogs;
  }
  /**
   * @return string
   */
  public function getIncludeBuildLogs()
  {
    return $this->includeBuildLogs;
  }
  /**
   * @param string[]
   */
  public function setIncludedFiles($includedFiles)
  {
    $this->includedFiles = $includedFiles;
  }
  /**
   * @return string[]
   */
  public function getIncludedFiles()
  {
    return $this->includedFiles;
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
   * @param PubsubConfig
   */
  public function setPubsubConfig(PubsubConfig $pubsubConfig)
  {
    $this->pubsubConfig = $pubsubConfig;
  }
  /**
   * @return PubsubConfig
   */
  public function getPubsubConfig()
  {
    return $this->pubsubConfig;
  }
  /**
   * @param string
   */
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  /**
   * @return string
   */
  public function getResourceName()
  {
    return $this->resourceName;
  }
  /**
   * @param string
   */
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  /**
   * @return string
   */
  public function getServiceAccount()
  {
    return $this->serviceAccount;
  }
  /**
   * @param GitRepoSource
   */
  public function setSourceToBuild(GitRepoSource $sourceToBuild)
  {
    $this->sourceToBuild = $sourceToBuild;
  }
  /**
   * @return GitRepoSource
   */
  public function getSourceToBuild()
  {
    return $this->sourceToBuild;
  }
  /**
   * @param string[]
   */
  public function setSubstitutions($substitutions)
  {
    $this->substitutions = $substitutions;
  }
  /**
   * @return string[]
   */
  public function getSubstitutions()
  {
    return $this->substitutions;
  }
  /**
   * @param string[]
   */
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  /**
   * @return string[]
   */
  public function getTags()
  {
    return $this->tags;
  }
  /**
   * @param RepoSource
   */
  public function setTriggerTemplate(RepoSource $triggerTemplate)
  {
    $this->triggerTemplate = $triggerTemplate;
  }
  /**
   * @return RepoSource
   */
  public function getTriggerTemplate()
  {
    return $this->triggerTemplate;
  }
  /**
   * @param WebhookConfig
   */
  public function setWebhookConfig(WebhookConfig $webhookConfig)
  {
    $this->webhookConfig = $webhookConfig;
  }
  /**
   * @return WebhookConfig
   */
  public function getWebhookConfig()
  {
    return $this->webhookConfig;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(BuildTrigger::class, 'Google_Service_CloudBuild_BuildTrigger');
