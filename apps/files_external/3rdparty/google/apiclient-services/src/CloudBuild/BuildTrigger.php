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
  public $autodetect;
  protected $buildType = Build::class;
  protected $buildDataType = '';
  public $createTime;
  public $description;
  public $disabled;
  public $filename;
  public $filter;
  protected $gitFileSourceType = GitFileSource::class;
  protected $gitFileSourceDataType = '';
  protected $githubType = GitHubEventsConfig::class;
  protected $githubDataType = '';
  public $id;
  public $ignoredFiles;
  public $includedFiles;
  public $name;
  protected $pubsubConfigType = PubsubConfig::class;
  protected $pubsubConfigDataType = '';
  public $resourceName;
  public $serviceAccount;
  protected $sourceToBuildType = GitRepoSource::class;
  protected $sourceToBuildDataType = '';
  public $substitutions;
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
  public function setAutodetect($autodetect)
  {
    $this->autodetect = $autodetect;
  }
  public function getAutodetect()
  {
    return $this->autodetect;
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
  public function setDisabled($disabled)
  {
    $this->disabled = $disabled;
  }
  public function getDisabled()
  {
    return $this->disabled;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
  }
  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
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
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setIgnoredFiles($ignoredFiles)
  {
    $this->ignoredFiles = $ignoredFiles;
  }
  public function getIgnoredFiles()
  {
    return $this->ignoredFiles;
  }
  public function setIncludedFiles($includedFiles)
  {
    $this->includedFiles = $includedFiles;
  }
  public function getIncludedFiles()
  {
    return $this->includedFiles;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
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
  public function setResourceName($resourceName)
  {
    $this->resourceName = $resourceName;
  }
  public function getResourceName()
  {
    return $this->resourceName;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
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
  public function setSubstitutions($substitutions)
  {
    $this->substitutions = $substitutions;
  }
  public function getSubstitutions()
  {
    return $this->substitutions;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
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
