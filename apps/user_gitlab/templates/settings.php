<?php
/*
 * The MIT License
 *
 * Copyright 2016 cambierr.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
$host = \OC::$server->getConfig()->getAppValue('user_gitlab', 'gitlab_url', '');
$secret = \OC::$server->getConfig()->getAppValue('user_gitlab', 'gitlab_secret', '');
?>




<form id="gitlabForm" action="#" method="post" class="section">
    <h2><?php p($l->t('GitLab Auth')); ?></h2>
    <label for="gitlab_url"><?php p($l->t('Url of your GitLab installation ')) ?></label>
    <input id="gitlab_url" type="url" name="gitlab_url" value="<?php p($l->t($host)); ?>"/>
    <br />
    <label for="gitlab_secret"><?php p($l->t('Secret of your GitLab API account ')) ?></label>
    <input id="gitlab_secret" type="test" name="gitlab_secret" value="<?php p($l->t($secret)); ?>"/>
    <br /><br />
    <input id="gitlab_save" type="submit" value="<?php p($l->t('Save')); ?>" />
    <div id="gitlabResponse" class="gitlabResponse"><?php p($l->t('Saved !')); ?></div>
</form>

